<?php

use app\modules\user\models\User;
use app\modules\user\Module;
use kartik\rating\StarRating;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
//use kartik\rating\StarRating;

/* @var $this yii\web\View */
/* @var $model \app\modules\user\models\backend\User */
/* @var $message \app\modules\main\models\UserMessages */
/* @var $my_message \app\modules\main\models\UserMessages[] */
if (YII_ENV_DEV) echo __FILE__;

//StarRating::bsVersion

$this->registerJsFile('@web/js/view_profile.js'
    ,  ['depends' => [\yii\web\JqueryAsset::className()]
//        ,'position' => \yii\web\View::POS_END
    ]);

$this->registerCssFile("https://use.fontawesome.com/releases/v5.3.1/css/all.css", [
//    'depends' => [\yii\bootstrap\BootstrapAsset::class],
]);

$this->title = $model['username'];
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'ADMIN_USERS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-12">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= /** @var TYPE_NAME $model */
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute'=>$model['username'],
                    'value'=>$model['photo'],
                    'format' => ['image',['width'=>'100','height'=>'100']],
                    'captionOptions' => ['style'=>'font-size:large;font-weight:900; color:#000080']
                ],

                [
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
                    'value' => $model['regions'] ,
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
                    'attribute' => Yii::t('app', "View count"),
                    'value' => $model['view_count'],
                ],

            ]]) ?>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 mb-4">
        <?php if(!Yii::$app->user->isGuest):?>
            <?php $form = ActiveForm::begin(['id' => 'form_user_favorite',
                'action' => '/en/main/user-favorite/set',
                'method'=>'post',
                'enableAjaxValidation' => false , 'options'=>['class'=>'']]); ?>
            <?php  $fav1 =  User::findOne(Yii::$app->user->id)->getFavorites()->where(['favorite_user_id' => $model['id']])->one(); ?>
            <?=Html::input('hidden',"hiddenFavorite",$model['id'],['id'=>'hiddenFavorite' , 'data-label'=>'']);?>
            <?= Html::submitButton($fav1?Yii::t('app', "Remove from favorite"):Yii::t('app', "Add to favorite")
                ,  ['class' => 'btn btn-lg btn-primary' , 'id'=>'btnFavorite']) ?>
            <?php ActiveForm::end() ?>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-12">
        <ul class="list-group list-group-review" id="ul_review">
            <?php foreach ($my_message as $msg): ?>
                <?= $this->renderFile("@app/modules/main/views/message/review.php",
                    ['model'=>$msg,]); ?>
            <?php endforeach; ?>
        </ul>


        <?php if(!Yii::$app->user->isGuest && (Yii::$app->user->getId() != $model['id'])): ?>
            <div class="row hidden " id="row_not_mesage">
                <div class="col-md-offset-1 col-md-10 col-sm-12 margin-top-30">
                    <h3 class="text-success"><?=Yii::t('app', "Sent") ?></h3>
                </div>
            </div>

        <div class="card" style="border-style: solid;border-color: var(--gray);border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
            <input type="hidden"  value="<?= $model['id'] ?>" id="user_id_to">
            <div class="card-header">
                <div class="row hidden " id="row_not_mesage">
                    <div class="col-md-offset-1 col-md-10 col-sm-12 margin-top-30">
                        <h3 class="text-success"><?=Yii::t('app', "Sent") ?></h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col">
                    <div ><textarea class="form-control" id="txt_review" required></textarea></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?php  $canSend = (\app\modules\main\models\UserMessages::isCanSendReviw($model['id'])); ?>
                           <?php if( $canSend ):?>
                    <div  id="review_stars">
                        <div class="col-md-offset-1 col-md-6 col-sm-12"  id="div_stars">
                            <?= $form->field($message, 'stars')->widget(StarRating::classname(), [
                                'pluginOptions' => ['step' => 1],
                            ]);?>
                        </div>
                    </div>
                            <?php endif;?>
                        </div>
                    </div>
                            <div class="row">
                                <div class="col">
                    <div>
                        <div class="btn-group" role="group">
                            <?php if($canSend): ?>
                            <button class="btn btn-primary" type="button" id="btn_send_review"><?= Yii::t('app','Send feedback')?></button>
                            <? endif;?>
                            <button class="btn btn-info" type="button" id="btn_send_message"><?= Yii::t('app','Send message')?></button></div>

                    </div>
                                </div>
                            </div>
                     </div>
        </div>
        <?php endif; ?>
    </div>
</div>
</div>