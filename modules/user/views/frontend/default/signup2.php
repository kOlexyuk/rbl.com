<?php

use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\modules\user\Module;
use yii\helpers\Url;
use yii\widgets\MaskedInput;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\modules\user\forms\frontend\SignupForm */

$this->title = Module::t('module', 'TITLE_SIGNUP');
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(
    '@web/js/signup.js',
    ['depends' => [\yii\web\JqueryAsset::className()],'position' => \yii\web\View::POS_END]
);

//$this->registerJsFile(
//    '@web/js/signup.js',
//    ['depends' => [\yii\bootstrap\BootstrapAsset::className()],'position' => \yii\web\View::POS_END]
//);

$fieldOptions1 = [
//    'options' => ['class' => 'form-group has-feedback'],
//    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
//    'options' => ['class' => 'form-group has-feedback'],
//    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

$fieldOptions3 = [
//    'options' => ['class' => 'form-group has-feedback'],
//    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];
?>
<div class="container">
    <div class="row">

        <div class="col-xl-4 col-md-12 col-md-12 d-block mx-auto">
            <div class="card mb-xl-0">
                <div class="card-header">
                    <h3 class="card-title"><?= Module::t('module', 'PLEASE_FILL_FOR_SIGNUP') ?></h3>
                </div>
                <div class="btn-list d-sm-flex  justify-content-center">
                    <button href="https://www.google.com/gmail/" class="btn btn-primary mb-sm-0" disabled><i class="fa fa-google fa-1x mr-2"></i> Google</button>
                    <button href="https://twitter.com/" class="btn btn-secondary mb-sm-0" disabled><i class="fa fa-twitter fa-1x mr-2"></i> Twitter</button>
                    <button href="https://www.facebook.com/" class="btn btn-info mb-0" disabled><i class="fa fa-facebook fa-1x mr-2"></i> Facebook</button>
                </div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin(['id' => 'signup-form',  'enableAjaxValidation' => true,
                            'validationUrl' => Url::to(['validate-signup-form']),  'action'=>Url::to(['signup']) , 'method'=>'post',  'options'=>['class' => 'card-body']]
                    ); ?>
                    <div class="wrapper wrapper2">
                    <div class="form-group">
                        <?= $form->field($model, 'username',$fieldOptions3) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'email',$fieldOptions1) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
                            'mask' => '+99999999999[9]',
                            'options' => [
                                'class' => 'form-control placeholder-style has-feedback ',
                                'id' => 'phone2',
                            ],
                            'clientOptions' => [
                                'greedy' => false,
                                'clearIncomplete' => true
                            ]
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'password',$fieldOptions2)->passwordInput() ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input type="hidden" name="SignupForm[agree]" value="0">
                            <input type="checkbox" id="signupform-agree" name="SignupForm[agree]" value="1" required="" class="custom-control-input" >
                            <span class="custom-control-label text-dark"><?= Yii::t('app', 'Agree the')?> <a href="condition"><?= Yii::t('app', 'terms and policy')?></a></span>
                            <p class="help-block help-block-error"></p>
                        </label>
                    </div>
                    <div class="form-footer mt-2">
                        <?= Html::submitButton(Module::t('module', 'USER_BUTTON_SIGNUP')
                            , ['class' => 'btn btn-primary  btn-block', 'name' => 'signup-button' , 'id'=>'btnSignUp']) ?>
                    </div>
                    <div class="text-center  mt-3 text-dark">
                        <p class="text-dark mb-0"><?= Yii::t('app','Already have an account?') ?><a href='/user/default/login' class="text-primary ml-1"><?=Yii::t('app', 'NAV_LOGIN')?></a></p>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>

</div>




