<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\guid\models\ServiceArea */
/* @var $modelRu app\modules\guid\models\ServiceAreaLang */

$this->title = Yii::t('app', 'Update Service: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Services Area'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Lang');
?>
<div class="service-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
       // 'modelRu' => $modelRu,
    ]) ?>

</div>
