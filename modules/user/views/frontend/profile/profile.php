<?php
use app\modules\guid\models\Util;
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
/* @var $model app\modules\user\models\User */
/* @var $message \app\modules\main\models\UserMessages */
/* @var $my_message \app\modules\main\models\UserMessages[] */
if (YII_ENV_DEV)     echo __FILE__;
?>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="wideget-user">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="wideget-user-desc d-sm-flex">
                                <div class="wideget-user-img mr-6 mb-2 mb-sm-0"><img class="brround" src="<?=$model['photo']?>" alt="img" width="128px" height="128px"> </div>
                                <div class="user-wrap wideget-user-info"> <a href="#" class="text-dark"><h4 class="font-weight-semibold mb-2"><?=$model['name'].' '.$model['surname']?></h4></a>
                                    <!-- registration date -->
                                    <h6 class="text-muted mb-1"><span class="text-dark"><?=Yii::t('app',"Member Since:")?></span> <?=Yii::$app->formatter->asDate($model['created_at'])?></h6>
                                    <!-- /registration date -->
                                    <div class="wideget-user-rating"> <a href="#"><?=Util::showStars($model['rating'])?></a> <span>(<?=$model['view_count']?> <?=Yii::t("app","Review")?>)</span> </div>
                                    <div class="wideget-user-icons mt-2"> <a href="#" class="facebook-bg mt-0"><i class="fa fa-facebook"></i></a> <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a> <a href="#" class="google-bg"><i class="fa fa-google"></i></a> <a href="#" class="dribbble-bg"><i class="fa fa-dribbble"></i></a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="tab-content">
            <div class="wideget-user-tab">
                <div class="tab-menu-heading">
                    <div class="tabs-menu1">
                        <ul class="nav">
                            <li class=""><a href="#tab-5" class="active" data-toggle="tab"><?=Yii::t('app','Profile')?></a></li>
                            <li><a href="#tab-7" data-toggle="tab" class=""><?=Yii::t('app','Feedback')?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane active" id="tab-5">
                <div class="card mb-0 border-0">
                    <div class="card-body">
                        <div class="profile-log-switch">
                            <div class="media-heading">
                                <h3 class="card-title mb-3 font-weight-bold"><?=Yii::t('app','Personal Details')?></h3>
                            </div>
                            <ul class="usertab-list mb-0">
                                <li><a href="#" class="text-dark"><span class="font-weight-semibold"><?=Yii::t('app','Full Name :')?></span><?=$model['name'].' '.$model['surname']?></a></li>
                                <li><a href="#" class="text-dark"><span class="font-weight-semibold"><?=Yii::t('app','Location')?> :</span><?=$model['regions']?></a></li>
                                <li><a href="#" class="text-dark"><span class="font-weight-semibold"><?=Yii::t('app','Languages')?> :</span><?=$model['language']?></a></li>
                                <li><a href="#" class="text-dark"><span class="font-weight-semibold"><?=Yii::t('app','Website')?> :</span><?=$model['web']?></a></li>
                                <li><a href="#" class="text-dark"><span class="font-weight-semibold"><?=Yii::t('app','Email')?> :</span> <?=$model['email']?></a></li>
                                <li><a href="#" class="text-dark"><span class="font-weight-semibold"><?=Yii::t('app','Phone')?> :</span> <?=$model['phone']?> </a></li>
                            </ul>
                            <div class="row profie-img">
                                <div class="col-md-12">
                                    <div class="media-heading">
                                        <h3 class="card-title mb-3 font-weight-bold"><?=Yii::t('app','Note')?> :</h3>
                                    </div>
                                    <div><?=$model['note']?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($my_message) :?>
            <div class="tab-pane userprof-tab" id="tab-7">
                <!--Job listing-->
                <div class="card mb-0 border-0">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-lg-12 col-md-12  col-sm-12">
                                <div class="panel panel-info" >
                                    <div class="panel-heading" >
                                        <?= Yii::t('app', 'Feedbacks') ?>
                                    </div>
                                    <div class="col-lg-12 col-md-12  col-sm-12" style="height:300px;background-color: #E6F3FF" id="chat">

                                        <?php foreach ($my_message as $msg): ?>
                                            <?= $this->renderFile("@app/modules/main/views/message/message_div.php",
                                                ['model'=>$msg,]); ?>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if(!Yii::$app->user->isGuest && (Yii::$app->user->getId() != $model['id'])): ?>
                            <div class="row hidden" id="row_message_form">
                                <div class="col-lg-12">
                                    <?php   Pjax::begin();?>
                                    <?php $form = ActiveForm::begin(['id' => 'send_message',
                                        'action' => '/en/main/message/send',
                                        'method'=>'post',
                                        'enableAjaxValidation' => false , 'options'=>['class'=>'']]); ?>
                                    <?= Html::hiddenInput('user_id_to', $model['id'], ['options'=>['id'=>'user_id_to']]); ?>
                                    <?= Html::hiddenInput('user_id_from', Yii::$app->user->getId(), ['options'=>['id'=>'user_id_from']]); ?>
                                    <?=$form->field($message , 'is_review')->hiddenInput(['id'=>'usermessages-is_review']); ?>
                                    <div class="form-group">
                                        <div class="col-lg-9 col-md-9 col-12">
                                            <?= $form->field($message,'message', ['options'=>['id'=>'message_txt']])
                                                ->textarea(['rows' => 2, 'cols' => 5 , 'required'=> true])->label(Yii::t('app',"Type message"));?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-offset-1 col-md-6 col-sm-12"  id="div_stars">
                                            <?= $form->field($message, 'stars')->widget(StarRating::classname(), [
                                                'pluginOptions' => ['step' => 1],
//                                'bsVersion'=>'4.x',
                                            ]);?>
                                        </div>
                                        <!--                        <div class="col-md-offset-1 col-md-4 col-sm-12">-->
                                        <!--                            --><?//= $form->field($message, 'is_review')
                                        //                                ->dropDownList([1=>Yii::t('app','Review'),0=>Yii::t('app','Message')  ],['disabled'=>'true' , 'style'=>'display:none'])->label(false);?>
                                        <!--                        </div>-->
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-1 col-md-11 col-sm-12">
                                            <?= Html::submitButton(Yii::t('app','Send'), ['class' => 'btn btn-primary']) ?>
                                        </div>
                                    </div>
                                    <?php ActiveForm::end() ?>
                                    <?php   Pjax::end();?>
                                </div>
                            </div>
                            <div class="row hidden " id="row_not_mesage">
                                <div class="col-md-offset-1 col-md-10 col-sm-12 margin-top-30">
                                    <h3 class="text-success"><?=Yii::t('app', "Sent") ?></h3>
                                </div>
                            </div>

                            <div class="row " id="div_message_button">
                                <div class="col-md-8 margin-top-30">
                                    <?php if(\app\modules\main\models\UserMessages::isCanSendReviw($model['id'])): ?>
                                        <button type="button" class="btn btn-info btn-single " id="btn_send_review"><?= Yii::t('app','Send review')?></button>
                                    <?php endif; ?>

                                    <button type="button" class="btn btn-outline-success" id="btn_send_message"><?= Yii::t('app','Send message')?></button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!--Job Listing-->
            </div>
            <?php endif; ?>
          </div>
    </div>
</div>
