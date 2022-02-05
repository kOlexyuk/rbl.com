<?php

use app\modules\user\models\User;
use app\modules\user\Module;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model \app\modules\user\models\backend\User */

$this->title = $model['username'];
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'ADMIN_USERS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('module', 'BUTTON_UPDATE'), Url::current(['update']), ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('module', 'BUTTON_UPDATE_PROFILE'), Url::current(['update-profile']), ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('module', 'BUTTON_DELETE'), Url::current(['delete']), [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('module', 'CONFIRM_DELETE'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= /** @var TYPE_NAME $model */
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                    'attribute' => Yii::t('app', 'Username'),
            'value' => $model['username'] ,
            ],
            [
//                    'email:email',
                'attribute' => Yii::t('app', 'Email'),
                'format'=>['email'],
                'value' => $model['email'] ,
            ],
            [
                    'attribute' => Yii::t('app', 'Phone'),
                'value' => $model['phone'] ,
            ],

            [
                      'attribute' => Yii::t('app', 'Services'),
                'value' => $model['services'] ,

            ],
            [      'attribute' => Yii::t('app', 'Regions'),
//                    'regions',
                'value' => $model['regions'] ,
            ],
            [
                'attribute' => Yii::t('app', 'created_at'),
//                    'created_at:datetime'
                          'format' => ['datetime'],
                'value' => $model['created_at'] ,
            ],

            [
                'attribute' => Yii::t('app', 'updated_at'),
//                    'updated_at:datetime',
                'format' => ['datetime'],
                'value' => $model['updated_at'] ,
            ],
            [
                'attribute' => Yii::t('app', 'Status'),
                'value' => User::getUserStatusName($model['status']),
            ],
            [
                'attribute' => Yii::t('app', 'Role'),
//                'value' => ($role = Yii::$app->authManager->getRole($model->role)) ? $role->description : $model->role,
                'value' => $model['role'] ,
            ],
            [
                'attribute'=>Yii::t('app', 'Photo'),
                'value'=>$model['photo'],
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],


    ]]) ?>

</div>
