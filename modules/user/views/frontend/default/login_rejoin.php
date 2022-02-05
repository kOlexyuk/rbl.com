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


        <!--Login-Section-->
        <section class="sptb">
            <div class="container customerpage">
                <div class="row">
                    <div class="single-page" >
                        <div class="d-block mx-auto">
                            <div class="wrapper wrapper2">
                                <div class="p-4 mb-5">
                                    <h4 class="text-left font-weight-semibold fs-16"><?=Yii::t('app','Login With')?></h4>
                                    <div class="btn-list d-sm-flex">
                                        <button href="https://www.google.com/gmail/" class="btn btn-primary mb-sm-0" disabled><i class="fa fa-google fa-1x mr-2"></i> Google</button>
                                        <button  href="https://twitter.com/" class="btn btn-secondary mb-sm-0"  disabled><i class="fa fa-twitter fa-1x mr-2"></i> Twitter</button >
                                        <button  href="https://www.facebook.com/" class="btn btn-info mb-0"  disabled><i class="fa fa-facebook fa-1x mr-2"></i> Facebook</button >
                                    </div>
                                </div>
                                <hr class="divider">
                                <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false ,  'options'=>['class' => 'card-body']]); ?>

                                <div class="mail">
                                    <?= $form
                                        ->field($model, 'phone_email')
                                        ->label(false)
                                        ->textInput(['placeholder' => $model->getAttributeLabel('phone_email')]) ?>
                                </div>
                                <div class="passwd">
                                    <!--                                    <input type="password" name="password">-->
                                    <!--                                    <label>Password</label>-->
                                    <?= $form
                                        ->field($model, 'password')
                                        ->label(false)
                                        ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
                                </div>
<!--                                <div class="checkbox">-->
<!--                                    --><?//= $form->field($model, 'rememberMe')->checkbox() ?>
<!--                                </div>-->
                                <div class="submit">
                                    <?= Html::submitButton(Yii::t('app','NAV_LOGIN'), ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                                </div>
                                <p class="mb-2"><a href="<?= Url::to('/user/default/password-reset-request')?>" ><?=Yii::t('app','I forgot my password')?></a></p>
                                <p class="text-dark mb-0"><?=Yii::t('app',"Don't have account?")?><a href="<?= Url::to('/user/default/signup') ?>" class="text-primary ml-1"><?=Yii::t('app','NAV_SIGNUP')?></a></p>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/Login-Section-->

    </div>





</div>
