<?php
/* @var $this yii\web\View */
/* @var $model app\modules\main\models\UserMessages */
/* @var $lang string */


use app\modules\guid\models\Util;


//$offset = '';
//if($model->user_id_to === Yii::$app->user->getId())
//    $offset = 'col-md-offset-1';

$person_id = $model->user_id_to;
$person = $model->getUserNameTo();
if($model->user_id_to === Yii::$app->user->getId()){
    $person_id = $model->user_id_from;
    $person = $model->getUserNameFrom();
}
?>

<li class="list-group-item">
    <div class="card last-message" >
        <div class="card-header">
            <a target="_blank" href='<?="/".($lang??'ru').'/main/'.$person_id."/profile"?>'><h5 class="d-inline float-left mb-0"><?=$person ?></h5></a>
            <h6 class="d-inline float-right m-auto"><?=Yii::$app->formatter->asDateTime($model->created_at) ?></h6>
        </div>
        <div class="card-body last-message" id="last_message_<?=$person_id?>">
            <p class="card-text"><?=Util::toShortString($model->message,100); ?></p>
        </div>
    </div>
</li>