<?php
/* @var $message \app\modules\main\models\UserMessages */
/* @var $last_message \app\modules\main\models\UserMessages */
/* @var $this yii\web\View */

$this->registerJsFile('@web/js/message.js'
    ,  ['depends' => [\yii\web\JqueryAsset::className()]
    ]);
?>
<?php if (YII_ENV_DEV) echo __FILE__; ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4">
            <ul class="list-group list-group-last_message">
                <?php
                $content = "";
                $content .= $this->render('@app/modules/main/views/message/my_review.php');

                foreach ($last_message as $msg){
                    $content .= $this->render('@app/modules/main/views/message/last_message.php', ['model'=>$msg]);
                }
                echo $content;
                ?>
            </ul>
        </div>
        <div class="col">
            <input type="hidden" id="message_to_user_id" value="0">
            <ul class="list-group send-message list-group-my-message" id="my-msg-ul"></ul>
            <div class="card send-message hidden" id="my_send_message">
                <div class="card-header"></div>
                <div class="card-body">

                        <div class="form-group"><textarea class="form-control" id="message-text" required></textarea></div>
                        <div class="form-group"><button class="btn btn-primary" id="send-msg" type="button"><?=Yii::t('app',"Send")?></button></div>

                </div>
            </div>

        </div>
    </div>
</div>





