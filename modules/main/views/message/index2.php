<?php
/* @var $message \app\modules\main\models\UserMessages */
/* @var $last_message \app\modules\main\models\UserMessages */
/* @var $this yii\web\View */


use app\modules\main\models\UserMessages;

$this->registerCssFile('@web/rejoin/assets/plugins/chat/jquery.convform.css');

$this->registerJsFile('@web/js/message.js'
    ,  ['depends' => [\yii\web\JqueryAsset::className()]
    ]);
?>
<?php if (YII_ENV_DEV) echo __FILE__; ?>
<input type="hidden" id="message_to_user_id" value="0">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="tab-content">

        <div class="wideget-user-tab">
            <div class="tab-menu-heading">
                <div class="tabs-menu1">
                    <ul class="nav">
                        <li class=""><a href="#tab-5" class="active"
                                        data-toggle="tab"><?= Yii::t('app', 'My Feedbacks') ?></a></li>
                        <li><a href="#tab-7" data-toggle="tab" class=""><?= Yii::t('app', 'Feedbacks on me') ?></a></li>
                        <?php if(!Yii::$app->user->isGuest): ?>
                            <li><a href="#tab-msg" data-toggle="tab" class=""><?= Yii::t('app', 'Messages') ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
            <div class="tab-pane active" id="tab-5">
                <div class="card mb-0 border-0">
                    <div class="card-body">
                        <?php foreach (UserMessages::getMyReview() as $me_review): ?>
                            <?php  echo $this->render('@app/modules/main/views/message/review1.php'
                                , ['model'=>$me_review]) ; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane " id="tab-7">
                <div class="card mb-0 border-0">
                    <div class="card-body">
                        <?php foreach (UserMessages::getMeReview() as $me_review): ?>
                            <?php  echo $this->render('@app/modules/main/views/message/review1.php'
                                , ['model'=>$me_review]) ; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane " id="tab-msg">
                <div class="card mb-0 border-0">
                    <div class="card-body">
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <ul class="list-group list-group-last_message">
                                <?php
                                $content = "";
                                foreach ($last_message as $msg){
                                    $content .= $this->render('@app/modules/main/views/message/last_message.php', ['model'=>$msg]);
                                }
                                echo $content;
                                ?>
                            </ul>
                        </div>
                        <div class="col-md-8 col-lg-8 col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div >
                                        <div class="vertical-align">
                                            <div class="p-0">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="no-border">
                                                            <div id="chat" class="conv-form-wrapper">
                                                                <div class="wrapper-messages">
                                                                    <div class="spinLoader hidden"></div>
                                                                    <div  id="messages"  style="padding-bottom: 47.5938px;">
                                                                        <ul id="my-msg-ul" class="list-group send-message list-group-my-message">
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <form id="convForm" class="convFormDynamic">
                                                    <textarea  id="message-text" required rows="1" placeholder="Type Here"
                                                               class="userInputDynamic"
                                                               style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 33px;"></textarea>
                                                                    <button id="send-msg" class="submit">▶</button>
                                                                    <span class="clear"></span>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


    </div>
</div>





