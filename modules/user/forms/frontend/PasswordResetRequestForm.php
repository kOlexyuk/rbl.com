<?php

namespace app\modules\user\forms\frontend;

use app\modules\main\validators\PhoneEmailValidator;
use app\modules\user\models\User;
use app\modules\user\Module;
use yii\base\Model;
use Yii;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email_phone;

//    public $email_or_phone; //  0


    private $_user = false;
    private $_timeout;

    /**
     * PasswordResetRequestForm constructor.
     * @param integer $timeout
     * @param array $config
     */
    public function __construct($timeout, $config = [])
    {
        $this->_timeout = $timeout;
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email_phone', 'filter', 'filter' => 'trim'],
            ['email_phone', 'required'],
//            ['email', 'email'],
            ['email_phone', PhoneEmailValidator::className()],
//            ['email_phone', 'exist',
//                'targetClass' => User::className(),
//                'filter' => ['status' => User::STATUS_ACTIVE],
//                'message' => Yii::t('app', 'ERROR_USER_NOT_FOUND_BY_EMAIL')
//            ],
//            ['email_phone', 'validateIsSent'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email_phone' => Yii::t('app', 'Email or phone'),
        ];
    }

    /**
     * @param string $attribute
     * @param array $params
     */
    public function validateIsSent($attribute, $params)
    {
        if (!$this->hasErrors() && $user = $this->getUser()) {
            if (User::isPasswordResetTokenValid($user->$attribute, $this->_timeout)) {
                $this->addError($attribute, Module::t('module', 'ERROR_TOKEN_IS_SENT'));
            }
        }
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        if ($user = $this->getUser()) {
            $user->generatePasswordResetToken();
            if ($user->save()) {
                return \Yii::$app->mailer->compose(['text' => '@app/modules/user/mails/passwordReset'], ['user' => $user])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                    ->setTo($this->email_phone)
                    ->setSubject('Password reset for ' . \Yii::$app->name)
                    ->send();
            }
        }
        return false;
    }

    public function sendPassByEmail()
    {
        if ($user = $this->getUser()) {
           $password = $user->generatePassword();
            if ($user->save()) {
                return \Yii::$app->mailer->compose(['text' => '@app/modules/user/mails/passwordReset'], ['user' => $user , 'password'=>$password])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                    ->setTo($this->email_phone)
                    ->setSubject('Password reset for ' . \Yii::$app->name)
                    ->send();
            }
        }
        return false;
    }

    public function sendPassBySMS()
    {
        if ($user = $this->getUser()) {
            $password = $user->generatePassword();
            if ($user->save()) {
                if (!empty(Yii::$app->turbosms)) {
                 return   Yii::$app->turbosms->send($password, $user->phone);
                }
            }
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUserOld()
    {
        if ($this->_user === false) {
            $this->_user = User::findOne([
                'email' => $this->email_phone,
                'status' => User::STATUS_ACTIVE,
            ]);
        }

        return $this->_user;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByEmailOrPhone($this->email_phone);
        }

        return $this->_user;
    }
}
