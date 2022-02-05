<?php

//use Yii;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\modules\user\Module;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\modules\user\forms\LoginForm */

//$this->title = Module::t('module', 'TITLE_LOGIN');
//$this->params['breadcrumbs'][] = $this->title;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<div class="user-default-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="login-box">

        <p><?= Module::t('module', 'PLEASE_FILL_FOR_LOGIN') ?></p>
        <div class="login-logo">
            <a href="<?= Url::home()?>"><b>Work</b>exchange</a>
        </div>

    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'phone_email', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('phone_email')]) ?>

        <?= $form
            ->field($model, 'password',$fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

<!--        <div class="social-auth-links text-center">-->
<!--            <p>- OR -</p>-->
<!--            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in-->
<!--                using Facebook</a>-->
<!--            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign-->
<!--                in using Google+</a>-->
<!--        </div>-->
        <!-- /.social-auth-links -->

        <a href="<?= Url::to('/user/default/password-reset-request')?>"><?=Yii::t('app','I forgot my password')?></a><br>
        <a href="<?= Url::to('/user/default/signup') ?>" class="text-center"><?=Yii::t('app','Register a new membership')?></a>

    </div>
    </div>

</div>
