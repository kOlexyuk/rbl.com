<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\guid\models\Service */
/* @var $service_area_name string */

$this->title = Yii::t('app', 'Update Service Translate: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Service Translate'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update Translate');
?>
<div class="service-lang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="service-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <!--    --><?//= $form->field($model, 'service_id')->textInput() ?>
        <?= Html::beginTag("div") ?>
        <?= Html::label( \Yii::t('app', 'Service')) ?>
        <?= Html::Tag("br") ?>
        <?= Html::textInput( 'service_area_name' ,$service_area_name , ['readonly' => true,]) ?>
        <?= Html::endTag("div") ?>

        <?= $form->field($model, 'note')->textarea(['rows' => 3]) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
