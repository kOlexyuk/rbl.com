<?php


namespace app\modules\user\forms\frontend;


use app\modules\user\models\User;
use yii\base\InvalidParamException;

class PhoneConfirm
{
    /**
     * @var User
     */
    private $_user;

    /**
     * Creates a form model given a token.
     *
     * @param  string $token
     * @param  array $config
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($token , $code)
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidParamException('Phone confirm token cannot be blank.');
        }
        $this->_user = User::findByPhoneConfirmToken($token,$code);
        if (!$this->_user) {
            throw new InvalidParamException('Wrong Phone confirm token.');
        }
    }

    /**
     * Confirm email.
     *
     * @return boolean if email was confirmed.
     */
    public function confirmPhone()
    {
        $user = $this->_user;
        $user->status = User::STATUS_ACTIVE;
        $user->removeEmailConfirmToken();

        return $user->save();
    }
}