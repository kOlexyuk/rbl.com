<?php

namespace app\modules\main\models;

use app\modules\user\models\User;
use Yii;

/**
 * This is the model class for table "user_messages".
 *
 * @property int $id
 * @property int $user_id_from
 * @property int $user_id_to
// * @property int $user_name_from
// * @property int $user_name_to
 * @property string $message
 * @property int $created_at
 * @property int $checked_at
 * @property int $status status of moderation, (0-new,1-aproved,2-declined)
 * @property string $admin_comment admin_comment  of moderation
 *
 * @property User $userIdTo
 * @property User $userIdFrom
 * @property int $stars
 * @property int $is_review
 * @property int $read
 */
class UserMessages extends \yii\db\ActiveRecord
{

    const STATUS_DECLINED = 2;
    const STATUS_APPROVED = 1;
    const STATUS_NEW = 0;
    const STATUS_READ = 3;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_messages';
    }




    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id_from', 'user_id_to', 'created_at', 'checked_at', 'status','stars', 'is_review','read'], 'integer'],
            [['user_id_to'], 'required'],
//            [['user_id_to', 'message'], 'required'],
            [['message', 'admin_comment'], 'string'],
//            [['user_name_from','user_name_to'], 'string'],
            [['message', 'admin_comment','is_review', 'read'], 'safe'],
            [['message', 'admin_comment'], 'trim'],
            [['user_id_to'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id_to' => 'id']],
            [['user_id_from'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id_from' => 'id']],
        ];
    }

//    public static function find() {
//        return parent::find ()
//            ->innerJoin('user as ufrom' , 'user_messages.user_id_from = ufrom.id')
//            ->innerJoin('user as uto' , 'user_messages.user_id_to = uto.id')
//            ->select('user_messages.id,user_messages.user_id_from, user_messages.user_id_to, user_messages.message,user_messages.stars,user_messages.created_at,user_messages.checked_at,user_messages.status,user_messages.admin_comment,user_messages.is_review, ufrom.username as user_name_from, uto.username as user_name_to ')
//        ;
//    }


    public static function getStatusesArray()
    {
        return [
            self::STATUS_DECLINED => Yii::t('app', 'DECLINED'),
            self::STATUS_APPROVED => Yii::t('app', 'APPROVED'),
            self::STATUS_NEW => Yii::t('app', 'NEW'),
            self::STATUS_READ => Yii::t('app', 'READ'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id_from' => Yii::t('app', 'User Id From'),
            'user_id_to' => Yii::t('app', 'User Id To'),
//            'user_name_from'=> Yii::t('app', 'User name from'),
//            'user_name_to'=> Yii::t('app', 'User name to'),
            'is_review' => Yii::t('app', 'Feedback/Message'),
            'read' => Yii::t('app', 'Read'),
            'message' => Yii::t('app', 'Message'),
            'created_at' => Yii::t('app', 'Created at'),
            'checked_at' => Yii::t('app', 'Checked at'),
            'status' => Yii::t('app', 'status of moderation, (0-new,1-aproved,2-declined)'),
            'admin_comment' => Yii::t('app', 'admin_comment  of moderation'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIdTo()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id_to']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIdFrom()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id_from']);
    }

    /**
     * @return string|null
     */
    public function getUserNameTo()
    {
        if(self::getUserIdTo()->one())
            return self::getUserIdTo()->one()->getAttribute('username');
        else
            return Yii::t('app', 'guest');
    }



    /**
     * @return string|null
     */
    public function getUserNameFrom()
    {
        if(self::getUserIdFrom()->one())
            return self::getUserIdFrom()->one()->getAttribute('username');
        else
            return Yii::t('app', 'guest');
    }

    /**
     * {@inheritdoc}
     * @return UserMessagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserMessagesQuery(get_called_class());
    }

    /**
     * @param $user_id
     * @return UserMessages[]|array
     */
//    public static function getMyMessageWithUser($user_id)
//    {
//      return  self::find()->where(['status' => UserMessages::STATUS_APPROVED,])
//           ->andWhere('user_id_from is not null')
//           ->andWhere(['user_id_from'=>[Yii::$app->getUser()->getId(), $user_id ],
//          'user_id_to'=>[Yii::$app->getUser()->getId(), $user_id ],])->orderBy('created_at')->all();
//    }

    /**
     * @return UserMessages[]|array
     */
//    public static function getMyMessages1()
//    {
//        return  self::find()->where(['status' => UserMessages::STATUS_APPROVED,])
//            ->AndWhere(['user_id_from'=>[Yii::$app->getUser()->getId() ],
//               ])->orWhere( ['user_id_to'=>[Yii::$app->getUser()->getId() ]])
//            ->all();
//    }


    /**
     * @return array|\yii\db\ActiveRecord[]
     */
//    public static function getMyMessages()
//    {
//        $sql = 'SELECT * FROM user_messages
//                WHERE status=:status and is_review = 0
//                  and (user_id_from = :user_id_from or user_id_to = :user_id_to)';
//        return  self::findBySql($sql, [':status' => UserMessages::STATUS_APPROVED
//            ,':user_id_from'=> Yii::$app->getUser()->getId()
//            ,':user_id_to'=> Yii::$app->getUser()->getId()
//        ])->all();
//    }


    public static function getMessagesToMe()
    {
        $sql = 'SELECT um.* FROM user_messages um 
                 inner join user as u1 on um.user_id_to = u1.id
                 inner join user as u2 on um.user_id_from = u2.id
                WHERE (( user_id_from = :user_id) or ( user_id_to = :user_id)) 
                   and u1.status = 1 and u2.status=2 and u1.id > 1 and u2.id > 1 ;';
        return  self::findBySql($sql, [
            ':user_id'=> Yii::$app->getUser()->getId()
        ])->all();
    }

    public static function getApprovedReview($user_id)
    {
        $sql = 'SELECT um.* FROM user_messages  um
                inner join user as u1 on um.user_id_from = u1.id               
                WHERE um.status=:status and um.is_review = 1 
                  and (user_id_to = :user_id_to) and u1.status = 1  and u1.id > 1;';
        return  self::findBySql($sql, [':status' => UserMessages::STATUS_APPROVED
            ,':user_id_to'=> $user_id
        ])->all();
    }



    public static function readMessage($user_id_from)
    {
        $sql = "update `user_messages` set `read` = 1 where  `user_id_from` = $user_id_from;";
        Yii::$app->db->createCommand($sql)
            ->execute();
    }





    public static function isCanSendReviw($id)
    {
       $sql = "select  um.created_at  from user_messages um
                
                 WHERE  um.is_review = 1 and um.user_id_to = :user_id_to 
               and  user_id_from = :user_id_from  order by created_at desc limit 1";

         $res = self::findBySql($sql ,[':user_id_to'=> $id
             ,':user_id_from'=> Yii::$app->getUser()->getId()
         ])->one();

         if($res == null)
             return true;

         return ((time() - $res['created_at']) >  Yii::$app->params['userMessages.ReviewExpire']);
//        and (UNIX_TIMESTAMP() - created_at)
    }


    public static function getLastMyMessages(){
        $sql = 'SELECT * FROM user_messages WHERE id in (
                select  max(a.id) as id 
                from
                (
                SELECT max(id) as id , user_id_to FROM user_messages 
                WHERE ( user_id_from = :user_id) and is_review = 0
                group by  user_id_to
                union
                SELECT max(id) as id , user_id_from FROM user_messages 
                WHERE  ( user_id_to = :user_id) and is_review = 0
                group by user_id_from 
                ) as a
                group by a.user_id_to);';
        return  self::findBySql($sql, [':user_id'=> Yii::$app->getUser()->getId()])->all();
    }


    public static function getMyMessagesToUser($user_id){
        $sql = 'SELECT * FROM user_messages 
                WHERE (user_id_to = :user_id or user_id_to = :my_id)
                and (user_id_from= :user_id or user_id_from= :my_id)
                and is_review = 0 
                ORDER BY id;';
        return  self::findBySql($sql, [':user_id'=> $user_id
            , ':my_id'=> Yii::$app->getUser()->getId()])->all();
    }

    public static function getMeReview()
    {
        $sql = 'SELECT * FROM user_messages 
                WHERE (user_id_to = :user_id)
                and is_review = 1 
                ORDER BY id;';
        return  self::findBySql($sql, [':user_id'=> Yii::$app->getUser()->getId()])->all();
    }

    public static function getMyReview()
    {
        $sql = 'SELECT * FROM user_messages 
                WHERE (user_id_from = :user_id)
                and is_review = 1 
                ORDER BY id;';
        return  self::findBySql($sql, [':user_id'=> Yii::$app->getUser()->getId()])->all();
    }

}
