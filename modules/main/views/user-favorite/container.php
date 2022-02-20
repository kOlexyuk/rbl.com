<?php
/* @var $this yii\web\View */
/* @var $model array */

use app\modules\user\models\User;
use yii\helpers\Html;
$content = "";

 $content ='<div class="container">
        <div class="row-cards">'.Html::a(Yii::t('app', 'Print/PDF'), ['/pdf'], ['class' => 'btn btn-success']).
        '</div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title">My Favorite Ads</h3>
                    </div>
                    <div class="card-body">
                        <div class="my-favadd table-responsive border-top userprof-tab">
                            <table class="table table-bordered table-hover mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th class="">'. Yii::t('app','Service') .'</th>
                                    <th>'.Yii::t('app','Region') .'</th>
                                    <th>'. Yii::t('app','Type') .'</th>
                                    <th >'. Yii::t('app','Delete') .'</th>
                                </tr>
                                </thead>
                                <tbody>';
                                                $lang = $_SESSION['_language'];
                                                foreach ($model as $puser) {
                                                    $content .= '<tr><td>';
                                                    $content .=   '<img class="avatar avatar-md  d-block brround cover-image" src="'.$puser['photo'].'" style="background: url(&quot;/rejoin/assets/images/users/male/9.jpg&quot;) center center;">';
                                                    $content .= '</td>
                                    <td>
                                        <div class="media mt-0 mb-0">
                                            <div class="">
                                                <div class="card-item-desc p-0">
                                                    <a href="'."/".$lang.'/main/'.$puser['id']."/profile".'" target="_blank" class="text-dark"><h4 class="font-weight-semibold">' . $puser['name'] . " " . $puser['surname'] . '</h4></a>
                                                    <a href="#"><i class="fa fa-clock-o w-4"></i>' . Yii::$app->formatter->asDateTime($puser['created_at']) . '</a><br>
                                                    <a href="#"><i class="fa fa-tag w-4"></i>' . $puser['services'] . '</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><i class ="fa fa-map-marker mr-1 text-muted"></i>' . $puser['regions'] . '</td>
                                    <td>'. User::getProfileTypeArray()[$puser['profile_type']].'</td>
                                    <td>
                                    <a href="#" class="btn btn-info btn-sm text-white btn-user-favorite_page" id="btnFavorite_'.$puser['id'].'" data-toggle="tooltip" data-original-title="'.Yii::t('app', "Remove from favorite").'">
                                     <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>'; }
                                $content .=  '</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>';

                                                echo $content;