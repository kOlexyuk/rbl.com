<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\user\Module;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */
/* @var $data array */

$this->title = Module::t('module', 'TITLE_PROFILE');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (YII_ENV_DEV)   echo __FILE__;    ?>
<div class="user-profile">

    <!--User Profile-->
    <section class="sptb">
        <div class="container">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>
                <?= Html::a(Module::t('module', 'BUTTON_UPDATE'), ['update'], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Module::t('module', 'LINK_PASSWORD_CHANGE'), ['password-change'], ['class' => 'btn btn-primary']) ?>
            </p>

            <?php echo   $this->render("@app/modules/user/views/frontend/profile/profile.php" , ['model'=>$model]) ?>

        </div>
    </section>



</div>
