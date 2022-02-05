<?php
/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */
/* @var $message \app\modules\main\models\UserMessages */
/* @var $my_message \app\modules\main\models\UserMessages[] */

use kartik\rating\StarRating;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

if (!Yii::$app->user->isGuest && (Yii::$app->user->getId() != $model['id'])): ?>
    <div class="card mb-0 hidden row_review_div" id="row_review_form" >
        <div class="card-body">
        <div>
            <?php Pjax::begin(); ?>
            <?php $form = ActiveForm::begin(['id' => 'send_review',
                'action' => '/en/main/message/send',
                'method' => 'post',
                'enableAjaxValidation' => false, 'options' => ['class' => '']]); ?>
            <?= Html::hiddenInput('user_id_to', $model['id'], ['id' => 'review_user_id_to']); ?>
            <?= Html::hiddenInput('user_id_from', Yii::$app->user->getId(),  ['id' => 'review_user_id_from']); ?>
            <?= $form->field($message, 'is_review')->hiddenInput(['id' => 'usermessages-is_review']); ?>
            <div class="form-group">
                    <?= $form->field($message, 'message', ['options' => ['id' => 'review_txt']])
                        ->textarea(['rows' => 2, 'cols' => 5, 'required' => true , 'id'=>'review_txtarea'])->label(Yii::t('app', "Type message")); ?>
            </div>

            <div class="form-group">
                <div class="" id="div_stars">
                    <?= $form->field($message, 'stars')->widget(StarRating::classname(), [
                        'pluginOptions' => ['step' => 1 ],
                    ]); ?>
                </div>
            </div>
                    <?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-primary' , 'id'=>'btn_submit_review']) ?>
        </div>
            <?php ActiveForm::end() ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
<?php else: ?>
    <div class="card mb-0 hidden row_review_div" id="row_not_review_form" >
         <div class="card-body">
            <div>
             <h3><?=Yii::t('app', "You have already reviewed a person.")?></h3>
            </div>
        </div>
    </div>
<?php endif; ?>
