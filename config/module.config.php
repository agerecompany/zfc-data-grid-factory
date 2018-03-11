<?php
namespace Popov\ZfcDataGridPlugin;

use ZfcDatagrid;
use ZfcDatagrid\Filter;
use ZfcDatagrid\Column\Type;
use ZfcDatagrid\Column\Style;
use ZfcDatagrid\Column\Action;
use ZfcDatagrid\Column\Formatter;

return [
    // Middleware way
    'dependencies' => [
        'aliases' => [
            'DataGridPluginManager' => Service\Plugin\DataGridPluginManager::class,
        ],
        'factories' => [
            Service\Plugin\DataGridPluginManager::class => Service\Factory\DataGridPluginManagerFactory::class,
        ],
    ],

    'data_grid_plugins' => [
        'aliases' => [
            // column
            'selectcolumn' => ZfcDatagrid\Column\Select::class,
            'actioncolumn' => ZfcDatagrid\Column\Action::class,
            'externaldatacolumn' => ZfcDatagrid\Column\ExternalData::class,

            // action
            'buttonaction' => Action\Button::class,
            'checkboxaction' => Action\Checkbox::class,
            'iconaction' => Action\Icon::class,

            // type
            'imagetype' => Type\Image::class,
            'numbertype' => Type\Number::class,
            'datetimetype' => Type\DateTime::class,
            'phparraytype' => Type\PhpArray::class,
            'phpstringtype' => Type\PhpString::class,

            // style
            'alignstyle' => Style\Align::class,
            'backgroundcolorstyle' => Style\BackgroundColor::class,
            'boldstyle' => Style\Bold::class,
            'colorstyle' => Style\Color::class,
            'cssclassstyle' => Style\CSSClass::class,
            'htmlstyle' => Style\Html::class,
            'italicstyle' => Style\Italic::class,
            'strikethroughstyle' => Style\Strikethrough::class,

            // formatter
            'emailformatter' => Formatter\Email::class,
            'filesizeformatter' => Formatter\FileSize::class,
            'generatelinkformatter' => Formatter\GenerateLink::class,
            'htmltagformatter' => Formatter\HtmlTag::class,
            'imageformatter' => Formatter\Image::class,
            'linkformatter' => Formatter\Link::class,
        ],

        'invokables' => [
            // column
            ZfcDatagrid\Column\Select::class => ZfcDatagrid\Column\Select::class,
            ZfcDatagrid\Column\Action::class => ZfcDatagrid\Column\Action::class,
            ZfcDatagrid\Column\ExternalData::class => ZfcDatagrid\Column\ExternalData::class,

            // action
            Action\Icon::class => Action\Icon::class,
            Action\Button::class => Action\Button::class,
            Action\Checkbox::class => Action\Checkbox::class,

            // type
            Type\Image::class => Type\Image::class,
            Type\Number::class => Type\Number::class,
            Type\DateTime::class => Type\DateTime::class,
            Type\PhpArray::class => Type\PhpArray::class,
            Type\PhpString::class => Type\PhpString::class,

            // style
            Style\Html::class => Style\Html::class,
            Style\Bold::class => Style\Bold::class,
            Style\Align::class => Style\Align::class,
            Style\Color::class => Style\Color::class,
            Style\Italic::class => Style\Italic::class,
            Style\CSSClass::class => Style\CSSClass::class,
            Style\Strikethrough::class => Style\Strikethrough::class,
            Style\BackgroundColor::class => Style\BackgroundColor::class,

            // formatter
            Formatter\Link::class => Formatter\Link::class,
            Formatter\Image::class => Formatter\Image::class,
            Formatter\Email::class => Formatter\Email::class,
            Formatter\HtmlTag::class => Formatter\HtmlTag::class,
            Formatter\FileSize::class => Formatter\FileSize::class,
            Formatter\GenerateLink::class => Formatter\GenerateLink::class,
        ],

        //'factories' => [
        //    Type\DateTime::class => Column\Type\Factory\DateTimeFactory::class,
        //],

        //'abstract_factories' => []
    ],

    'data_grid_plugins_config' => [
        Type\DateTime::class => [
            'output_pattern' => 'yyyy-MM-dd',
            'source_date_time_format' => 'Y-m-d',
            'source_timezone' => ini_get('date.timezone'),
        ],
        'type_of' => [ // setting for Column with relative Type
            Type\DateTime::class => [
                'renderer_parameters' => [
                    ['formatter', 'date', 'jqGrid'], // it important for datepicker
                    ['formatoptions', ['srcformat' => 'Y-m-d', 'newformat' => 'Y-m-d'], 'jqGrid'],
                    //['sorttype', 'date', 'jqGrid'],
                    //['searchoptions', ['sopt' => ['eq']], 'jqGrid'],
                ],
            ]
        ]
    ]
];