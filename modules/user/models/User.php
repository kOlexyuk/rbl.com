<?php

namespace app\modules\user\models;

use app\components\EitherValidator;

use app\modules\guid\models\Region;
use app\modules\guid\models\UserService;
use app\modules\guid\models\UserServiceArea;

use app\modules\guid\models\Service;
use app\modules\guid\models\ServiceArea;
use app\modules\main\models\UserFavorite;
use app\modules\main\models\UserMessages;
use app\modules\user\models\UserProfile;
use app\modules\user\models\Address;
use app\modules\user\models\query\UserQuery;
use app\modules\user\Module;

use udokmeci\yii2PhoneValidator\PhoneValidator;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

use yii\helpers\ArrayHelper;
use yii\validators\EmailValidator;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $username
 * @property string $auth_key
 * @property string $email_confirm_token
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $role
 * @property integer $status
 * @property string $phone
 * @property string $phone_confirm
 * @property integer $phone_confirm_created
 * @property integer $phone_request_count
 * @property integer $show_contact
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_BLOCKED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_WAIT = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @return UserQuery|object
     * @throws \yii\base\InvalidConfigException
     */
    public static function find()
    {
        return Yii::createObject(UserQuery::class, [static::class]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'match', 'pattern' => '#^[\w_-]+$#i'],
            ['username', 'unique', 'targetClass' => self::className(), 'message' => Module::t('module', 'ERROR_USERNAME_EXISTS')],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'unique', 'skipOnEmpty' => true , 'targetClass' => self::className(), 'message' => Module::t('module', 'ERROR_EMAIL_EXISTS')],
            ['email', 'string', 'max' => 255],

            ['status', 'integer'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => array_keys(self::getStatusesArray())],

            ['role', 'string', 'max' => 64],
            ['show_contact' ,  'safe'],

            ['phone', 'trim'],
            [['phone_confirm','phone_confirm_created','phone_request_count'], 'safe'],
            [['phone_confirm_created','phone_request_count'], 'integer'],
            [['phone_confirm'], 'string'],


            ['phone', 'required'],
            ['phone', 'string' , 'max'=>64],
            ['phone', 'unique','skipOnEmpty' => true , 'targetClass' => self::className(), 'message' => Module::t('module', 'ERROR_PHONE_EXISTS')],
 //           [ ['email','phone'] ,  EitherValidator::className()],
