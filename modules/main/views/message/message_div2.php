<?php
/* @var $this yii\web\View */
/* @var $model app\modules\main\models\UserMessages */

/* @var $lang string */

use kartik\rating\StarRating;

$offset = 'from';
if ($model->user_id_to === Yii::$app->user->getId())
    $offset = 'to'; ?>

<div class="media p-5 border-top mt-0">
    <div class="d-flex mr-3"><a href="#">
        </a></div>
    <div class="media-body">
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
        <p class="font-13  mb-2 mt-2">
            <?=$model->message ?>
        </p>
<!--        <a href="#" class="mr-2"><span-->
</div>
</div>


