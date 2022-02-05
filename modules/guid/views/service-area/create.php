<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\guid\models\ServiceArea */
///* @var $modelRu app\modules\guid\models\ServiceAreaLang */

$this->title = Yii::t('app', 'Create Service');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
//        'modelRu' => $modelRu,
    ]) ?>

</div>
