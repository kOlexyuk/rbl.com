<?php
/* @var $message \app\modules\main\models\UserMessages */
/* @var $last_message \app\modules\main\models\UserMessages */
/* @var $this yii\web\View */

$this->registerCssFile('@web/rejoin/assets/plugins/chat/jquery.convform.css');

$this->registerJsFile('@web/rejoin/assets/plugins/chat/jquery.convform.js'
    , ['depends' => [\yii\web\JqueryAsset::className()]
    ]
);
$this->registerJsFile('@web/rejoin/assets/plugins/chat/autosize.min.js'
    , ['depends' => [\yii\web\JqueryAsset::className()]
    ]
);
$this->registerJsFile('@web/rejoin/assets/js/chat.js'
    , ['depends' => [\yii\web\JqueryAsset::className()]
    ]
);

$this->registerJsFile('@web/js/message.js'
    , ['depends' => [\yii\web\JqueryAsset::className()]
    ]
    );
?>
<?php if (YII_ENV_DEV) echo __FILE__; ?>

<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class="col-md-4 col-lg-4 col-xl-4">-->
<!--            <div class="card">-->
<!--                <div class="card-header"><h3 class="card-title">Recent</h3></div>-->
<!--                <div class="card-body pb-3">-->
<!--                    <ul class="vertical-scroll" style="overflow-y: hidden; height: 378px;">-->
<!--                        --><?php
//                        $content = "";
//                        $content .= $this->render('@app/modules/main/views/message/my_review.php');
//
//                        foreach ($last_message as $msg) {
//                            //  $content .= $this->render('@app/modules/main/views/message/last_message.php', ['model'=>$msg]);
//                            $content .= '<li style="overflow: hidden; height: 75.7705px; padding-top: 0px; margin-top: 4.9849px; padding-bottom: 0px; margin-bottom: 4.9849px;"
//                        class="item">
//                        <div class="p-3">
//                            <div class="mb-2"><a href="faq.html"><span class="fs-14">Can I use this Plugins in Another Template?</span></a>
//                            </div>
//                            <span class="badge badge-primary"><i class="fa fa-eye"></i> 965</span> <span
//                                    class="badge badge-success"><i class="fa fa-thumbs-up"></i> 35</span></div>
//                    </li>';
//                        }
//                        echo $content;
//                        ?>
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="col">-->
<!--            <input type="hidden" id="message_to_user_id" value="0">-->
<!--            <ul class="list-group send-message list-group-my-message" id="my-msg-ul"></ul>-->
<!--            <div class="card send-message hidden" id="my_send_message">-->
<!--                <div class="card-header"></div>-->
<!--                <div class="card-body">-->
<!---->
<!--                    <div class="form-group"><textarea class="form-control" id="message-text" required></textarea></div>-->
<!--                    <div class="form-group">-->
<!--                        <button class="btn btn-primary" id="send-msg"-->
<!--                                type="button">--><?//= Yii::t('app', "Send") ?><!--</button>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!---->
<!---->
<!--</div>-->
<!---->
<!---->
<!--<div class="container">-->
<!--    <div class="col-md-4 col-lg-4 col-xl-4">-->
<!--        <div class="card">-->
<!--            <div class="card-header"><h3 class="card-title">Recent</h3></div>-->
<!--            <div class="card-body pb-3">-->
<!--                <ul class="vertical-scroll" style="overflow-y: hidden; height: 378px;">-->
<!--                    <li style="overflow: hidden; height: 75.7705px; padding-top: 0px; margin-top: 4.9849px; padding-bottom: 0px; margin-bottom: 4.9849px;"-->
<!--                        class="item">-->
<!--                        <div class="p-3">-->
<!--                            <div class="mb-2"><a href="faq.html"><span class="fs-14">Can I use this Plugins in Another Template?</span></a>-->
<!--                            </div>-->
<!--                            <span class="badge badge-primary"><i class="fa fa-eye"></i> 965</span> <span-->
<!--                                    class="badge badge-success"><i class="fa fa-thumbs-up"></i> 35</span></div>-->
<!--                    </li>-->
<!--                    <li style="" class="item">-->
<!--                        <div class="p-3">-->
<!--                            <div class="mb-2"><a href="faq.html"><span class="fs-14">How can I Delete My Free Advertisement in website?</span></a>-->
<!--                            </div>-->
<!--                            <span class="badge badge-primary"><i class="fa fa-eye"></i> 654</span> <span-->
<!--                                    class="badge badge-success"><i class="fa fa-thumbs-up"></i> 17</span></div>-->
<!--                    </li>-->
<!--                    <li style="" class="item">-->
<!--                        <div class="p-3">-->
<!--                            <div class="mb-2"><a href="faq.html"><span class="fs-14"><i class="fa fa-question-circle-o"-->
<!--                                                                                        aria-hidden="true"></i> How Can I Add another page in Template?</span></a>-->
<!--                            </div>-->
<!--                            <span class="badge badge-primary"><i class="fa fa-eye"></i> 522</span> <span-->
<!--                                    class="badge badge-success"><i class="fa fa-thumbs-up"></i> 23</span></div>-->
<!--                    </li>-->
<!--                    <li style="" class="item">-->
<!--                        <div class="p-3">-->
<!--                            <div class="mb-2"><a href="faq.html"><span class="fs-14"><i class="fa fa-question-circle-o"-->
<!--                                                                                        aria-hidden="true"></i> Move Detials From One Page to Another Page?</span></a>-->
<!--                            </div>-->
<!--                            <span class="badge badge-primary"><i class="fa fa-eye"></i> 652</span> <span-->
<!--                                    class="badge badge-success"><i class="fa fa-thumbs-up"></i> 54</span></div>-->
<!--                    </li>-->
<!--                    <li style="overflow: hidden; height: 0.292894px; padding-top: 0px; margin-top: 0.0150976px; padding-bottom: 0px; margin-bottom: 0.0150976px;"-->
<!--                        class="item">-->
<!--                        <div class="p-3">-->
<!--                            <div class="mb-2"><a href="faq.html"><span class="fs-14"><i class="fa fa-question-circle-o"-->
<!--                                                                                        aria-hidden="true"></i> How Can I Change My Details of My Post Add?</span></a>-->
<!--                            </div>-->
<!--                            <span class="badge badge-primary"><i class="fa fa-eye"></i> 147</span> <span-->
<!--                                    class="badge badge-success"><i class="fa fa-thumbs-up"></i> 14</span></div>-->
<!--                    </li>-->
<!--                    <li style="display: none;" class="item">-->
<!--                        <div class="p-3">-->
<!--                            <div class="mb-2"><a href="faq.html"><span class="fs-14">Can I use this Plugins in Another Template?</span></a>-->
<!--                            </div>-->
<!--                            <span class="badge badge-primary"><i class="fa fa-eye"></i> 965</span> <span-->
<!--                                    class="badge badge-success"><i class="fa fa-thumbs-up"></i> 35</span></div>-->
<!--                    </li>-->
<!---->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!---->
<!--</div>-->


