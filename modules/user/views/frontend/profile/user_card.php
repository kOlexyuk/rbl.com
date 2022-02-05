<?php
/* @var $puser array */
/* @var $lang1 string */
/* @var $pdf int */

use app\modules\guid\models\Util;
use app\modules\user\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$image = $puser['photo']??Yii::$app->params['user.empty_photo'];

?>

<!--<div class="panel panel-default">-->
<!--    <div class="panel-body row">-->
<!--        <div class="col-md-2 col-lg-2 col-sm-6">-->
<!--            <img src="--><?//=$image?><!--" class="panel-image-right img-thumbnail" alt="..." style="width:100px; height:80px">-->
<!--        </div>-->
<!--        <div class="col-md-8 col-lg-8 col-sm-9">-->
<!--            <a href='--><?//="/".$lang1.'/main/'.$puser['id']."/profile"?><!--' target="_blank"><h4>--><?//=$puser['username']?><!--</h4></a>-->
<!--            <p class="text-info">-->
<!--                --><?//=$puser['services']?>
<!--            </p>-->
<!--            <p class="text-warning">-->
<!--                --><?//=$puser['regions']?>
<!--            </p>-->
<!--            <p class="text-muted">-->
<!--                --><?//=Util::toShortString($puser['note'])?>
<!--            </p>-->
<!--        </div>-->
<!---->
<!--    <div class="col-lg-2 col-md-2 col-sm-6">-->
<!--        --><?php //if(!Yii::$app->user->isGuest && $pdf !== 1):?>
<!--            --><?php // $fav1 =  User::findOne(Yii::$app->user->id)->getFavorites()->where(['favorite_user_id' => $puser['id']])->one(); ?>
<!--            --><?//= Html::Button($fav1?Yii::t('app', "Remove from favorite"):Yii::t('app', "Add to favorite")
//                ,  ['class' => "btn-user-favorite btn btn-sm ".($fav1?"btn-success":"btn-primary") , 'id'=>'btnFavorite_'.$puser['id']]) ?>
<!--        --><?php //endif; ?>
<!--    </div>-->
<!--    </div>-->
<!--</div>-->
<!--</div>-->
<div class="panel panel-default">
<div class="panel-body row">
    <div class="col-8 col-sm-6 col-md-4 col-lg-3 col-xl-2 text-center align-self-center"><a href="#"><img class="img-fluid" src="<?=$image?>" width="100px" height="80px"></a></div>
    <div class="col-md-8 col-lg-6 col-xl-7">
        <a href='<?="/".$lang1.'/main/'.$puser['id']."/profile"?>' target="_blank"><h4><?=$puser['username']?></h4></a>
        <p class="text-info">
            <?=$puser['services']?>
        </p>
        <p class="text-warning">
            <?=$puser['regions']?>
        </p>
        <p class="text-muted">
            <?=Util::toShortString($puser['note'])?>
        </p>
    </div>
    <div class="col-lg-3 text-center align-items-center align-content-center align-self-center">
<!--        <button class="btn btn-primary d-xl-flex justify-content-xl-start" type="button">Добавить в избранное</button>-->

        <?php if(!Yii::$app->user->isGuest && $pdf !== 1):?>
            <?php  $fav1 =  User::findOne(Yii::$app->user->id)->getFavorites()->where(['favorite_user_id' => $puser['id']])->one(); ?>
            <?= Html::Button($fav1?Yii::t('app', "Remove from favorite"):Yii::t('app', "Add to favorite")
                ,  ['class' => "btn-user-favorite btn btn-sm ".($fav1?"btn-success":"btn-primary") , 'id'=>'btnFavorite_'.$puser['id']]) ?>
        <?php endif; ?>
    </div>
</div>
</div>