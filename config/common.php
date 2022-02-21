<?php

use yii\helpers\ArrayHelper;

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = ArrayHelper::merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'name' => 'rbl',
    'language'=>'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'app\modules\admin\Bootstrap',
        'app\modules\main\Bootstrap',
        'app\modules\user\Bootstrap',
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [


        'urlManager' => [
//            'class' => 'yii\web\UrlManager',
            'class' => 'codemix\localeurls\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'languages' => ['ru', 'en'],
//            'on languageChanged' => '\app\modules\user\models\User::onLanguageChanged',
            'rules' => [
                [
                    'class' => 'yii\web\GroupUrlRule',
                    'prefix' => 'admin',
                    'routePrefix' => 'admin',
                    'rules' => [
                        '' => 'default/index',
                        'message' => 'message/index',
                        'message/<id:\d+>/<_a:[\w-]+>' => 'message/<_a>',
                        '<_m:[\w\-]+>' => '<_m>/default/index',
                        '<_m:[\w\-]+>/<id:\d+>' => '<_m>/default/view',
                        '<_m:[\w\-]+>/<id:\d+>/<_a:[\w-]+>' => '<_m>/default/<_a>',
                        '<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index',
                        '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/view',
                        '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_m>/<_c>/<_a>',
                        '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w-]+>' => '<_m>/<_c>/<_a>',

                    ],
                ],


                '/' => 'main/default/index',
                'contact' => 'main/contact/index',
                'condition' => 'main/default/condition',
                'user-message'=>'main/message/index',
                'update-read'=>'main/message/update-read',
                'review-me'=>'main/message/review-me',
                'review-my'=>'main/message/review-my',
                'profile-list'=>'main/default/profile-list',

//                'guid' => 'guid/default/index',
                '<_a:(error|pdf)>' => 'main/default/<_a>',
//                '<_a:(error|profile-list|pdf)>' => 'main/default/<_a>',
//               '<_a:(update-read)>' => 'main/message/<_a>',
//|profile-list-service
                '<_a:(login|logout|signup|email-confirm|password-reset-request|password-reset|phone-confirm|re-sms)>' => 'user/default/<_a>',

                '<_m:[\w\-]+>' => '<_m>/default/index',
                '<_m:[\w\-]+>/<id:\d+>' => '<_m>/default/view',
                '<_m:[\w\-]+>/<id:\d+>/<_a:[\w-]+>' => '<_m>/default/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/view',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_m>/<_c>/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w-]+>' => '<_m>/<_c>/<_a>',
            ],
        ],


        'authManager' => [
            'class' => 'elisdn\hybrid\AuthManager',
            'modelClass' => 'app\components\UserIdentity',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                     'forceTranslation' => true,
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'cache' => [
            'class' => 'yii\caching\DummyCache',
        ],
        'log' => [
            'class' => 'yii\log\Dispatcher',
        ],
    ],
    'params' => $params,
];