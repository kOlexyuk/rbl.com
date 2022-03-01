<?php

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\StartForm */

use app\modules\guid\models\Util;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

//if (YII_ENV_DEV) echo __FILE__;
$this->title = strtoupper(Yii::$app->name);

?>

<!-- Popup Intro-->
<?php if (Yii::$app->user->isGuest && false): ?>
<div id="myModal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <a class="close btn  btn-sm btn-secondary" data-dismiss="modal" aria-label="Close">
                    Skip
                </a>
            </div>
            <div class="modal-body">
                <div id="popupcarousel" class="owl-carousel testimonial-owl-carousel4">
                    <div class="item text-center">
                        <div class="row">
                            <div class="col-xl-8 col-md-12 d-block mx-auto">
                                <div class="testimonia text-center">
                                    <img src="/rejoin/assets/images/products/intro/search.svg" class="w-70 h-100 mb-5 mx-auto text-center" alt="image">
                                    <h3><?=Yii::t('app','Search Job') ?></h3>
                                    <p>
                                        Now You Become a Part of Our Website<br>
                                        rejoin is free classified ads website template with awesome responsive webOffline.
                                        It has a huge collection of widgets</p>
                                    <a href="" class="btn btn-primary  mb-3">Search</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item text-center">
                        <div class="row">
                            <div class="col-xl-8 col-md-12 d-block mx-auto">
                                <div class="testimonia text-center">
                                    <img src="/rejoin/assets/images/products/intro/join.svg" class="w-70 mb-5 mx-auto text-center" alt="image">
                                    <h3>Join With Us</h3>
                                    <p>
                                        Now You Become a Part of Our Website<br>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in humour</p>
                                    <a href="" class="btn btn-primary  mb-3">Join</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item text-center">
                        <div class="row">
                            <div class="col-xl-8 col-md-12 d-block mx-auto">
                                <div class="testimonia text-center">
                                    <img src="rejoin/assets/images/products/intro/notification.svg" class="w-55 h-100 mb-5 mx-auto text-center" alt="image">
                                    <h3>Get Notifications</h3>
                                    <p>Now You Become a Part of Our Website<br>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in humour</p>
                                    <a href="settings.html" class="btn btn-primary  mb-3">Change</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
<!-- End Popup Intro-->

<!--Sliders Section-->
<section>
    <div class="banner-1 cover-image sptb-3  sptb-tab bg-background2" data-image-src="/rejoin/assets/images/banners/banner1.jpg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white mb-7">
                    <h1 class="mb-1"><?= Yii::t('app','Find The Best Job For Your Future') ?></h1>
<!--                    <p>It is a long established fact that a reader will be distracted by the readable.</p>-->
                </div>

                <?php
                echo $this->render('@app/modules/main/views/default/search_panel_rejoin.php', ['model'=>$model ] );
                ?>
            </div>
        </div><!-- /header-text -->

    </div>
</section>
<!--Sliders Section-->


    <div class="container">
        <div class="row m-2 font-weight-bolder">
            <div class="col-12">
                <span><?= Yii::t('app','Found offers: ')?></span><span id="span_popular_profile_cnt"><?=count($model['popular_profile']) ?></span>
            </div>
        </div>
        <div class="row">

            <div id="div_profile_list" class="col-md-10 col-lg10">

                <?php
                $lang = $_SESSION['_language'];
                $content = "";
                foreach ($model['popular_profile'] as $puser){
                $content .= $this->render('@app/modules/user/views/frontend/profile/user_card_rejoin.php', ['puser'=>$puser , 'lang1'=>$lang, 'pdf'=>0] );
                }
                echo $content;
                ?>
            </div>
            <div class="col-md-1 col-lg1"></div>
        </div>
    </div>
<!--<div class="modal-backdrop fade show"></div>-->


