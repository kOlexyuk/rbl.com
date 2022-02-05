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
use yii\helpers\ArrayHelper;
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

$this->registerCssFile('@web/rejoin/assets/plugins/fileuploads/css/dropify.css');

$this->registerJsFile(
    '@web/js/profile.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
    '@web/rejoin/assets/js/dropify.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
    '@web/rejoin/assets/js/dropfy-custom.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$script = " resetPreview('dropify',".\yii\helpers\Json::htmlEncode( $model->photo).", 'Image.jpg');";
$this->registerJs($script, View::POS_LOAD);


//$this->registerJsFile(
//    '@web/rejoin/assets/js/upload.js',
//    ['depends' => [\yii\web\JqueryAsset::className()]]
//);

?>

<section class="sptb">
    <div class="container">
        <?php $form = ActiveForm::begin(['id' => 'profile-update-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
        <?=Html::input('hidden',"selected_services_id",'0',['id'=>'selected_service_id' , 'data-label'=>'']);?>
        <?=$form->field($model, 'deleted_service_ids')->hiddenInput(['id'=>'deleted_service_ids' , 'data-label'=>''])->label(false);?>
        <?=$form->field($model, 'added_service_ids')->hiddenInput(['id'=>'added_service_ids' , 'data-label'=>''])->label(false);?>
        <?=Html::input('hidden',"selected_region_id",'0',['id'=>'selected_region_id' , 'data-label'=>'']);?>
        <?=$form->field($model, 'deleted_region_ids')->hiddenInput(['id'=>'deleted_region_ids' , 'data-label'=>''])->label(false);?>
        <?=$form->field($model, 'added_region_ids')->hiddenInput(['id'=>'added_region_ids' , 'data-label'=>''])->label(false);?>
        <?=Html::input('hidden',"empty_photo",($data['empty_photo']??''),['id'=>'empty_photo' , 'data-label'=>'']);?>
        <div class="row ">
            <div class="col-lg-10 col-md-12 col-sm-12">
                <div class="card dropify-image-avatar">
                    <div class="card-header ">
                        <h3 class="card-title"><?=Yii::t('app', 'Personal Data')?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 mb-4 mb-lg-0">
<!--                                <input type="file" class="dropify" data-default-file="/rejoin/assets/images/users/avatar.png" data-height="180"/>-->
<!--                                --><?//= $form->field($model, 'photo')
//                                    ->fileInput(['class'=>"dropify", 'data-default-file'=>"/rejoin/assets/images/users/avatar.png", 'data-height'=>"180" ])
//                                    ->label(false) ?>

                                <?php echo $form->field($model, 'photo')->widget(\diecoding\dropify\Dropify::className(), [
                                'options' => [ 'data-default-file'=> "/rejoin/assets/images/users/avatar.png", 'data-height'=>"180"
                               ],
                                'pluginOptions' => [
//                                        'imgFileExtensions' => ['png', 'jpg', 'jpeg', 'gif', 'bmp', 'ico', 'webp', 'svg' , '*'],
//                                        'allowedFileExtensions'=>['*']
                                        // ?? "/rejoin/assets/images/users/avatar.png"
//                                    'src'=>$model->photo
                                        // options for dropify, as output  ```$(#options['id']).dropify(pluginOptions);```
                                   // 'src'=>$model->photo  //?? "/rejoin/assets/images/users/avatar.png",
                                        ]
                                ]) ?>
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?=$form->field($model, 'name')
                                                ->textInput(['placeholder' => Yii::t('app', 'Your Name'),'class' => 'form-control'])
                                                ->label(Yii::t('app', 'Name'),['class'=>'form-label text-dark']);
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <?=$form->field($model, 'username')
                                                ->textInput(['placeholder' => Yii::t('app', 'Username'),'class' => 'form-control'])
                                                ->label(Yii::t('app', 'Username'),['class'=>'form-label text-dark']);
                                            ?>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <?= $form->field($model, 'email')
                                                ->textInput(['placeholder' => Yii::t('app', 'Email'),'maxlength' => true,'class' => 'form-control'])
                                                ->label(Yii::t('app', 'Email'),['class'=>'form-label text-dark']);?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?=$form->field($model, 'surname')
                      ->textInput(['placeholder' => Yii::t('app', 'Surname'),'class' => 'form-control'])
                      ->label(Yii::t('app', 'Surname'),['class'=>'form-label text-dark']); ?>
                                        </div>
                                        <div class="form-group">
                                            <?=$form->field($model, 'zip')
                                                ->textInput(['placeholder' => Yii::t('app', 'ZIP'),'class' => 'form-control'])
                                                ->label(Yii::t('app', 'ZIP'),['class'=>'form-label text-dark']); ?>
                                        </div>
                                        <div class="form-group mb-0">
                                            <?= $form->field($model, 'phone')
                                                ->textInput(['type' => 'phone','class' => 'form-control'])
                                                ->label(Yii::t('app', 'Phone'),['class'=>'form-label text-dark'])
                                            ;?>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <?=$form->field($model, 'address')
                                                ->textarea(['placeholder' => Yii::t('app', 'Address'),'class' => 'form-control', 'row'=>2 ])
                                                ->label(Yii::t('app', 'Address'),['class'=>'form-label text-dark']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-0">
                                            <?= $form->field($model, 'web')
                                                ->textInput(['type' => 'text','class' => 'form-control'])
                                                ->label(Yii::t('app', 'Web'),['class'=>'form-label text-dark'])
                                            ;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $form->field($model, 'language')
                                            ->textInput(['type' => 'text','class' => 'form-control'])
                                            ->label(Yii::t('app', 'Language'),['class'=>'form-label text-dark'])
                                        ;?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
<!--                                        <div class="checkbox checkbox-info">-->
<!--                                        --><?//= $form->field($model, 'show_contact')
//                                            ->checkbox(['class' => 'form-control'
//                                            ,'template' => '<div class="custom-control-input">{input}</div><div class="custom-control mt-4 custom-checkbox">{label}</div><div class="col-4">{error}</div>'])
//                                            ->label(Yii::t('app', 'Show contats'),['class'=>'form-label text-dark'])
//                                        ;?>

                                        <?= $form->field($model, 'show_contact')
                                            ->checkbox(['class' => 'custom-control-input'
                                                ,'template' => '<label class="custom-control mt-4 custom-checkbox">{input}
                                                                 <span class="custom-control-label text-dark pl-2">{label}
                                                                 </span></label>'
                                            ])
                                            ->label(Yii::t('app', 'Show contats'))
                                        ;?>
<!--                                        </div>-->



<!--                                        <div class="checkbox checkbox-info"> -->
<!--                                            <label class="custom-control mt-4 custom-checkbox">-->
<!--                                                <input type="checkbox" class="custom-control-input" form='profile-update-form'>-->
<!--                                                <span class="custom-control-label text-dark pl-2">--><?//=Yii::t('app', 'Show contats')?><!--</span>-->
<!--                                            </label>-->
<!--                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title"><?=Yii::t('app', 'Regions')?></h3>
                        <div class="card-options">
                            <!--                            <a class="btn btn-light btn-sm" href="#"><i class="fa fa-plus"></i> Add Another</a>-->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label"><?=Yii::t('app', 'Regions')?></label>
                            <?= $form->field($model, 'regions')->widget(Select2::classname(), [
                                'theme' => Select2::THEME_DEFAULT,
                                'data' => \yii\helpers\ArrayHelper::map($data['region_json'], 'id', 'value'),
                                'options' => ['placeholder' => Yii::t('app','Region'), 'allowClear' => true  , 'id'=>'cbRegion' , 'multiple' => true,
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true,
//                                    'width' => '220px',
                                ],
                            ])->label(false) ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title"><?=Yii::t('app', 'Services')?></h3>
                        <div class="card-options">
<!--                            <a class="btn btn-light btn-sm" href="#"><i class="fa fa-plus"></i> Add Another</a>-->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Professional Skills</label>


                            <?= $form->field($model, 'services'
                            )->widget(Select2::classname(), [
                                'theme' => Select2::THEME_DEFAULT,
                                'data' => \yii\helpers\ArrayHelper::map($data['service_json'], 'id', 'value'),
                                'options' => ['placeholder' => Yii::t('app', 'Service'), 'allowClear' => true  , 'id'=>'cbService','class'=>'form-control select2-no-search', 'multiple' => true,
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true,
//                                    'width' => '220px',
                                ],
                            ])->label(false) ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title"><?=Yii::t('app', 'Note')?></h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
<!--                            <label class="form-label">Write Personal Skills <span class="form-label-small">56/100</span></label>-->
<!--                            <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="text here.."></textarea>-->
                            <?= $form->field($model, 'note')->textarea(['rows' => 6 , 'placeholder'=>"text here.."])->label(Yii::t('app', 'Note'),['class'=>'form-label']) ?>
                        </div>
                    </div>
                </div>

                <div class="float-right mb-4 mb-lg-0">
<!--                    <a class="btn btn-success w-150" href="#">Finish</a>-->
                    <button class="btn btn-success w-150" type="submit"><?=Yii::t('app', 'Save') ?></button>
                </div>
            </div>
        </div>
        <input type="hidden" name="photo_hidden" id="contact_photo" value="<?= $model->photo?>">

        <?php ActiveForm::end(); ?>
    </div>
</section>



