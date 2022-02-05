<?php
/* @var $puser array */
/* @var $lang1 string */
/* @var $pdf int */

use app\modules\guid\models\Util;
use app\modules\user\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$image = ($puser['photo']??Yii::$app->params['user.empty_photo']);

?>


<div class="card card-listing overflow-hidden">
    <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning"><i class="fa fa-bolt"></i></span></div>
    <div class="card-body">
        <div class="d-sm-flex">
            <img class="avatar avatar-xxl  d-block br-7 cover-image mr-4" src="<?=$image?>">
            <div class="employer-icons">
                <a href='<?="/".$lang1.'/main/'.$puser['id']."/profile"?>' target="_blank" class="font-weight-semibold fs-18 text-body"><?=$puser['username']?></a>
                <div class="mt-2"><i class="fa fa-user mr-1"></i><?=$puser['services_ref']?></div>
                <div class="mt-1"><i class="fa fa-map-marker mr-1"></i><?=$puser['regions']?></div>
                <div class="mt-1"><i class="fa fa-star mr-1"></i><?=Util::showStars($puser['rating'])?><?=$puser['rating']?></div>
                <div class="mt-1"><i class="fa fa-briefcase mr-1"></i><?=Util::toShortString($puser['note'])?></div>
<!--                <div class="mt-1">-->
<!--                    <span><i class="fa fa-tag mr-1"></i> Skills :</span>-->
<!--                    <span class="text-primary">C#</span>,-->
<!--                    <span class="text-primary">JAVA</span>,-->
<!--                    <span class="text-primary">C++</span>,-->
<!--                    <span class="text-primary">HTML</span>,-->
<!--                    <span class="text-primary">Bootstrap</span>-->
<!--                </div>-->
            </div>
            <div class="ml-auto">
                    <div class="">
                        <div class=" text-center float-left">
                            <?php if(!Yii::$app->user->isGuest && $pdf !== 1):?>
                                <?php  $fav1 =  User::findOne(Yii::$app->user->id)->getFavorites()->where(['favorite_user_id' => $puser['id']])->one(); ?>
                                <?= Html::a('<i class="fa fa-heart-o"></i>' , null
                                    ,  ['class' => "btn-user-favorite btn btn-sm text-white ".($fav1?"btn-success":"btn-primary") , 'id'=>'btnFavorite_'.$puser['id']
                                    , 'data-toggle'=>"tooltip" , 'data-original-title' => $fav1?Yii::t('app', "Remove from favorite"):Yii::t('app', "Add to favorite")
                                    ]) ?>
                            <?php endif; ?>

                            <!--                        <a href="#" class="border p-0"><i class="fa fa-facebook"></i></a>-->
                            <!--                        <a href="#" class="border p-0"><i class="fa fa-twitter"></i></a>-->
                            <!--                        <a href="#" class="border p-0"><i class="fa fa-pinterest"></i></a>-->
                        </div>
                    </div>

            </div>
        </div>
    </div>
    <div class="card-footer bg-light-50">
        <div class="row">
            <div class="product-filter-desc col">
                <div class="product-filter-icons text-center float-left">
<!--                    <a href="tel:0-000-000-000" class="border text-primary p-0"><i class="fa fa-phone"></i></a>-->
<!--                    <a href="#" class="border text-primary p-0" data-toggle="modal" data-target="#contact1"><i class="fa fa-envelope"></i></a>-->
<!--                    <a href="#" class="border text-primary p-0" data-toggle="modal" data-target="#comment"><i class="fa fa-comment"></i></a>-->
                </div>
            </div>
            <div class="col col-auto">
                <?php $duration = implode(array_slice(explode(',', Yii::$app->formatter->asDuration(time() - $puser['created_at'])),0,2)); ?>
                <div class="btn btn-light font-weight-semibold text-dark mt-1 mb-1 m-sm-0"><i class="fa fa-briefcase mr-1"></i><?=Yii::t('app',"Exp:").' '
                    .$duration; ?></div>
<!--                <a href="#"  class="mt-1 mb-1 m-sm-0 btn btn-outline-primary employers-btn"><i class="fa fa-download"></i> Download Resume</a>-->
            </div>
        </div>
    </div>
</div>


