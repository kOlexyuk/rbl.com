<?php
/** @var \albertborsos\cookieconsent\Component $component */
$component = Yii::$app->cookieConsent;
$component->registerWidget([
    'policyLink' => ['/default/cookie-settings'],
    'policyLinkText' => \yii\helpers\Html::tag('i', null, ['class' => 'fa fa-cog']) . ' Beállítások',
    'pluginOptions' => [
        'expiryDays' => 365,
        'hasTransition' => false,
        'revokeBtn' => '<div class="cc-revoke {{classes}}">Cookie Policy</div>',
    ],
]);