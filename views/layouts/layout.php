<?php

use app\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css" rel="stylesheet"/>
    <?php $this->head() ?>
</head>
<body >

<?php $this->beginBody() ?>
<div id="my_cont" class="wrapper flex-grow-1">
         <?= $content ?>
</div>
<section>
    <footer class="bg-dark  text-white">
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-12"><h6>Business Directory</h6>
                        <ul class="list-unstyled mb-0">
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Colleges</a></li>
                            <li><a href="#">Hospital</a></li>
                            <li><a href="#">Factories</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-12"><h6>Jobs</h6>
                        <ul class="list-unstyled mb-0">
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">Computer</a></li>
                            <li><a href="#">Security Hacking</a></li>
                            <li><a href="#">Online</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-12"><h6>Resources</h6>
                        <ul class="list-unstyled mb-0">
                            <li><a href="#">Support</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Contact Details</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-12"><h6>Popular Ads</h6>
                        <ul class="list-unstyled mb-0">
                            <li><a href="#"><i class="fa fa-caret-right text-white-50"></i> Educational college Ads</a>
                            </li>
                            <li><a href="#"><i class="fa fa-caret-right text-white-50"></i> Free Lancer for Web
                                    Developer</a></li>
                            <li><a href="#"><i class="fa fa-caret-right text-white-50"></i> Searching for Developer</a>
                            </li>
                            <li><a href="#"><i class="fa fa-caret-right text-white-50"></i> BPO Online In Bangalore</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-12"><h6 class="mb-2">Subscribe</h6>
                        <div class="input-group"><input type="text" class="form-control" placeholder="Email">
                            <div class="input-group-append ">
                                <button type="button" class="btn btn-primary"> Subscribe</button>
                            </div>
                        </div>
                        <h6 class="mb-2 mt-5">Payments</h6>
                        <ul class="payments mb-0">
                            <li><a href="javascript:;" class="payments-icon"><i class="fa fa-cc-amex"
                                                                                aria-hidden="true"></i></a></li>
                            <li><a href="javascript:;" class="payments-icon"><i class="fa fa-cc-visa"
                                                                                aria-hidden="true"></i></a></li>
                            <li><a href="javascript:;" class="payments-icon"><i class="fa fa-credit-card-alt"
                                                                                aria-hidden="true"></i></a></li>
                            <li><a href="javascript:;" class="payments-icon"><i class="fa fa-cc-mastercard"
                                                                                aria-hidden="true"></i></a></li>
                            <li><a href="javascript:;" class="payments-icon"><i class="fa fa-cc-paypal"
                                                                                aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-white-50 p-0">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-lg-8 col-sm-12  mt-2 mb-2 text-left"> Copyright © 2022 <a href="index.html"
                                                                                              class="fs-14 text-white">RBL</a>.
                        Designed by <a href="/main/default/index" class="fs-14 text-white">RBL</a> All rights reserved.
                    </div>
                    <div class="col-lg-4 col-sm-12 ml-auto mb-2 mt-2 d-none d-lg-block">
                        <ul class="social mb-0">
                            <li><a class="social-icon" href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a class="social-icon" href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a class="social-icon" href=""><i class="fa fa-rss"></i></a></li>
                            <li><a class="social-icon" href=""><i class="fa fa-youtube"></i></a></li>
                            <li><a class="social-icon" href=""><i class="fa fa-linkedin"></i></a></li>
                            <li><a class="social-icon" href=""><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-white p-0 border-top">
            <div class="container">
                <div class="p-2 text-center footer-links"><a href="#" class="btn btn-link">How It Works</a> <a href="#"
                                                                                                               class="btn btn-link">About
                        Us</a> <a href="#" class="btn btn-link">Pricing</a> <a href="#" class="btn btn-link">Ads
                        Categories</a> <a href="#" class="btn btn-link">Privacy Policy</a> <a href="#"
                                                                                              class="btn btn-link">Terms
                        Of Conditions</a> <a href="#" class="btn btn-link">Blog</a> <a href="#" class="btn btn-link">Contact
                        Us</a> <a href="#" class="btn btn-link">Premium Ad</a></div>
            </div>
        </div>
    </footer>
</section>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
