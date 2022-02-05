<?php

namespace app\modules\main\controllers;

use app\modules\main\models\UserMessages;
use phpDocumentor\Reflection\Types\Boolean;
use Yii;
use yii\helpers\Html;

class MessageController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $message =  UserMessages:: getMessagesToMe();
        $last_message = UserMessages::getLastMyMessages();
      //  return "message_test";
        return $this->render('index1',['message'=>$message , 'last_message'=>$last_message]);
    }

    public function actionSend()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->session->setFlash(
                'feedback-success',
                false
            );

            $msg = new UserMessages();
            $post = Yii::$app->request->post();
            $msg->user_id_from = Yii::$app->user->getId();
            $msg->user_id_to = $post['user_id_to'];
            $msg->created_at = time();
            $msg->message = Html::encode($post['text']);
            $msg->is_review = intval($post['review']);
            $msg->stars = $msg->is_review ? $post['stars'] : 0;
            if($msg->is_review === 0)
                $msg->status = 1;

            $data = [];
           if( $msg->save()) {
               return $this->renderAjax('message_div',['model'=>$msg]);
           }

        }

    }

 /*
  * send message (like chat)
  */
    public function actionSendm()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->session->setFlash(
                'feedback-success',
                false
            );
            $msg = new UserMessages();
            $post = Yii::$app->request->post();
            $msg->user_id_from = Yii::$app->user->getId();
            $msg->user_id_to = $post['user_id_to'];
            $msg->created_at = time();
            $msg->message = Html::encode($post['text']);
            $msg->is_review = 0;
            $msg->stars = 0;
            $msg->status = 1;
            if( $msg->save()) {
                return $this->renderAjax('my_message1',['model'=>$msg]);
            }
            else
                return "error save message";
        }

    }

    public function  actionUpdateRead(){
        if (Yii::$app->request->isAjax) {
           $post = Yii::$app->request->post();
           $message = UserMessages::find()->where(['id'=>$post['id']])->one();
           $message->read = 1;
           $message->save();
           return 'ok';
        }
    }


    public  function actionReviewMe(){
        if (Yii::$app->request->isAjax) {
            $message = UserMessages::getMeReview();
//            $lang = substr(Yii::$app->language,0,2);//   $_SESSION['_language'];
            $content = "";
            foreach ( $message as $msg){
                $content .= $this->renderPartial('@app/modules/main/views/message/review1.php'
                    , ['model'=>$msg]);
            }
            return $content;
        }
    }

    public  function actionReviewMy(){
        if (Yii::$app->request->isAjax) {
            $message = UserMessages::getMyReview();
//            $lang = substr(Yii::$app->language,0,2);//   $_SESSION['_language'];
            $content = "";
            foreach ( $message as $msg){
                $content .= $this->renderPartial('@app/modules/main/views/message/review1.php'
                    , ['model'=>$msg]);
            }
            return $content;
        }
    }

    public function actionPerson($id){

        if (Yii::$app->request->isAjax) {
            $message = UserMessages::getMyMessagesToUser($id);
            $lang = substr(Yii::$app->language,0,2);//   $_SESSION['_language'];
//            $content = sprintf("<input type='hidden' id='cnt_profList' value='%s'>", count($profileList));
             UserMessages::readMessage($id);
            $content = "";
            foreach ( $message as $msg){
                $content .= $this->renderPartial('@app/modules/main/views/message/my_message1.php'
                    , ['model'=>$msg]);
            }
            return $content;
        }
    }
}

/*
 * ALTER TABLE `wch_com`.`user_messages`
ADD COLUMN `read` tinyint(1) NULL DEFAULT 0 AFTER `is_review`;
 *
 * */
