<?php

/* @var $this yii\web\View */
/* @var $model array */

use app\modules\guid\models\Util;
use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

if (YII_ENV_DEV) echo __FILE__;
$this->title = Yii::$app->name;

?>
<div class="nav-bar">
    <?= Html::a(Yii::t('app', 'Print/PDF'), ['/pdf'], ['class' => 'btn btn-success']) ?>
</div>
<div class="user-favorite-index">
    <div class="container">
        <div class="row">
<!--            <div class="col-md-1 col-lg1"></div>-->
<!--            <div id="div_profile_list" class="col-md-10 col-lg10">-->
<!--                --><?php
////                Util::getProfileListView($model)
//                $lang = $_SESSION['_language'];
//                $content = "";
//                foreach ($model as $puser){
//                    $content .= $this->render('@app/modules/user/views/frontend/profile/user_card.php', ['puser'=>$puser
//                        , 'lang1'=>$lang , 'pdf'=>1]);
//                }
//                echo $content;
//                ?>
<!--            </div>-->
<!--            <div class="col-md-1 col-lg1"></div>-->

            <div class="col-xl-9 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="user-tabel table-responsive border-top">
                            <table class="table card-table table-bordered table-hover table-vcenter text-nowrap">
                                <tbody>
                                <tr>
                                    <th ></th>
                                    <th>Name</th>
                                    <th>Membership Status</th>
                                    <th>Member Since</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td class=""><span class="avatar avatar-md  d-block brround cover-image" data-image-src="/rejoin/assets/images/users/female/25.jpg"></span></td>
                                    <td><a href="userprofile.html" class="text-dark">Jane Pearson</a></td>
                                    <td><a href="#" class="badge badge-success">Active</a></td>
                                    <td>December-05-2018</td>
                                    <td>
                                        <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
