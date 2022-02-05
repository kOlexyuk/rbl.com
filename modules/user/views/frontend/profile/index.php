<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\user\Module;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */
/* @var $data array */

$this->title = Module::t('module', 'TITLE_PROFILE');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">
    <section class="sptb">
        <div class="container">
    <?php if (YII_ENV_DEV)   echo __FILE__;    ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('module', 'BUTTON_UPDATE'), ['update'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('module', 'LINK_PASSWORD_CHANGE'), ['password-change'], ['class' => 'btn btn-primary']) ?>
    </p>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'username',
            [
                'attribute'=>Module::t('module', 'USER_USERNAME'),
                'value'=>$model->username,
            ],
//            'name',
            [
                'attribute'=>Module::t('module', 'USER_NAME'),
                'value'=>$model->name,
            ],
            'surname',
            'email',
            'phone',
            'services',
            'regions',
            'note',
//            'photo:image',
            [
                'attribute'=>'photo',
                'value'=>$model->photo,
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],


        ],
    ]) ?>

        </div>
    </section>

</div>
