<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        //<!-- Bootstrap Css -->
        "rejoin//assets/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css",

        //<!-- Dashboard Css -->
        "rejoin//assets/css/style.css",
        //<!-- Font-awesome  Css -->
        "rejoin//assets/css/icons.css",
        //<!-- Owl Theme css-->
        "rejoin//assets/plugins/owl-carousel/owl.carousel.css",
        //<!--Select2 Plugin -->
        "rejoin//assets/plugins/select2/select2.min.css",
        //<!-- Cookie css -->
        "rejoin//assets/plugins/cookie/cookie.css",

        //<!-- Custom scroll bar css-->
        "rejoin//assets/plugins/scroll-bar/jquery.mCustomScrollbar.css",



//        'css/site.css',
       'css/my_style.css',
//        'css/filter.css',
//        'css/style1.css',
    ];
    public $js = [

        //<!-- JQuery js-->
     //   "rejoin/assets/js/vendors/jquery-3.2.1.min.js",

        //<!-- Bootstrap js -->
        "rejoin/assets/plugins/bootstrap-4.3.1-dist/js/popper.min.js",
        "rejoin/assets/plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js",

        //<!--JQuery Sparkline Js-->
        "rejoin/assets/js/vendors/jquery.sparkline.min.js",

        //<!-- Circle Progress Js-->
        "rejoin/assets/js/vendors/circle-progress.min.js",

        //<!-- Star Rating Js-->
        "rejoin/assets/plugins/rating/jquery.rating-stars.js",

        //<!--Counters -->
        "rejoin/assets/plugins/counters/counterup.min.js",
        "rejoin/assets/plugins/counters/waypoints.min.js",
        "rejoin/assets/plugins/counters/numeric-counter.js",

        //<!--Owl Carousel js -->
        "rejoin/assets/plugins/owl-carousel/owl.carousel.js",

        //<!--Horizontal Menu-->
        "rejoin/assets/plugins/horizontal/horizontal-menu/horizontal.js",

        //<!--JQuery TouchSwipe js-->
        "rejoin/assets/js/jquery.touchSwipe.min.js",

        //<!--Select2 js -->
        "rejoin/assets/plugins/select2/select2.full.min.js",
        "rejoin/assets/js/select2.js",

        //<!-- sticky Js-->
        "rejoin/assets/js/sticky.js",

        //<!-- Ion.RangeSlider -->
        "rejoin/assets/plugins/jquery-uislider/jquery-ui.js",

        //<!--Showmore Js-->
        "rejoin/assets/js/jquery.showmore.js",
        "rejoin/assets/js/showmore.js",

        //<!-- Cookie js -->
        "rejoin/assets/plugins/cookie/jquery.ihavecookies.js",
        "rejoin/assets/plugins/cookie/cookie.js",

        //<!-- Custom scroll bar Js-->
        "rejoin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js",

        //<!-- Swipe Js-->
        "rejoin/assets/js/swipe.js",

        //<!-- Scripts Js-->
        "rejoin/assets/js/scripts2.js",

        //<!-- Custom Js-->
        "rejoin/assets/js/custom.js",


        'js/main.js',
        'js/startpage.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
