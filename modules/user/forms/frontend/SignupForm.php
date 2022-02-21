<?php

namespace app\modules\user\forms\frontend;

use app\components\EitherValidator;
use app\modules\user\models\User;
use app\modules\user\Module;

use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $verifyCode;
    public $phone;

    private $_defaultRole;

    public $agree;

    /**
     * @param string $defaultRole
     * @param array $config
     */
    public function __construct($defaultRole, $config = [])
    {
        $this->_defaultRole = $defaultRole;
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'match', 'pattern' => '#^[\w_-]+$#i'],
            ['username', 'unique', 'targetClass' => User::className(), 'message' => Module::t('module', 'ERROR_USERNAME_EXISTS')],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
//            ['email', 'email'],
            ['email', 'unique', 'skipOnEmpty' => true, 'targetClass' => User::className(), 'message' => Module::t('module', 'ERROR_EMAIL_EXISTS')],

            ['phone', 'trim'],
//            ['email', 'required'],
//            ['email', 'email'],
            ['phone', 'unique', /*'skipOnEmpty' => true,*/ 'targetClass' => User::className(), 'message' => Module::t('module', 'ERROR_PHONE_EXISTS')],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

//            ['verifyCode', 'captcha', 'captchaAction' => '/user/default/captcha'],
             ['phone', 'required'],
//            [ ['email','phone'] ,  EitherValidator::className()],
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
            'username' => Module::t('module', 'USER_USERNAME'),
            'email' => Module::t('module', 'USER_EMAIL'),
            'password' => Module::t('module', 'USER_PASSWORD'),
            'verifyCode' => Module::t('module', 'USER_VERIFY_CODE'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->status = User::STATUS_WAIT;
            $user->role = $this->_defaultRole;
            $user->phone = $this->phone;
            $user->generateAuthKey();
//            if(isset( $user->email))
               $user->generateEmailConfirmToken();
//            else
                if (isset( $user->phone))
                $user->generatePhoneConfirmToken();

            if ($user->save()) {

                if (isset( $user->phone)){                    //send sms
                    if (!empty(Yii::$app->turbosms)) {
                            Yii::$app->turbosms->send($user->phone_confirm, $user->phone);
                        }
//                        return "TurboSMS";
                }
                if (isset( $user->email)){                    //send sms
                    if (!empty(Yii::$app->mailer)) {
                        Yii::$app->mailer->compose(['text' => '@app/modules/user/mails/emailConfirm'], ['user' => $user])
                            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                            ->setTo($this->email)
                            ->setSubject('Email confirmation for ' . Yii::$app->name)
                            ->send();
                    }
//                        return "TurboSMS";
                }
                return $user;
            }
        }

        return null;
    }

}