<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Chat</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Apps</a></li>
                <li class="breadcrumb-item active" aria-current="page">chat</li>
            </ol>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-6">
                        <div id="demo">
                            <div class="vertical-align">
                                <div class="p-0">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="no-border">
                                                <div id="chat" class="conv-form-wrapper">
                                                    <form method="GET" class="hidden" style="display: none;">


                                                        <div data-conv-fork="programmer">
                                                            <div data-conv-case="yes">

                                                            </div>
                                                            <div data-conv-case="no">

                                                            </div>
                                                        </div>


                                                    </form>
                                                    <div class="wrapper-messages">
                                                        <div class="spinLoader hidden"></div>
                                                        <div id="messages" style="padding-bottom: 47.5938px;">
                                                            <div class="message to ready">Hello! I'm aJobslist created
                                                                from a HTML form. Can I show you some features? (this
                                                                question comes from a select)
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form id="convForm" class="convFormDynamic">
                                                        <div class="options dragscroll">
                                                            <div class="option">Yes</div>
                                                            <div class="option">Sure!</div>
                                                        </div>
                                                        <textarea id="userInput" rows="1" placeholder="Type Here"
                                                                  class="userInputDynamic"
                                                                  style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 33px;"></textarea>
                                                        <button type="submit" class="submit">▶</button>
                                                        <span class="clear"></span></form>
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





