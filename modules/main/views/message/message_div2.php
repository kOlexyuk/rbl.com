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
<!--            <img class="media-object brround" alt="64x64"-->
<!--                                               src="../assets/images/users/male/3.jpg"> -->
        </a></div>
    <div class="media-body">
<!--        <h5 class="mt-0 mb-1 font-weight-semibold">Edward <span class="fs-14 ml-0"-->
<!--                                                                                    data-toggle="tooltip"-->
<!--                                                                                    data-placement="top" title=""-->
<!--                                                                                    data-original-title="verified"><i-->
<!--                        class="fa fa-check-circle-o text-success"></i></span> <span class="fs-14 ml-2"> 4 <i-->
<!--                        class="fa fa-star text-yellow"></i></span></h5>-->

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

<!--        <small class="text-muted"><i-->
<!--                    class="fa fa-calendar"></i> Dec 21st <i class=" ml-3 fa fa-clock-o"></i> 16.35 <i-->
<!--                    class=" ml-3 fa fa-map-marker"></i> UK</small>-->


        <p class="font-13  mb-2 mt-2">
            <?=$model->message ?>
        </p><a href="#" class="mr-2"><span
<!--                    class="badge badge-primary">Helpful</span></a> <a href="" class="mr-2" data-toggle="modal"-->
<!--                                                                      data-target="#Comment"><span-->
<!--                    class="">Comment</span></a> <a href="" class="mr-2" data-toggle="modal" data-target="#report"><span-->
<!--                    class="">Report</span></a>-->
</div>
</div>

<!--<div class="media p-5 border-top mt-1">-->
<!--    <div class="d-flex mr-3"><a href="#"> <img-->
<!--                    class="media-object brround" alt="64x64"-->
<!--                    src="rejoin/assets/images/users/male/3.jpg"> </a>-->
<!--    </div>-->
<!--    <div class="media-body">-->
<!--        <h5 class="mt-0 mb-1 font-weight-semibold">-->
<!--            <a target="_blank"-->
<!--               href='--><?//= "/" . ($lang ?? 'ru') . '/main/' . $model->user_id_from . "/profile" ?><!--'><strong-->
<!--                        class="text-warning">--><?//= $model->getUserNameFrom() ?><!--</strong></a>-->
<!--            <span class="fs-14 ml-0" data-toggle="tooltip"-->
<!--                         data-placement="top" title=""-->
<!--                         data-original-title="verified"><i-->
<!--                        class="fa fa-check-circle-o text-success"></i></span>-->
<!--            <strong class="text-info">--><?//= $model->getUserNameTo() ?><!--</strong>-->
<!--            <span class="fs-14 ml-2"> 4 <i-->
<!--                        class="fa fa-star text-yellow"></i>-->
<!--                            --><?php //for ($i = 1; $i < 6; $i++): ?>
<!--                                --><?php //if ($i <= $model->stars): ?>
<!--                                    <small class="text-warning glyphicon glyphicon-star"></small>-->
<!--                                --><?php //else: ?>
<!--                                    <small class="text-warning glyphicon glyphicon-star-empty"></small>-->
<!--                                --><?php //endif; ?>
<!--                            --><?php //endfor; ?>
<!--            </span></h5>-->
<!--        <small class="text-muted"><i class="fa fa-calendar"></i> Dec-->
<!--            21st <i class=" ml-3 fa fa-clock-o"></i> 16.35 <i-->
<!--                    class=" ml-3 fa fa-map-marker"></i> UK</small>-->
<!--        <p class="font-13  mb-2 mt-2"> On the other hand, we denounce-->
<!--            with righteous indignation and dislike men who are so-->
<!--            beguiled and demoralized by the charms of pleasure of the-->
<!--            moment, so blinded by desire, that they cannot foresee the-->
<!--            pain and trouble that are bound to ensue </p><a href="#"-->
<!--                                                            class="mr-2"><span-->
<!--                    class="badge badge-primary">Helpful</span></a> <a-->
<!--                href="" class="mr-2" data-toggle="modal"-->
<!--                data-target="#Comment"><span class="">Comment</span></a>-->
<!--        <a href="" class="mr-2" data-toggle="modal"-->
<!--           data-target="#report"><span class="">Report</span></a></div>-->

