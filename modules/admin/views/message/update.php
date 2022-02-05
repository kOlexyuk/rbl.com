<?php

use app\modules\main\models\UserMessages;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\UserMessages */
/* @var $form yii\widgets\ActiveForm */

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(['id' => 'message-form']); ?>

    <?=Html::label(Yii::t('app', "From user") ,['for'=>'user_name_from']) ?>
    <?= Html::input('text',"user_name_from",$model->getUserNameFrom(),['disabled'=>true , 'id'=>'user_name_from']) ?>
    <?=Html::label(Yii::t('app', "To user") ,['for'=>'user_name_to']) ?>
    <?= Html::input('text',"user_name_from",$model->getUserNameTo(),['disabled'=>true, 'id'=>'user_name_to']) ?>
    <?=Html::label(Yii::t('app', "Created at") ,['for'=>'user_name_to']) ?>
    <?= Html::input('text',"created_at",Yii::$app->formatter->asDateTime($model->created_at),['disabled'=>true, 'id'=>'created_at']) ?>
    <br><br>
    <div class="row">
        <div class="col-md-2 col-lg-2 col-sm-6">
        <?= $form->field($model, 'stars')->dropDownList(['1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5]);?>
        </div>
    </div>
    <?= $form->field($model, 'message')->textarea(['maxlength' => true, 'rows'=>6 ]) ?>
    <?= $form->field($model, 'admin_comment')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(UserMessages::getStatusesArray()) ?>



    <div class="form-group">
        <?= Html::submitButton( Yii::t('app', 'Save') , [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
            'name' => 'submit-button',
        ]) ?>
        <?= Html::a( 'Back', Yii::$app->request->referrer,['class'=>'btn btn-success']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
