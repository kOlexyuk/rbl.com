<?php
/* @var $this yii\web\View */
/* @var $model app\modules\main\models\StartForm */

use app\modules\guid\models\Util;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
?>
<?php \yii\widgets\Pjax::begin(); ?>
<?php $form = ActiveForm::begin(['id' => 'start-search-form',
    'action' => 'en/profile-list',
    'method'=>'post',
    'enableAjaxValidation' => true , 'options'=>['class'=>'']]); ?>

<?=Html::input('hidden',"selected_region_id",'0',['id'=>'selected_region_id' , 'data-label'=>'']);?>
<?=Html::input('hidden',"selected_service_area_id",'0',['id'=>'selected_service_area_id' , 'data-label'=>'']);?>
<?=Html::input('hidden',"selected_service_id",'0',['id'=>'selected_service_id' , 'data-label'=>'']);?>



<div class="row ">
    <div class="col-xl-10 col-lg-12 col-md-12 d-block mx-auto text-center">
        <div class="selectgroup selectgroup-pills">
            <label class="selectgroup-item">
                <input type="radio"  name="rb_person_type" value="2" class="selectgroup-input" checked="">
                <span class="selectgroup-button"><?=Yii::t('app','All')?></span>
            </label>
            <label class="selectgroup-item">
                <input type="radio" name="rb_person_type" value="1" class="selectgroup-input">
                <span class="selectgroup-button"><?=Yii::t('app','Jur.person')?></span>
            </label>
            <label class="selectgroup-item">
                <input type="radio" name="rb_person_type" value="0" class="selectgroup-input">
                <span class="selectgroup-button"><?=Yii::t('app','Nat.person')?></span>
            </label>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-10 col-lg-12 col-md-12 d-block mx-auto">
        <div class="search-background bg-transparent">
            <div class="form row no-gutters ">
                <div class="form-group col-xl-3 col-lg-3 col-md-12 select2-lg  mb-0">
                    <!--                    <input type="text" class="form-control input-lg br-tr-md-0 br-br-md-0" id="text4" placeholder="Enter Your Keywords">-->
                    <?= $form->field($model, 'service'
                    )->widget(Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map($model['serviceList'], 'id', 'value'),
                        'options' => ['placeholder' => Yii::t('app', 'Service')  ,'allowClear' => true, 'id'=>'cbService',
                            'class' => "form-control select2-show-search  border-bottom-0",
                        ],
                        'pluginOptions' => [
                            'width' => '100%',
                        ],
                    ])->label(false) ?>
                </div>
                <div class="form-group col-xl-3 col-lg-3 col-md-12 select2-lg  mb-0">
                    <!--                    <input type="text" class="form-control input-lg br-md-0" id="text5" placeholder="Select Location">-->
                    <?= $form->field($model, 'service_area'
                    )->widget(Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map($model['service_areaList'], 'id', 'value'),
                        'options' => ['placeholder' => Yii::t('app', 'Service area'), 'allowClear' => true  , 'id'=>'cbServiceArea'
                            ,'class'=>"form-control select2-show-search  border-bottom-0"
                        ],
                        'pluginOptions' => [
//                            'allowClear' => true,
                            'width' => '100%',
                        ],
                    ])->label(false) ?>
                    <!--                    <span><img src="rejoin/assets/images/svg/gps.svg" class="location-gps" alt="img"></span>-->
                </div>
                <div class="form-group col-xl-3 col-lg-3 col-md-12 select2-lg  mb-0">
                    <?= $form->field($model, 'region')->widget(Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map($model['regionList'], 'id', 'value'),
                        'options' => ['placeholder' => Yii::t('app', 'Region')
                            , 'allowClear' => true  , 'id'=>'cbRegion'
                            ,"class"=>"form-control select2-show-search  border-bottom-0"],
                        'pluginOptions' => [
                            'width' => '100%',
                        ],
                    ])->label(false) ?>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-12  mb-0">
                    <!--                    <a href="#" class="btn btn-lg btn-block btn-secondary br-tl-md-0 br-bl-md-0">Search Here</a>-->
                    <?= Html::submitButton('<i class="fa fa-search mr-1"></i>'.Yii::t('app', 'SEARCH'), ['class' => 'btn btn-lg btn-block btn-secondary br-tl-md-0 br-bl-md-0', 'name' => 'btnSearch']) ?>

                </div>

<!--                <div class="col-xl-2 col-lg-3 col-md-12 mb-0">-->
<!--                    <a href="#" class="btn btn-lg btn-block btn-secondary br-tl-md-0 br-bl-md-0"><i class="fa fa-search mr-1"></i>Search</a>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>
<div class="row header-slider-img">
    <div class="container">
        <div id="small-categories" class="owl-carousel owl-carousel-icons7">
            <?php foreach ($model['popular_search'] as $serv) : ?>
                <div class="item">
                    <div class="card mb-0">
                        <div class="card-body p-3">
                            <div class="cat-item d-flex">
                                <a href="#" class="popular_service" id="popular_service<?=$serv['id']?>" data-serv="<?=$serv['id']?>"></a>
                                <div class="cat-img mr-4 bg-secondary-transparent p-3 brround">
                                    <img src="rejoin/assets/images/products/categories/<?=$serv['photo']??'chip.png'?>" alt="img">
                                </div>
                                <div class="cat-desc text-left">
                                    <h6 class="mb-3"><?=$serv['name'];?></h6>
                                    <small class="badge badge-pill badge-secondary mr-2"><?=$serv['cnt'].' '.Yii::t('app','serv.');?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?php $form = ActiveForm::end(); ?>
<?php \yii\widgets\Pjax::end(); ?>


