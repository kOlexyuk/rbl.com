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
///* @var $model \app\modules\user\forms\frontend\SignupForm */

$this->title = Module::t('module', 'TITLE_SIGNUP');
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(
    '@web/js/phone_confirm.js',
    ['depends' => [\yii\web\JqueryAsset::className()],'position' => \yii\web\View::POS_END]
);






$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<div class="user-default-signup">
    <!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Work</b>exchange</a>
        </div>
        <div class="login-logo"><?= Module::t('module', 'PLEASE_FILL_FOR_SIGNUP') ?></div>

        <div class="login-box-body" id="divPhoneConfirm">
            <?php Pjax::begin();?>
            <?php $form = ActiveForm::begin(['id' => 'confirm-form'  , 'enableAjaxValidation' => true,
                'action' => \yii\helpers\Url::to(['phone-confirm']),'method'=>'post']); ?>

            <div class="form-group input-group-lg d-flex">
                <?= MaskedInput::widget( [
                    'name'=>'txtSms',
                    'mask' => '9999',
                    'options' => [
                        'class' => 'form-control',
                        'id' => 'txtSms',
                    ],
                    'clientOptions' => [
                        'greedy' => false,
                        'clearIncomplete' => true,
                        'label' => false
                    ]
                ])?>
                <?=Html::input('hidden','confirm-token','', ['option'=>['id'=>'tokenId']])?>
            </div>
            <div class="form-group">
                <?= Html::submitButton(Module::t('module', 'CONFIRM_PHONE')
                    , ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button' , 'id'=>'btnConfirmPhone'  ]) ?>
            </div>

            <div  class="form-group">
                <div  class="entry__span">
                    Не отримали пароль?
                </div>
                <button class="btn btn-secondary  btn-block link" id="txtReSms">Відправити код знову</button>
            </div>
            <?php ActiveForm::end(); ?>
            <?php Pjax::end();?>
        </div>
    </div>
</div>