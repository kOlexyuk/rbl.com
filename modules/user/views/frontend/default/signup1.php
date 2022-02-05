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

            <?php $form = ActiveForm::begin(['id' => 'signup-form',   'enableAjaxValidation' => true,
                'validationUrl' => Url::to(['validate-signup-form']),  'action'=>Url::to(['signup']) , 'method'=>'post']); ?>
            <?= $form->field($model, 'username',$fieldOptions3) ?>
            <?= $form->field($model, 'email',$fieldOptions1) ?>
<!--            --><?//= $form->field($model, 'phone',$fieldOptions1) ?>

            <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
//                'mask' => ['+99(999)999-99-99','+9(999)999-99-99'],
//                'mask' => ['99-999-9999', '999-999-9999'],
              //  'mask' => '+9[9][9] 99 999-99-99',
                'mask' => '+99999999999[9]',
                'options' => [
                    'class' => 'form-control placeholder-style has-feedback ',
                    'id' => 'phone2',
                    'placeholder' => (Module::t('module', 'Phone')),
                    'inputTemplate' => "{input}<span class='glyphicon glyphicon-phone form-control-feedback'></span>",
                ],
                'clientOptions' => [
                    'greedy' => false,
                    'clearIncomplete' => true
                ]
            ])->label(false) ?>

            <?= $form->field($model, 'password',$fieldOptions2)->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton(Module::t('module', 'USER_BUTTON_SIGNUP')
                    , ['class' => 'btn btn-primary  btn-block', 'name' => 'signup-button' , 'id'=>'btnSignUp']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<!--Register-section-->
<section class="sptb">
    <div class="container customerpage">
        <div class="row">
            <div class="single-page" >
                <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                    <div class="wrapper wrapper2">
                        <div class="p-4 mb-5">
                            <h4 class="text-left font-weight-semibold fs-16">Register</h4>
                            <div class="btn-list d-sm-flex">
                                <a href="https://www.google.com/gmail/" class="btn btn-primary mb-sm-0"><i class="fa fa-google fa-1x mr-2"></i> Google</a>
                                <a href="https://twitter.com/" class="btn btn-secondary mb-sm-0"><i class="fa fa-twitter fa-1x mr-2"></i> Twitter</a>
                                <a href="https://www.facebook.com/" class="btn btn-info mb-0"><i class="fa fa-facebook fa-1x mr-2"></i> Facebook</a>
                            </div>
                        </div>
                        <hr class="divider">
                        <form id="Register" class="card-body" tabindex="500">
                            <div class="name">
                                <input type="text" name="name">
                                <label>Name</label>
                            </div>
                            <div class="mail">
                                <input type="email" name="mail">
                                <label>Mail</label>
                            </div>
                            <div class="passwd">
                                <input type="password" name="password">
                                <label>Password</label>
                            </div>
                            <div class="submit">
                                <a class="btn btn-primary btn-block" href="index.html">Register</a>
                            </div>
                            <p class="text-dark mb-0">Already have an account?<a href="login.html" class="text-primary ml-1">Sign In</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Register-section-->


<!--Register-section-->
<section class="sptb">
    <div class="container customerpage">
        <div class="row">
            <div class="single-page" >
                <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                    <div class="wrapper wrapper2">
                        <div class="p-4 mb-5">
                            <h4 class="text-left font-weight-semibold fs-16">Register</h4>
                            <div class="btn-list d-sm-flex">
                                <a href="https://www.google.com/gmail/" class="btn btn-primary mb-sm-0"><i class="fa fa-google fa-1x mr-2"></i> Google</a>
                                <a href="https://twitter.com/" class="btn btn-secondary mb-sm-0"><i class="fa fa-twitter fa-1x mr-2"></i> Twitter</a>
                                <a href="https://www.facebook.com/" class="btn btn-info mb-0"><i class="fa fa-facebook fa-1x mr-2"></i> Facebook</a>
                            </div>
                        </div>
                        <hr class="divider">
                        <?php $form = ActiveForm::begin(['id' => 'signup-form1',  'class'=>"card-body",  'enableAjaxValidation' => true,
                            'validationUrl' => Url::to(['validate-signup-form']),  'action'=>Url::to(['signup']) , 'method'=>'post',  'options'=>['class' => 'card-body']]
                            ); ?>
                            <div class="name">
<!--                                <input type="text" name="name">-->
                                <?= $form->field($model, 'username',$fieldOptions3)->label(false) ?>
                                <label>Name</label>
                            </div>
                            <div class="mail">
<!--                                <input type="email" name="mail">-->
                                <?= $form->field($model, 'email',$fieldOptions1)->label(false) ?>
                                <label>Mail</label>
                            </div>
                            <div class="Phone">
                                <!--                                <input type="email" name="mail">-->
                                <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
//                'mask' => ['+99(999)999-99-99','+9(999)999-99-99'],
//                'mask' => ['99-999-9999', '999-999-9999'],
                                    //  'mask' => '+9[9][9] 99 999-99-99',
                                    'mask' => '+99999999999[9]',
                                    'options' => [
                                        'class' => 'form-control placeholder-style has-feedback ',
                                        'id' => 'phone2',
//                                        'placeholder' => (Module::t('module', 'Phone')),
//                                        'inputTemplate' => "{input}<span class='glyphicon glyphicon-phone form-control-feedback'></span>",
                                    ],
                                    'clientOptions' => [
                                        'greedy' => false,
                                        'clearIncomplete' => true
                                    ]
                                ])->label(false) ?>
                                <label>Phone</label>
                            </div>
                            <div class="passwd">
                                <?= $form->field($model, 'password',$fieldOptions2)->passwordInput()->label(false) ?>
                                <label>Password</label>
                            </div>
                            <div class="submit">
<!--                                <a class="btn btn-primary btn-block" href="index.html">Register</a>-->
                                <?= Html::submitButton(Module::t('module', 'USER_BUTTON_SIGNUP')
                                    , ['class' => 'btn btn-primary  btn-block', 'name' => 'signup-button' , 'id'=>'btnSignUp']) ?>
                            </div>
                            <p class="text-dark mb-0">Already have an account?<a href="login.html" class="text-primary ml-1">Sign In</a></p>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Register-section-->