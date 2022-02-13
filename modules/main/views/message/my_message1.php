<?php
/* @var $this yii\web\View */
/* @var $model app\modules\main\models\UserMessages */
/* @var $lang string */

$margin = "from";
if($model->user_id_to === Yii::$app->user->getId()){
    $margin = "to";
}
?>
<li>
<div  style="padding-bottom: 47.5938px;">
    <div class="message <?=$margin?> ready">
        <div class="">
            <div class="">
                <a target="_blank" href='<?="/".($lang??'ru').'/main/'.$model->user_id_from."/profile"?>'><strong class="text-warning"><?=$model->getUserNameFrom() ?></strong></a>
                <strong class="text-info"><?=$model->getUserNameTo() ?></strong>
                <span>&nbsp;&nbsp;</span>
                <small class="text-mute"><?=Yii::$app->formatter->asDateTime($model->created_at) ?></small>
            </div>
            <div class="">
                <?=$model->message ?>
            </div>
        </div>
    </div>
</div>
</li>
