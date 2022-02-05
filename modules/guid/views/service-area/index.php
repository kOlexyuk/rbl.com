<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\guid\models\ServiceArea */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Services Area');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-area-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Service Area'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            [
  'attribute' => 'id',
   'headerOptions' => ['style' => 'width:5%'],
],
//            'name',
            [
                'attribute' => 'name',
                'headerOptions' => ['style' => 'width:20%'],
            ],
            [
                'attribute' => 'name_ru',
                'headerOptions' => ['style' => 'width:20%'],
                'value' => function ($model, $key, $index, $column) {
                        return  $model->getServiceAreaRu();

                },
                'format' =>'raw',
            ],
            'note:ntext',
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
                $url = Url::current(['service-area-lang', 'id' => $key]);
                $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);
                return Html::a($icon, $url, $options);
              }
           ],

        ],
            ]
    ]); ?>

    <?php Pjax::end(); ?>

</div>
