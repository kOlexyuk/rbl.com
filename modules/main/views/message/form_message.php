<?php
/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */
/* @var $message \app\modules\main\models\UserMessages */
/* @var $my_message \app\modules\main\models\UserMessages[] */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

if (!Yii::$app->user->isGuest && (Yii::$app->user->getId() != $model['id'])): ?>
    <div class="card mb-0 hidden" id="row_message_form" >
         <div class="card-body">
            <div>
                <?php Pjax::begin(); ?>
                <?php $form = ActiveForm::begin(['id' => 'send_message',
                    'action' => '/en/main/message/send',
                    'method' => 'post',
                    'enableAjaxValidation' => false, 'options' => ['class' => '']]); ?>
                <?= Html::hiddenInput('user_id_to', $model['id'], ['id' => 'message_user_id_to']); ?>
                <?= Html::hiddenInput('user_id_from', Yii::$app->user->getId(),  ['id' => 'user_id_from']); ?>
                <div class="form-group">
                    <?= $form->field($message, 'message', ['options' => ['id' => 'message_txt']])
                        ->textarea(['rows' => 2, 'cols' => 5, 'required' => true,  'id'=>'message_txtarea'])->label(Yii::t('app', "Type message")); ?>
                </div>
                <?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-primary' , 'id'=>'btn_submit_message']) ?>

            </div>
            <?php ActiveForm::end() ?>
            <?php Pjax::end(); ?>
        </div>
    </div>

<?php endif; ?>