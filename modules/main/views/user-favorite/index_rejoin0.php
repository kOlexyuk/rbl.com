<?php

/* @var $this yii\web\View */
/* @var $model array */


$this->registerJsFile('@web/js/page_favorite.js'
    ,  ['depends' => [\yii\web\JqueryAsset::className()]]);

if (YII_ENV_DEV) echo __FILE__;
$this->title = Yii::$app->name;

?>

<div class="user-favorite-index">
  <?php echo  $this->render("container", ['model'=>$model]); ?>

</div>
