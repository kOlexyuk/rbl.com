<?php

use app\modules\guid\models\Util;
use app\modules\user\models\User;
use app\modules\user\Module;
use kartik\rating\StarRating;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
//use kartik\rating\StarRating;

/* @var $this yii\web\View */
/* @var $model \app\modules\user\models\backend\User */
/* @var $message \app\modules\main\models\UserMessages */
/* @var $my_message \app\modules\main\models\UserMessages[] */
if (YII_ENV_DEV) echo __FILE__;

//StarRating::bsVersion

$this->registerJsFile('@web/js/view_profile.js'
    ,  ['depends' => [\yii\web\JqueryAsset::className()]
//        ,'position' => \yii\web\View::POS_END
    ]);

$this->registerCssFile("https://use.fontawesome.com/releases/v5.3.1/css/all.css", [
//    'depends' => [\yii\bootstrap\BootstrapAsset::class],
]);

$this->title = $model['username'];
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'ADMIN_USERS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<!--User Profile-->
<section class="sptb">
    <div class="container">

        <?php  echo  $this->render("@app/modules/user/views/frontend/profile/profile1.php"
            , ['model'=>$model  ,  'message' => $message,
            'my_message'=>$my_message]) ?>


    </div>
</section>

<!-- Onlinesletter-->
<!--<section class="sptb bg-white border-top">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-7 col-xl-6 col-md-12">-->
<!--                <div class="sub-newsletter">-->
<!--                    <h3 class="mb-2"><i class="fa fa-paper-plane-o mr-2"></i> Subscribe To Our Onlinesletter</h3>-->
<!--                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-5 col-xl-6 col-md-12">-->
<!--                <div class="input-group sub-input mt-1">-->
<!--                    <input type="text" class="form-control input-lg " placeholder="Enter your Email">-->
<!--                    <div class="input-group-append ">-->
<!--                        <button type="button" class="btn btn-primary btn-lg br-tr-3  br-br-3">-->
<!--                            Subscribe-->
<!--                        </button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--/Onlinesletter-->