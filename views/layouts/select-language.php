<?php

use yii\bootstrap\Html;

if(\Yii::$app->language == 'ru'):
    echo Html::a('<span class="flag-icon flag-icon-us"></span>Go to English', array_merge(
        \Yii::$app->request->get(),
        [ 'language' => 'en',''
        ]
    ),['class'=>'nav-link']);
else:
    echo Html::a('<span class="flag-icon flag-icon-ru"></span>Перейти на русский', array_merge(
        \Yii::$app->request->get(),
        [ 'language' => 'ru',''
        ]
    ),['class'=>'nav-link']);

//    echo Html::tag('a',)

endif;

//<span class="label label-danger">   flag-icon-background flag-icon-us
