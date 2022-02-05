<?php

use app\modules\admin\Module;
use app\modules\user\Module as UserModule;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \app\modules\user\models\backend\User */

$this->title = Module::t('module', 'ADMIN');
?>
<div class="admin-default-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app',  'Users'), ['user/default/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app',  'Service area'), ['guid/service-area'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app',  'Service'), ['guid/service'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Regions'), ['guid/region'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Messages'), ['/admin/message'], ['class' => 'btn btn-primary']) ?>

    </p>
</div>
