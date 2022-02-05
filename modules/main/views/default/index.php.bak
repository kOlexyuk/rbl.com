<?php

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\StartForm */

use app\modules\guid\models\Util;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

//if (YII_ENV_DEV) echo __FILE__;
$this->title = Yii::$app->name;

?>

    <?php \yii\widgets\Pjax::begin(); ?>
    <?php $form = ActiveForm::begin(['id' => 'start-search-form',
        'action' => 'en/profile-list',
        'method'=>'post',
        'enableAjaxValidation' => true , 'options'=>['class'=>'']]); ?>

    <?=Html::input('hidden',"selected_region_id",'0',['id'=>'selected_region_id' , 'data-label'=>'']);?>
    <?=Html::input('hidden',"selected_service_area_id",'0',['id'=>'selected_service_area_id' , 'data-label'=>'']);?>
    <?=Html::input('hidden',"selected_service_id",'0',['id'=>'selected_service_id' , 'data-label'=>'']);?>
<!--    --><?//=$form->field($model, 'selected_service_area_id')->hiddenInput(['id'=>'selected_service_area_id' , 'data-label'=>''])->label(false);?>
<!--    --><?//=$form->field($model, 'selected_service_id')->hiddenInput(['id'=>'selected_service_id' , 'data-label'=>''])->label(false);?>
<!--    --><?//=$form->field($model, 'selected_region_id')->hiddenInput(['id'=>'selected_region_id' , 'data-label'=>''])->label(false);?>
    <div class="row mb-3">
        <div class="col-lg-3">
            <div class="btn-group  w-100" >
                <?= $form->field($model, 'service'
                )->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map($model['serviceList'], 'id', 'value'),
//                    'size' => Select2::MEDIUM,
                    'options' => ['placeholder' => Yii::t('app', 'Service'), 'allowClear' => true  , 'id'=>'cbService'

                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'width' => '250px',

                    ],
                ])->label(Yii::t('app', 'Service')) ?>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="btn-group  w-100">
            <?= $form->field($model, 'service_area'
            )->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map($model['service_areaList'], 'id', 'value'),
                'options' => ['placeholder' => Yii::t('app', 'Service area'), 'allowClear' => true  , 'id'=>'cbServiceArea'
//                    'select' => new JsExpression("function( event, ui ) {
//                     console.log(ui.item);
//                             $('#selected_service_area_id').val(ui.item.id);}"),
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                    'width' => '250px',
                ],
            ])->label(Yii::t('app', 'Service area')) ?>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="btn-group  w-100">
                <?= $form->field($model, 'region')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map($model['regionList'], 'id', 'value'),
                    'options' => ['placeholder' => Yii::t('app', 'Region'), 'allowClear' => true  , 'id'=>'cbRegion'
//                    'select' => new JsExpression("function( event, ui ) {
//                             console.log(ui.item);
//                             $('#selected_region_id').val(ui.item.id);}"),
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'width' => '250px',
                    ],
                ])->label(Yii::t('app', 'Region')) ?>
            </div>
        </div>
        <div class="col-lg-2 align-self-center align-self-lg-center  align-content-center">
            <div class="btn-group mt-3">
            <?= Html::submitButton(Yii::t('app', 'SEARCH'), ['class' => 'btn btn-primary btn-flat form-control', 'name' => 'btnSearch']) ?>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-lg-11">
            <ul class="filters-applied__list">
                <?php foreach ($model['popular_search'] as $keyp => $pval) : ?>
                    <li class="filters-applied__item" data-gtm="Interactions-click-filterOff" data-gtm-filter="">
                        <button type="button"
                                class="filters-applied__link js-gtm-layer js-filter popular_service"  id="popular_service<?=$keyp?>">
                            <?=$pval;?>
                        </button>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <?php $form = ActiveForm::end(); ?>
    <?php \yii\widgets\Pjax::end(); ?>


    <div class="container">
        <div class="row m-2 font-weight-bolder">
            <div class="col-12">
                <span><?= Yii::t('app','Found offers: ')?></span><span id="span_popular_profile_cnt"><?=count($model['popular_profile']) ?></span>
            </div>
        </div>
        <div class="row">

            <div id="div_profile_list" class="col-md-10 col-lg10">

                <?php
                $lang = $_SESSION['_language'];
                $content = "";
                foreach ($model['popular_profile'] as $puser){
                $content .= $this->render('@app/modules/user/views/frontend/profile/user_card.php', ['puser'=>$puser , 'lang1'=>$lang, 'pdf'=>0] );
                }
                echo $content;
                ?>
            </div>
            <div class="col-md-1 col-lg1"></div>
        </div>
    </div>