//            array(array('email','phone'),   'filter', 'filter'=> function ($value) {
//                return $value==='' ? null : $value;
//            }),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => Module::t('module', 'USER_CREATED'),
            'updated_at' => Module::t('module', 'USER_UPDATED'),
            'username' => Module::t('module', 'USER_USERNAME'),
            'email' => Module::t('module', 'USER_EMAIL'),
            'status' => Module::t('module', 'USER_STATUS'),
            'role' => Module::t('module', 'USER_ROLE'),
            'phone' => Module::t('module', 'USER_PHONE'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getStatusName()
    {
        return ArrayHelper::getValue(self::getStatusesArray(), $this->status);
    }

    public static function getUserStatusName($status_id)
    {
        return ArrayHelper::getValue(self::getStatusesArray(), $status_id);
    }

    public static function getStatusesArray()
    {
        return [
            self::STATUS_BLOCKED => Module::t('module', 'USER_STATUS_BLOCKED'),
            self::STATUS_ACTIVE => Module::t('module', 'USER_STATUS_ACTIVE'),
            self::STATUS_WAIT => Module::t('module', 'USER_STATUS_WAIT'),
        ];
    }

    /**
    * @inheritdoc
    */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('findIdentityByAccessToken is not implemented.');
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public static function findByEmailOrPhone($email_phone)
    {
//        return static::findOne(['username' => $username]);

        if(self::isEmail($email_phone))
            return static::findOne(['email' => $email_phone,
                'status' => User::STATUS_ACTIVE,]);
        elseif(self::isPhone($email_phone))
            return static::find()->where(["regex_replace('[^0-9]','',phone)" => preg_replace("/[^0-9]/", "",$email_phone),
                'status' => User::STATUS_ACTIVE,])->one();

    }

    public static function isEmail($email)
    {

        $validator = new EmailValidator();
        $res =   $validator->validate($email);
        return $res;

    }

    public static function isPhone($phone)
    {
        $phoneNumberFormat =   '/^(\+?\d+)?\s*(\(\d+\))?[\s-]*([\d-]*)$/';
        if(preg_match($phoneNumberFormat, $phone)) {
            return true;
        }
          return false;

//        $validator = new  PhoneValidator();
//        $res =   $validator->validate($phone);
//        return $res;
    }


    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * @param string $email_confirm_token
     * @return static|null
     */
    public static function findByEmailConfirmToken($email_confirm_token)
    {
        return static::findOne(['email_confirm_token' => $email_confirm_token, 'status' => self::STATUS_WAIT]);
    }

    public static function findByPhoneConfirmToken($email_confirm_token , $phone_confirm)
    {
        return static::findOne(['email_confirm_token' => $email_confirm_token,'phone_confirm' => $phone_confirm, 'status' => self::STATUS_WAIT]);
    }

    /**
     * Generates email confirmation token
     */
    public function generateEmailConfirmToken()
    {
        $this->email_confirm_token = Yii::$app->security->generateRandomString();
    }

    /**
     * Removes email confirmation token
     */
    public function removeEmailConfirmToken()
    {
        $this->email_confirm_token = null;
    }


    public function canRequest() {
        if ($this->phone_request_count<7) {
            if (time() - $this->phone_confirm_created>=60) {
                return true;
            } else {
                return Yii::t('frontend','Sorry, you must wait a minute between requests.');
            }
        } else {
            return Yii::t('frontend','You have exceeded the maximum number of attempts.');
        }
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @param integer $timeout
     * @return static|null
     */
    public static function findByPasswordResetToken($token, $timeout)
    {
        if (!static::isPasswordResetTokenValid($token, $timeout)) {
            return null;
        }
        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @param integer $timeout
     * @return bool
     */
    public static function isPasswordResetTokenValid($token, $timeout)
    {
        if (empty($token)) {
            return false;
        }
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $timeout >= time();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }


    public function generatePassword()
    {
        $password = Yii::$app->security->generateRandomString(6);
        $this->setPassword($password);
        return $password;
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->generateAuthKey();
            }
            return true;
        }
        return false;
    }

    public function generatePhoneConfirmToken()
    {
        $this->phone_confirm =sprintf("%04d", rand(0,9999));
        $this->phone_confirm_created = time();
        $this->phone_request_count += 1;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserServices()
    {
        return $this->hasMany(UserServiceArea::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Service::className(), ['id' => 'service_id'])->viaTable('user_service', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getUserServiceAreas()
//    {
//        return $this->hasMany(UserServiceArea::className(), ['user_id' => 'id']);
//    }


    /**
     * @return string
     */
    public function getServicesList()
    {
      $serv =  $this->hasMany(Service::className(), ['id' => 'service_id'])->viaTable('user_service', ['user_id' => 'id'])->all();
      $list = "";
      foreach ($serv as $s)
          $list .= ". ".$s->name;
      return $list;
    }

    public function getProfile()
    {
       $profile =  $this->hasOne(UserProfile::className(), ['id' => 'id'])->one();
       if(!isset($profile)) {
           $profile = new UserProfile();
           $profile ->id =  $this->id;
           $profile->save();
       }

       return $profile;

    }

//    public static function onLanguageChanged($event)
//    {
//        // $event->language: new language
//        // $event->oldLanguage: old language
//
//        // Save the current language to user record
//        $user = Yii::$app->user;
//        if (!$user->isGuest) {
//            $user->identity->language = $event->language;
//            $user->identity->save();
//        }
//    }
    public function getRegions()
    {
        return $this->hasMany(Region::className(), ['id' => 'region_id'])->viaTable('user_region', ['user_id' => 'id']);
    }

    public function getFavorites()
    {
        return $this->hasMany(UserFavorite::className(), ['user_id' => 'id']);
    }

    public function getRegionsList()
    {
        $reg =  self::getRegions()->all();
        $list = "";
        foreach ($reg as $s)
            $list .= ". ".$s->name;
        return $list;
    }

    public function getUserName(){
        return $this->username;
    }

    public  function getNotReadMessage(){

        $sql = 'SELECT * FROM user_messages WHERE status=:status and `read`=0 and user_id_to = :user_id_to';
        return  self::findBySql($sql, [':status' => UserMessages::STATUS_APPROVED
            ,':user_id_to'=> Yii::$app->getUser()->getId()
        ])->count();

    }


    public static function sendEmail2($msg, $email){
        $message = Yii::$app->mailer->compose();
        if (Yii::$app->user->isGuest) {
            $message->setFrom('from@domain.com');
        } else {
            $message->setFrom(Yii::$app->user->identity->email);
            }
        $message->setTo(Yii::$app->params['adminEmail'])
            ->setSubject('Тема сообщения')
            ->setTextBody('Текст сообщения')
            ->send();

     }

}
