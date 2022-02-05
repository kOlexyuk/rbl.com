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
            <div class="col-md-1 col-lg1"></div>
            <div id="div_profile_list" class="col-md-10 col-lg10">
                <?php
//                Util::getProfileListView($model)
                $lang = $_SESSION['_language'];
                $content = "";
                foreach ($model as $puser){
                    $content .= $this->render('@app/modules/user/views/frontend/profile/user_card.php', ['puser'=>$puser
                        , 'lang1'=>$lang , 'pdf'=>1]);
                }
                echo $content;

                ?>
            </div>
            <div class="col-md-1 col-lg1"></div>
        </div>
    </div>
</div>
