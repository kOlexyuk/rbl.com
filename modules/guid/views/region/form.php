<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\guid\models\Region */
/* @var $action string */

$this->title = Yii::t('app', $action.' Region');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Region'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region<?=$action?>">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="region-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
