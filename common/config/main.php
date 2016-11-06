<?php
return [
    'name' => 'Yii2-site',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'sourceLanguage' => 'en-US',
    'language' => require (dirname(__DIR__).'/config/default-lang.php'),
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

//        'view' => [
//            'theme' => [
//                'pathMap' => [
//                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
//                ],
//            ],
//        ],

        'db' => require (dirname(__DIR__).'/config/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class' => 'codemix\localeurls\UrlManager',
            'languages' => require (dirname(__DIR__).'/config/languages.php'),
            'enableDefaultLanguageUrlCode' => false,
            'enableLanguageDetection' => false,
            'enableLanguagePersistence' => false,
            'rules' => array(
                'main/main/login' => 'main/main/login',
            ),
        ],

        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceMessageTable' => '{{%source_message}}',
                    'messageTable' => '{{%message}}',
                    'cachingDuration' => 86400,
                    'enableCaching' => false,
                ],
                'eauth' => array(
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@eauth/messages',
                ),
            ],
        ],

    ],
];
