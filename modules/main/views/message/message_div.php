<?php
/* @var $this yii\web\View */
/* @var $model app\modules\main\models\UserMessages */
/* @var $lang string */

use kartik\rating\StarRating;

$offset = '';
if($model->user_id_to === Yii::$app->user->getId())
    $offset = 'col-md-offset-1';

?>
<!--<div class="container contact-info">-->
    <div class="row" >
        <div class="col-md-11 <?=$offset ?>">
        <div class="panel panel-info">
            <div class="panel-heading">
                <a target="_blank" href='<?="/".($lang??'ru').'/main/'.$model->user_id_from."/profile"?>'><strong class="text-warning"><?=$model->getUserNameFrom() ?></strong></a>
                <strong class="text-info"><?=$model->getUserNameTo() ?></strong>
                <span>&nbsp;&nbsp;</span>
                <small class="text-mute"><?=Yii::$app->formatter->asDateTime($model->created_at) ?></small>
                <div>
                <?php for($i=1;$i<6;$i++): ?>
                 <?php if($i<= $model->stars ): ?>
                   <small class="text-warning glyphicon glyphicon-star"></small>
                  <?php else: ?>
                   <small class="text-warning glyphicon glyphicon-star-empty"></small>
                  <?php endif; ?>
                <?php endfor; ?>
                </div>
            </div>
            <div class="panel-body">
                <?=$model->message ?>
            </div>

        </div>
        </div>

    </div>

