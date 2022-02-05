<?php
/* @var $this yii\web\View */
/* @var $model app\modules\main\models\UserMessages */
/* @var $lang string */

use kartik\rating\StarRating;

$offset = '';
if($model->user_id_to === Yii::$app->user->getId())
    $offset = 'col-md-offset-1';
?>
                    <li class="list-group-item" style="margin-right: 50px;margin-top: 4px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border: 1px none var(--gray);">
                        <div class="card" style="border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: solid;border-color: var(--gray);">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="d-inline float-left m-auto"><?=/*gmdate('y.m.d H:i',$model-> created_at)*/Yii::$app->formatter->asDateTime($model->created_at) ?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                        <h6 class="d-inline float-left m-auto text-warning"><a target="_blank" href='<?="/".($lang??'ru').'/main/'.$model->user_id_from."/profile"?>'><?=$model->getUserNameFrom() ?></a></h6>
                                    </div>
                                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                        <h6 class="d-inline float-left m-auto text-info"><?=$model->getUserNameTo() ?></h6>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2 offset-sm-0 offset-md-2 offset-lg-3 offset-xl-6">
                                        <div class="align-content-end m-auto">
                                            <?php for($i=1;$i<6;$i++): ?>
                                                <?php if($i<= $model->stars ): ?>
                                                    <small class="text-warning glyphicon glyphicon-star"></small>
                                                <?php else: ?>
                                                    <small class="text-warning glyphicon glyphicon-star-empty"></small>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <?=$model->message ?>
                                </p>
                            </div>
                        </div>
                    </li>
