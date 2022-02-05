<?php


//use app\modules\user\Module;
//use yii\helpers\Html;
//
//use yii\jui\AutoComplete;
//use yii\web\JsExpression;
//use yii\widgets\ActiveForm;


use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
//use yii\widget\ActiveForm;
use app\modules\user\Module;
use yii\helpers\Html;
use yii\base\Widget;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\web\View;


/* @var $this yii\web\View */
/* @var $model \app\modules\user\forms\frontend\ProfileUpdateForm */
/* @var $data mixed*/

if (YII_ENV_DEV) echo __FILE__;


$this->title = Yii::t('app', 'Profile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profile'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


$this->registerJsFile(
    '@web/js/profile.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

?>

<div class="container">

    <?php $form = ActiveForm::begin(['id' => 'profile-update-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
    <?=Html::input('hidden',"selected_services_id",'0',['id'=>'selected_service_id' , 'data-label'=>'']);?>
    <?=$form->field($model, 'deleted_service_ids')->hiddenInput(['id'=>'deleted_service_ids' , 'data-label'=>''])->label(false);?>
    <?=$form->field($model, 'added_service_ids')->hiddenInput(['id'=>'added_service_ids' , 'data-label'=>''])->label(false);?>
    <?=Html::input('hidden',"selected_region_id",'0',['id'=>'selected_region_id' , 'data-label'=>'']);?>
    <?=$form->field($model, 'deleted_region_ids')->hiddenInput(['id'=>'deleted_region_ids' , 'data-label'=>''])->label(false);?>
    <?=$form->field($model, 'added_region_ids')->hiddenInput(['id'=>'added_region_ids' , 'data-label'=>''])->label(false);?>
    <?=Html::input('hidden',"empty_photo",($data['empty_photo']??''),['id'=>'empty_photo' , 'data-label'=>'']);?>

    <div class="col-md-4 order-md-2 mb-4">
            <div class="row">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted"><?=Yii::t('app', 'Services')?></span>
                </h4>

                <ul class="list-group mb-3" id="service_list">

                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div  class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="card-text col-md-9" id="service_auto">
                                        <?= $form->field($model, 'service_empty'
                                        )->widget(Select2::classname(), [
                                            'data' => \yii\helpers\ArrayHelper::map($data['service_json'], 'id', 'value'),
                                            'options' => ['placeholder' => Yii::t('app', 'Service'), 'allowClear' => true  , 'id'=>'cbService','class'=>'form-control'
                                            ],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                                'width' => '220px',
                                                ],
                                        ])->label(Yii::t('app','')) ?>

                                    </div>
                                    <div class="card-text col-md-3">
                                        <a href="#" class="btn btn-primary" id="service-add"><?=Yii::t('app','+')?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php foreach ($model->services as $serv): ?>
                        <li id="serviceId<?=$serv->id?>" class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div class="row filters-applied__link js-gtm-layer js-filter mx-1 w-100">
                                        <div class="col-md-9 col-lg-9 col-sm-9 col-9">
                                            <?=$serv->name?>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-sm-3 col-3">
                                            <a href="#" class="service-delete btn btn-primary"><?=Yii::t('app','-')?></a>
                                        </div>
                                    </div>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="row">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted"><?=Yii::t('app', 'Regions')?></span>
                </h4>
                <ul class="list-group mb-3" id="region_list">

                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div  class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="card-text col-md-9" id="region_auto">
<!--                                        --><?//= $form->field($model, 'region_empty'
//                                            ,  ['enableLabel' => false]
//                                        )->widget(AutoComplete::classname(), [
//                                            'clientOptions' => [
//                                                'source' => $data['region_json'],
////                                                 'appendTo'=>'#service_auto',
//                                                'minLength' => '1',
//                                                'autoFill' => true,
//                                                'select' => new JsExpression("function( event, ui ) {
//                             $('#selected_region_id').val(ui.item.id);
//                              $('#selected_region_id').attr('data-label',ui.item.label);
//                           }"),
//                                            ]
//                                            , 'options'=>['class'=>'form-control']
//                                        ]) ?>

                                        <?= $form->field($model, 'region_empty')->widget(Select2::classname(), [
                                            'data' => \yii\helpers\ArrayHelper::map($data['region_json'], 'id', 'value'),
                                            'options' => ['placeholder' => Yii::t('app','Region'), 'allowClear' => true  , 'id'=>'cbRegion' , 'multiple' => true,
                                        ],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                                'width' => '220px',
                                            ],
                                        ])->label(Yii::t('app','')) ?>


                                    </div>
                                    <div class="card-text col-md-3">
                                        <a href="#" class="btn btn-primary" id="region-add"><?=Yii::t('app','+')?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php foreach ($model->regions as $reg): ?>
                        <li id="regionId<?=$reg->id?>" class="list-group-item d-flex justify-content-between lh-condensed">
                            <div class="row filters-applied__link js-gtm-layer js-filter mx-1 w-100">
                                <div class="col-md-9 col-lg-9 col-sm-9 col-9">
                                    <?=$reg->name?>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-3">
                                    <a href="#" class="region-delete btn btn-primary">Delete</a>
                                </div>
                            </div>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>

        <div class="col-md-8 order-md-1">
        <?php
            echo Html::beginTag('h4');
            echo   Yii::t('app', 'Profile');
            echo Html::endTag('h4');
        ?>
<!--            <form class="needs-validation" novalidate="">-->
            <div class="row">
              <div class="col-md-6 mb-3">

                  <?=$form->field($model, 'name')
                      ->textInput(['placeholder' => Yii::t('app', 'Surname'),'class' => 'form-control'])
//                    ->hint(Module::t('module', 'USER_USERNAME'))
                      ->label(Yii::t('app', 'Name'));
                  ?>
              </div>
              <div class="col-md-6 mb-3">

                  <?=$form->field($model, 'surname')
                      ->textInput(['placeholder' => Yii::t('app', 'Surname'),'class' => 'form-control'])
//                    ->hint(Module::t('module', 'USER_USERNAME'))
                      ->label(Yii::t('app', 'Surname'));
                  ?>
              </div>
            </div>

                <?=$form->field($model, 'username')
                    ->textInput(['placeholder' => Yii::t('app', 'Username'),'class' => 'form-control'])
//                    ->hint(Module::t('module', 'USER_USERNAME'))
                    ->label(Yii::t('app', 'Username'));
                ?>

                    <?= $form->field($model, 'email')
                    ->textInput(['placeholder' => Yii::t('app', 'Email'),'maxlength' => true,'class' => 'form-control'])
                        ->label(Yii::t('app', 'Email'),[]);?>

            <?= $form->field($model, 'phone')
                ->textInput(['type' => 'phone','class' => 'form-control'])
                ->label(Yii::t('app', 'Phone'),[])
//                ->hint('Format: 123-456-7890',['class'=>'text-muted'])
                 ;?>


<div class="row">
    <div class="col-md-7 col-lg-7 col-sm-12">
    <?=$form->field($model, 'address')
        ->textarea(['placeholder' => Yii::t('app', 'Address'),'class' => 'form-control', 'row'=>2 ])
        ->label(Yii::t('app', 'Address')); ?>
    </div>
    <div class="col-md-5 col-lg-5 col-sm-12">
        <?=$form->field($model, 'zip')
            ->textInput(['placeholder' => Yii::t('app', 'ZIP'),'class' => 'form-control'])
            ->label(Yii::t('app', 'ZIP')); ?>
    </div>

</div>

  <div class="row">
      <div class="col-md-6  col-lg-6 mb-2">
      <?= $form->field($model, 'note')->textarea(['rows' => 12])->label(Yii::t('app', 'Note')) ?>
      </div>
      <div class="col-md-6 col-lg-6   mb-2">
          <div class="form-group row">
              <div class="col-3 col-lg-3 col-md-3 align-self-center m-2">
                  <?= $form->field($model, 'photo')->fileInput([])->label(Yii::t('app', 'Photo')) ?>
              </div>
          </div>
          <div  class="form-group row">
              <div class="col-9  col-lg-9  col-md-9  align-self-center">
                  <div id="profile-image-holder" class="max_width_img_holder">
                      <img src="<?= $model->photo ?>"
                           class="img-fluid img-thumbnail float-right" align="center" id="profile_img"  name="image_profile" style="width:180px;height: 120px">
                  </div>
              </div>
          </div>
          <div  class="form-group row">
              <div class="col-9  col-lg-9  col-md-9  align-self-center">
                  <a href="#" id="btnDeleteProfilePhoto" class="photo-delete btn btn-primary float-right"><?=Yii::t('app','Delete')?></a>
              </div>
          </div>
          </div>
          <input type="hidden" name="photo_hidden" id="contact_photo" value="<?= $model->photo?>">

      </div>
  </div>



    <button class="btn btn-primary btn-lg btn-block" type="submit"><?=Yii::t('app', 'Save') ?></button>

    <?php ActiveForm::end(); ?>

</div>



