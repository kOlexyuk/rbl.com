<?php
/* @var $this yii\web\View */
/* @var $model app\modules\main\models\UserMessages */
/* @var $lang string */

//$person_id = $model->user_id_to;
//$person = $model->getUserNameTo();
$margin = "margin-left-50";
if($model->user_id_to === Yii::$app->user->getId()){
//    $person_id = $model->user_id_from;
//    $person = $model->getUserNameFrom();
    $margin = "margin-right-50";
}
?>
<li class="list-group-item message-list-item <?=$margin ?>" >
    <div class="card message-card" style="">
        <div class="card-header">
            <h5 class="d-inline float-left mb-0"><?=$model->getUserNameFrom()?><br></h5>
            <h6 class="d-inline float-right m-auto"><?=Yii::$app->formatter->asDateTime($model->created_at) ?></h6>
        </div>
        <div class="card-body">
            <p class="card-text"><?=$model->message ?></p>
        </div>
    </div>
</li>