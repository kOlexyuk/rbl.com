<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\modules\user\Module;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\modules\user\forms\frontend\PasswordResetForm */
if (YII_ENV_DEV) echo __FILE__;
$this->title = Module::t('module', 'TITLE_PASSWORD_RESET');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-password-reset">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Module::t('module', 'PLEASE_FILL_FOR_RESET') ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'password-reset-form']); ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'reset-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <!--Forgot password-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                    <div class="single-page w-100 p-0" >
                        <div class="wrapper wrapper2">
                            <form id="forgotpsd" class="card-body">
                                <h3 class="pb-2">Forgot password</h3>
                                <div class="mail">
                                    <input type="email" name="mail">
                                    <label>Mail or Username</label>
                                </div>
                                <div class="submit">
                                    <a class="btn btn-primary btn-block" href="index.html">Send</a>
                                </div>
                                <div class="text-center text-dark mb-0">
                                    Forget it, <a href="login.html">send me back</a> to the sign in.
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Forgot password-->
</div>