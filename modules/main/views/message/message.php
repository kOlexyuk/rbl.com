<?php
/* @var $this yii\web\View */
/* @var $model app\modules\main\models\UserMessages */

use kartik\rating\StarRating;

$offset = '';
if($model->user_id_to === Yii::$app->user->getId())
    $offset = 'col-md-offset-1';

?>
<!--<div class="container contact-info">-->
<div class="row" >
    <div class="col-md-11 <?=$offset ?>">
        <div class="panel panel-info">
            <div class="panel-heading" style="display: flex">
               <div class="col-3 col-md-3 col-lg-3 ">

                   <?php if($model['user_id_from'] !== Yii::$app->getUser()->getId()) :?>
                           <a target="_blank" href='<?="/".($lang??'ru').'/main/'.$model->user_id_from."/profile"?>'>
                           <strong class="text-warning"><?=$model->getUserNameFrom() ?></strong>
                           </a><span>&nbsp;</span>
                           <strong class="text-info"><?=$model->getUserNameTo() ?></strong>
                   <?php else: ?>
                           <strong class="text-warning"><?=$model->getUserNameFrom() ?></strong>
                           <span>&nbsp;</span>
                           <a target="_blank" href='<?="/".($lang??'ru').'/main/'.$model->user_id_to."/profile"?>'>
                           <strong class="text-info"><?=$model->getUserNameTo() ?></strong>
                           </a>
                   <?php endif; ?>



                <span>&nbsp;</span>
                <small class="text-mute"><?=Yii::$app->formatter->asDateTime($model->created_at) ?></small>
               </div>
                <div class="col-3 col-md-3 col-lg-3">
                <?php if($model['is_review']): ?>

                    <?php for($i=1;$i<6;$i++): ?>
                        <?php if($i<= $model->stars ): ?>
                            <small class="text-warning glyphicon glyphicon-star"></small>
                        <?php else: ?>
                            <small class="text-warning glyphicon glyphicon-star-empty"></small>
                        <?php endif; ?>
                    <?php endfor; ?>
                <?php endif; ?>
                </div>
                <div class="col-6 col-md-6 col-lg-6 " >
                    <div class="row justify-content-end">
                        <div class="col-3 col-md-3 col-lg-3 mr-2">

                          <button type="button" id="btnRead_<?=$model['id'];?>"
                                  class="btnMsg btn <?= ($model['read'] == 0?"btn-success":"btn-info") ;?> <?=($model['user_id_from'] !== Yii::$app->getUser()->getId())?"":"disabled";?>"><?=Yii::t('app', 'Read')?></button>

                          </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <?=$model->message ?>
            </div>

        </div>
    </div>

</div>

