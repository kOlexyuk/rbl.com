<?php

use app\widgets\Alert;
use app\modules\admin\Module;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\modules\admin\rbac\Rbac as AdminRbac;

/* @var $this \yii\web\View */
/* @var $content string */

/** @var \yii\web\Controller $context */
$context = $this->context;

//  web/rejoin/assets/color-skins/color-skins/color10.css
$this->registerCssFile("@web/rejoin/assets/color-skins/color-skins/color10.css"
    , ['id'=>"theme","media"=>"all"  ]);

if (isset($this->params['breadcrumbs'])) {
    $panelBreadcrumbs = [['label' => Module::t('module', 'ADMIN'), 'url' => ['/admin/default/index']]];
    $breadcrumbs = $this->params['breadcrumbs'];
} else {
    $panelBreadcrumbs = [Module::t('module', 'ADMIN')];
    $breadcrumbs = [];
}
?>
<?php $this->beginContent('@app/views/layouts/layout.php'); ?>		<!--Loader-->
		<div id="global-loader">
			<img src="/rejoin/assets/images/loader.svg" class="loader-img" alt="">
		</div>

		<!--Header Main-->
		<div class="header-main">
			<!--Top Bar-->
			<div class="top-bar">
				<div class="container">
					<div class="row">
						<div class="col-xl-7 col-lg-7 col-sm-4 col-7  my-auto">
							<div class="top-bar-left d-flex">
<!--								<div class="clearfix">-->
<!--									<ul class="socials">-->
<!--									</ul>-->
<!--								</div>-->
								<div class="clearfix">
									<ul class="contact border-left">
                                        <?='<li class="nav-item cls">'.$this->render('select-language').'</li>';?>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xl-5 col-lg-5 col-sm-8 col-5  my-auto">
							<div class="top-bar-right">
								<ul class="custom">

                                    <?php if (Yii::$app->user->isGuest): ?>
                                   	<li  class="my-auto">
										<a href='/user/default/signup'><i class="fa fa-user mr-1"  data-toggle="tooltip" data-placement="bottom"  title="Tooltip on bottom"></i><span><?=Yii::t('app', 'NAV_SIGNUP')?></span></a>
									</li>
									<li class="my-auto">
										<a href='/user/default/login' ><i class="fa fa-sign-in mr-1"></i><span><?=Yii::t('app', 'NAV_LOGIN')?></span></a>
									</li>
                                    <?php else: ?>
                                        <li>
                                            <a class="nav-link icon" data-toggle="dropdown" href='/user-message'>
                                                <i class="fa fa-bell-o"></i>
                                                <span class=" nav-unread badge badge-danger  badge-pill"><?=Yii::$app->user->identity->getNotReadMessage()?></span>
                                            </a>
                                        </li>
<!--                                        <li>-->
<!--                                            <a class="nav-link icon" data-toggle="dropdown" href='/user/profile/index'>-->
<!--                                                <i class="fa mdi-face-profile"></i>-->
<!--                                                <span class=" nav-unread badge badge-danger  badge-pill">--><?//=Yii::t('app', 'NAV_PROFILE') ?><!--</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
                                        <li class="dropdown  d-xl-inline-block my-auto">
                                            <a href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-user mr-1" ></i><span> <?=Yii::$app->user->identity->username?> </span> <i class="fa fa-caret-down"></i></span> </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-105px, 30px, 0px);">

                                            <?php
                                            echo '<div class="dropdown-item">'
                                            . Html::beginForm(['/user/default/logout'], 'post' )
                                            . Html::submitButton(Yii::t('app','Logout').' (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout'])
                                            . Html::endForm()
                                            . '</div>';
                                            ?>

                                            </div>
                                        </li>
                                    <?php endif;?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--Top Bar-->

			<!-- Mobile Header -->
				<div class="sticky">
					 <div class="horizontal-header clearfix ">
						<div class="container">
							<a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
							<span class="smllogo"><img src="rejoin/assets/images/brand/rbl3.png" width="80" alt="img"/></span>
							<a href="#" class="callusbtn bg-light"><i class="fa fa-bell text-body" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
		    <!-- /Mobile Header -->

			<!--Horizontal-main-->
			<div class="horizontal-main clearfix">
				<div class="horizontal-mainwrapper container clearfix">
					<div class="desktoplogo">
						<a href="/main/default/index"><img src="/rejoin/assets/images/brand/rbl3.png" alt=""></a>
					</div>
					<div class="desktoplogo-1">
						<a href="/main/default/index"><img src="/rejoin/assets/images/brand/rbl3.png" alt=""></a>
					</div>
					<!--Nav-->
					<nav class="horizontalMenu clearfix d-md-flex">
						<ul class="horizontalMenu-list">
                            <?php if(Yii::$app->user->can(AdminRbac::PERMISSION_ADMIN_PANEL)): ?>
                                <li><a href='/admin'> <?php echo Yii::t('app', 'NAV_ADMIN'); ?> <span class="horizontal-arrow"></span></a></li>
                            <?php endif;?>
							<li><a href='/main/default/index'><?=Yii::t('app', 'NAV_HOME');?> <span class="fa m-0"></span></a></li>
							<li><a href="about.html">About Us </a></li>
							<li><a href="contact.html"> Contact Us <span class="horizontal-arrow"></span></a></li>
<?php if (!Yii::$app->user->isGuest): ?>
                            <li><a href='/main/user-favorite'> <?=Yii::t('app', 'Favorites')?> <span class="horizontal-arrow"></span></a></li>

                            <li><a href='/user/profile/index'> <?=Yii::t('app', 'NAV_PROFILE')?> <span class="horizontal-arrow"></span></a></li>
                            <?php endif;?>

						</ul>
					</nav>
					<!--/Nav-->
				</div>
			</div>
			<!--/Horizontal-main-->
		</div>
		<!--/Header Main-->
    <div class="">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top" ><i class="fa fa-arrow-up"></i></a>

<?php $this->endContent(); ?>