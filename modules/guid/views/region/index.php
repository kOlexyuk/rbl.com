<?php
/* @var $this yii\web\View */
/* @var $searchModel app\modules\guid\models\RegionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Regions');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="service-area-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('app', 'Create Service Area'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>

    <?=GridView::widget([
            'dataProvider'=>$dataProvider,
             'filterModel'=>$searchModel,
          'columns'=>[
                  [
                          'attribute' =>'id',
                       'headerOptions'=>['style'=>'width:5%']
                  ],
              [
                  'attribute' => 'name',
                  'headerOptions' => ['style' => 'width:30%'],
              ],
              ['class' => 'yii\grid\ActionColumn',
                  'headerOptions' => ['style' => 'width:15%'],
                   'template'=>'{update}{delete}{info}',
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
                          $url = Url::current(['region-lang', 'id' => $key['id']]);
                          $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);
                          return Html::a($icon, $url, $options);
                      }
                  ],

              ]
          ]


    ]); ?>

    <?php Pjax::end(); ?>
</div>
<!--<h1>region/index</h1>-->
<!---->
<!--<p>-->
<!--    You may change the content of this page by modifying-->
<!--    the file <code>--><?//= __FILE__; ?><!--</code>.-->
<!--</p>-->
