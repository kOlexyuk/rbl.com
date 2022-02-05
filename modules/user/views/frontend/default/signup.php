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
<div class="user-default-signup">
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Work</b>exchange</a>
        </div>
        <div class="login-logo"><?= Module::t('module', 'PLEASE_FILL_FOR_SIGNUP') ?></div>
            <div class="login-box-body" id="divSignUp">
                <div class="row">
                  <div class="single-page" >
                        <div class="wrapper wrapper2">
                            <div class="p-4 mb-5">
                                <h4 class="text-left font-weight-semibold fs-16">Register</h4>
                                <div class="btn-list d-sm-flex">
                                    <button href="https://www.google.com/gmail/" class="btn btn-primary mb-sm-0" disabled><i class="fa fa-google fa-1x mr-2"></i> Google</button>
                                    <button href="https://twitter.com/" class="btn btn-secondary mb-sm-0" disabled><i class="fa fa-twitter fa-1x mr-2"></i> Twitter</button>
                                    <button href="https://www.facebook.com/" class="btn btn-info mb-0" disabled><i class="fa fa-facebook fa-1x mr-2"></i> Facebook</button>
                                </div>
                            </div>
                            <hr class="divider">
                            <?php $form = ActiveForm::begin(['id' => 'signup-form',  'enableAjaxValidation' => true,
                                    'validationUrl' => Url::to(['validate-signup-form']),  'action'=>Url::to(['signup']) , 'method'=>'post',  'options'=>['class' => 'card-body']]
                            ); ?>
                            <div class="name">
                                <?= $form->field($model, 'username',$fieldOptions3) ?>
                            </div>
                            <div class="mail">
                                <?= $form->field($model, 'email',$fieldOptions1) ?>
                            </div>
                            <div class="Phone">
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
                            <div class="passwd">
                                <?= $form->field($model, 'password',$fieldOptions2)->passwordInput() ?>
                            </div>
                            <div class="submit">
                                <?= Html::submitButton(Module::t('module', 'USER_BUTTON_SIGNUP')
                                    , ['class' => 'btn btn-primary  btn-block', 'name' => 'signup-button' , 'id'=>'btnSignUp']) ?>
                            </div>
                            <p class="text-dark mb-0">Already have an account?<a href='/user/default/login' class="text-primary ml-1"><?=Yii::t('app', 'NAV_LOGIN')?></a></p>
                            <?php ActiveForm::end(); ?>
                        </div>
                </div>
                </div>
            </div>
       </div>
    </div>
</div>


