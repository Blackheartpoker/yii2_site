<?php
return [
    'name' => 'Yii2-site',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'db' => require (dirname(__DIR__).'/config/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class'=>'frontend\components\LangUrlManager',
            'rules'=>[
                '/' => 'main/default/index',
                '<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
            ]
        ],
    ],
];
