<?php

use app\modules\guid\models\ServiceArea;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\guid\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Service');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Service'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width:5%'],
            ],
            'name',
            'note:ntext',
//            'service_area_name',
            [
                'attribute' => 'service_area_name',
//                'value'     => $searchModel->getServiceAreaName(),
//                'value' => function ($model, $key, $index, $column) {
////                    return Html::activeDropDownList($model,'service_area_id'
////                        , ArrayHelper::map(ServiceArea::find()->all(), 'id', 'name'));
//
//                },
                                'value' => function ($model, $key, $index, $column) {
                        return  $model->getServiceAreaName();

                },
                'format' =>'raw',
                'filter' => Html::activeDropDownList($searchModel
                    , 'id', ServiceArea::getServiceAreaList(),
                    ['class' => 'form-control', 'prompt' => 'Все']),
            ],


            ['class' => 'yii\grid\ActionColumn'
                , 'template'=>'{update}{delete}{info}',
                'buttons' =>[
                    'info'=>function($url, $model, $key){
                        $iconName = 'info-sign';
                        $title = \Yii::t('app', 'Translate');
                        $id = 'info-'.$key;
                        $options = [
                            'title'=>$title,
                            'aria-label'=>$title,
                            'data-pjax'=>'0',
                            'id'=>$id,
                        ];
                        $url = Url::current(['service-lang', 'id' => $key]);
                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);
                        return Html::a($icon, $url, $options);
                    }
                ],

            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
