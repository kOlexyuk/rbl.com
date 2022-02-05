<?php

use app\modules\guid\models\ServiceArea;
use app\modules\main\models\UserMessages;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use app\widgets\grid;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\main\models\UserMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

if (YII_ENV_DEV)   echo __FILE__;

$this->title = Yii::t('app', 'Messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [ 'style' => 'table-layout:fixed;' ],
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width:5%'],
            ],
            [
                'attribute'=>'is_review',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {

                    if($model->is_review  == 1)
                        return "<small class='div-status status-new'>Feedback</small>";
                    else
                        return "<small class='div-status status-approved'>Message</small>";

                },
            ],
            [
                    'attribute'=>'user_id_from',
                'value' => function ($model, $key, $index, $column) {
                return  $model->getUserNameFrom();},
                'label'=>'User from',
            ],


//            'user_name_to',
//            'user_name_from',


            [
                'attribute'=>'user_id_to',
                'value' => function ($model, $key, $index, $column) {
                    return  $model->getUserNameTo();},
                    'label'=>'User to',
            ],
//            'message:ntext',
            [
                'attribute'=>'message',
                'value' => function ($model, $key, $index, $column) {
                    return  \app\modules\guid\models\Util::toShortString($model->message, 100);},
              //  'headerOptions' => ['style' => 'width:300px'],
                'contentOptions' => [ 'style' => 'width: 400px;   max-width: 400px;min-width: 400px;
    white-space: normal !important; word-break: break-word;' ],

            ],
            [
//                'filter' => DatePicker::widget([
//                    'model' => $searchModel,
//                    'attribute' => 'date_from',
//                    'attribute2' => 'date_to',
//                    'type' => DatePicker::TYPE_RANGE,
//                    'separator' => '-',
//                    'pluginOptions' => ['format' => 'yyyy-mm-dd H:i']
//                ]),
                'attribute' => 'created_at',
              //  'format' => ['datetime','Y-MM-dd HH:i:s'],
                'format' => ['datetime','php:Y-m-d H:i'],
                'filterOptions' => [
                    'style' => 'min-width: 100px',]
                ,'headerOptions' => ['style' => 'width:350px'],
            ],
//            'admin_comment:ntext',
            [
                'attribute'=>'admin_comment',
                'value' => function ($model, $key, $index, $column) {
                    return  \app\modules\guid\models\Util::toShortString($model->admin_comment, 100);},
                'headerOptions' => ['style' => 'width:20%'],
                'label'=>'admin_comment',
            ],
            [
//                'filter' => DatePicker::widget([
//                    'model' => $searchModel,
//                    'attribute' => 'date_from',
//                    'attribute2' => 'date_to',
//                    'type' => DatePicker::TYPE_RANGE,
//                    'separator' => '-',
//                    'pluginOptions' => ['format' => 'yyyy-mm-dd']
//                ]),
                'attribute' => 'checked_at',
//                'format' => ['datetime','Y-MM-dd HH:i:s'],
              'format' => ['datetime','php:Y-m-d H:i'],
                'filterOptions' => [
                    'style' => 'max-width: 220px',],
                'headerOptions' => ['style' => 'width:350px'],
            ],
            [

                'attribute' => 'status',
                'label' => 'Status',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {

                     if($model->status  == UserMessages::STATUS_NEW)
                         return "<div class='div-status status-new'>NEW</div>";
                    if($model->status  == UserMessages::STATUS_APPROVED)
                        return "<div class='div-status status-approved'>APPROVED</div>";
                    if($model->status  == UserMessages::STATUS_DECLINED)
                        return "<div class='div-status status-declined'>DECLINED</div>";
                },
            ],
            [

                'attribute' => 'stars',
                'label' => 'Stars',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                   $stars = "";
                    if($model->is_review  == 1){
                   for($i=1;$i<6;$i++){
                       if($i<=$model->stars)
                           $stars.= '<small class="text-success glyphicon glyphicon-star"></small>';
                       else
                           $stars.= '<small class="text-success glyphicon glyphicon-star-empty"></small>';
                   }
                    return $stars.$model->stars;
                    }
                    else
                        return "";
                   },
            ],
            [
              'class' => 'yii\grid\ActionColumn'
                , 'template'=>'{update}{delete}',
            ],

        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
