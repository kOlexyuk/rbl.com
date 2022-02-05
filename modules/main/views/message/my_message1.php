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
<!--                <div>-->
<!--                    --><?php //for($i=1;$i<6;$i++): ?>
<!--                        --><?php //if($i<= $model->stars ): ?>
<!--                            <small class="text-warning glyphicon glyphicon-star"></small>-->
<!--                        --><?php //else: ?>
<!--                            <small class="text-warning glyphicon glyphicon-star-empty"></small>-->
<!--                        --><?php //endif; ?>
<!--                    --><?php //endfor; ?>
<!--                </div>-->
            </div>
            <div class="">
                <?=$model->message ?>
            </div>
        </div>
    </div>
</div>
</li>


<!--<li class="list-group-item message-list-item --><?//=$margin ?><!--" >-->
<!--    <div class="card message-card" style="">-->
<!--        <div class="card-header">-->
<!--            <h5 class="d-inline float-left mb-0">--><?//=$model->getUserNameFrom()?><!--<br></h5>-->
<!--            <h6 class="d-inline float-right m-auto">--><?//=Yii::$app->formatter->asDateTime($model->created_at) ?><!--</h6>-->
<!--        </div>-->
<!--        <div class="card-body">-->
<!--            <p class="card-text">--><?//=$model->message ?><!--</p>-->
<!--        </div>-->
<!--    </div>-->
<!--</li>-->