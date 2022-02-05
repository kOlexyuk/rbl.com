<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\modules\user\Module;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\modules\user\forms\frontend\PasswordResetRequestForm */
if (YII_ENV_DEV) echo __FILE__;
$this->title = Module::t('module', 'TITLE_PASSWORD_RESET');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-password-reset-request">
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
    <p><?= Yii::t('app', 'PLEASE_FILL_FOR_RESET_REQUEST') ?></p>
<!--Forgot password-->
<section class="sptb">
    <div class="container">
        <div class="row  w-100 p-0">
            <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                <div class="single-page" >
                    <div class="wrapper wrapper2">
                        <?php $form = ActiveForm::begin(['id' => 'password-reset-request-form',  'options'=>['class' => 'card-body']] ); ?>
                            <h3 class="pb-2"><?= Html::encode($this->title) ?></h3>
                            <div class="mail">
<!--                                <input type="email" name="mail">-->
<!--                                <label>Mail or Username</label>-->
                                <?= $form->field($model, 'email_phone') ?>
                            </div>
                            <div class="submit">
                                <?= Html::submitButton(Module::t('module', 'BUTTON_SEND'), ['class' => 'btn btn-primary btn-block', 'name' => 'reset-button']) ?>
                            </div>
                            <div class="text-center text-dark mb-0">
                              <a href='/user/default/login'><?=Yii::t('app', 'NAV_LOGIN')?></a>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!--/Forgot password-->