<?php

$config = [
    'id' => 'app',
   // 'layout'=> '@app/views/layouts/index3_rejoin',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => '@app/views/layouts/main_rejoin',
            'modules' => [
                'user' => [
                    'class' => 'app\modules\user\Module',
                    'controllerNamespace' => 'app\modules\user\controllers\backend',
                    'viewPath' => '@app/modules/user/views/backend',
                ],
                'guid'=> [
                    'class' => 'app\modules\guid\Module',
                ]

            ]
        ],
        'main' => [
            'class' => 'app\modules\main\Module',
            'layout'=> '@app/views/layouts/main_rejoin',
        ],
        'user' => [
            'class' => 'app\modules\user\Module',
            'controllerNamespace' => 'app\modules\user\controllers\frontend',
            'viewPath' => '@app/modules/user/views/frontend',
            'layout'=> '@app/views/layouts/main_rejoin',
        ],

//
//        'languages' => [
//            'class' => 'klisl\languages\Module',
//            //Языки используемые в приложении
//            'languages' => [
//                'English' => 'en',
//                'Русский' => 'ru',
////                'Українська' => 'uk',
//            ],
//            'default_language' => 'ru', //основной язык (по-умолчанию)
//            'show_default' => false, //true - показывать в URL основной язык, false - нет
//        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'app\components\UserIdentity',
            'enableAutoLogin' => true,
            'loginUrl' => ['user/default/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'main/default/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
        ],

        'formatter' => [
            'dateFormat' => 'php:Y-m-d',
            'datetimeFormat'=>'php:Y-m-d H:i',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'USD',
        ],

    ],
    'sourceLanguage' => 'ru',
    'timeZone' => 'America/Los_Angeles',

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
