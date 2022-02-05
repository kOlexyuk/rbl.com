<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\guid\models\ServiceArea */
/* @var $modelRu app\modules\guid\models\ServiceAreaLang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(Yii::t('app', "Name EN")); ?>
    <?= $form->field($modelRu, 'name')->textInput(['maxlength' => true])->label(Yii::t('app', "Name RU")); ?>
    <?= $form->field($model, 'note')->textarea(['rows' => 3])->label(Yii::t('app', "Note EN")); ?>
    <?= $form->field($modelRu, 'note')->textarea(['rows' => 3])->label(Yii::t('app', "Note RU")); ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
