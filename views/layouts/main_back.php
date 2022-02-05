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

if (isset($this->params['breadcrumbs'])) {
    $panelBreadcrumbs = [['label' => Module::t('module', 'ADMIN'), 'url' => ['/admin/default/index']]];
    $breadcrumbs = $this->params['breadcrumbs'];
} else {
    $panelBreadcrumbs = [Module::t('module', 'ADMIN')];
    $breadcrumbs = [];
}
?>
<?php $this->beginContent('@app/views/layouts/layout.php'); ?>

<?php
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar navbar-expand-lg  navbar-dark bg-dark',
    ],
    'containerOptions'=>['class' => 'justify-content-end',]
]);
$menuItems = [   ['label' => Yii::t('app', 'NAV_HOME'), 'url' => ['/main/default/index']],];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => Yii::t('app', 'NAV_LOGIN'), 'url' => ['/user/default/login']];
    $menuItems[] = ['label' => Yii::t('app', 'NAV_SIGNUP'), 'url' => ['/user/default/signup']];
    $menuItems[] = ('<li class="nav-item cls">'.$this->render('select-language').'</li>');
} else {
    if(Yii::$app->user->can(AdminRbac::PERMISSION_ADMIN_PANEL)) {
        $menuItems[] = ['label' => Yii::t('app', 'NAV_ADMIN'), 'url' => ['/admin']];
    }

        $menuItems[] = ['label' => Yii::t('app', 'Messages').'('.Yii::$app->user->identity->getNotReadMessage().')', 'url' => ['/user-message']];
        $menuItems[] = ['label' => Yii::t('app', 'Favorites'), 'url' => ['/main/user-favorite']];
        $menuItems[] = ('<li class="nav-item cls">'.$this->render('select-language').'</li>');
        $menuItems[] = ['label' => Yii::$app->user->identity->username, 'url' => ['#'] ,
            'items' =>[
                ['label' => Yii::t('app', 'NAV_PROFILE') , 'url' => ['/user/profile/index']],
                '<li class="">'
                . Html::beginForm(['/user/default/logout'], 'post' )
                . Html::submitButton(Yii::t('app','Logout').' (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout'])
                . Html::endForm()
                . '</li>',
            ]
       ];

}

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);

//echo Nav::widget([
//    'options' => ['class' => 'navbar-nav navbar-left'],
//    'items' => $menuItems,
//]);
NavBar::end();

?>
    <div class="container">
<!--        -->
        <?//= Breadcrumbs::widget([
//            'links' => ArrayHelper::merge($panelBreadcrumbs, $breadcrumbs),
//        ])
        ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

<?php $this->endContent(); ?>