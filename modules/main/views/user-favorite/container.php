<?php
/* @var $this yii\web\View */
/* @var $model array */

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
                                    <th class="">Latest Jobs</th>
                                    <th>Location</th>
                                    <th >Action</th>
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
                                                    <a href="#" class="text-dark"><h4 class="font-weight-semibold">' . $puser['name'] . " " . $puser['surname'] . '</h4></a>
                                                    <a href="#"><i class="fa fa-clock-o w-4"></i>' . Yii::$app->formatter->asDateTime($puser['created_at']) . '</a><br>
                                                    <a href="#"><i class="fa fa-tag w-4"></i>' . $puser['services'] . '</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><i class ="fa fa-map-marker mr-1 text-muted"></i>' . $puser['regions'] . '</td>
                                    <td>
                                    <a href="#" class="btn btn-info btn-sm text-white btn-user-favorite_page" id="btnFavorite_'.$puser['id'].'" data-toggle="tooltip" data-original-title="'.Yii::t('app', "Remove from favorite").'">
                                     <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>';
                                                }


                              $content .=  '</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>';

                                                echo $content;