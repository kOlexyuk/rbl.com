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
/* @var $new_message \app\modules\main\models\UserMessages */
/* @var $review \app\modules\main\models\UserMessages[] */
/* @var $messages \app\modules\main\models\UserMessages[] */

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
            , ['model'=>$model  ,  'new_message' => $new_message,    'review'=>$review , 'messages'=>$messages]) ?>
    </div>
</section>

