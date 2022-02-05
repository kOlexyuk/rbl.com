<?php

use app\modules\main\Module;

/* @var $this yii\web\View */
/* @var $user app\modules\user\models\User */
/* @var $password string */
?>

<?= Yii::t('app', 'HELLO {username} new password:{password}', ['username' => $user->username, 'password' => $password]); ?>

<?//= Yii::t('app',  'FOLLOW_TO_RESET_PASSWORD') ?>

