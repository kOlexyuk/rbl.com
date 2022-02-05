<?php

namespace app\modules\user\controllers\frontend;

use app\modules\user\forms\frontend\EmailConfirm;
use app\modules\user\forms\frontend\PhoneConfirm;
use app\modules\user\forms\LoginForm;
use app\modules\user\forms\frontend\PasswordResetRequestForm;
use app\modules\user\forms\frontend\PasswordResetForm;
use app\modules\user\forms\frontend\SignupForm;
use app\modules\user\models\User;
use app\modules\user\Module;
use Yii;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->redirect(['profile/index'], 301);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login_rejoin', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }



    public function actionConfirmPhoneAjax(){


        if (Yii::$app->request->isAjax ) {

          $code = Yii::$app->request->post()['txtSms'];
//          $token = Yii::$app->request->post()['confirm-token'];
            $token = Yii::$app->getSession()->get('sms_token' );

                $user = User::findByPhoneConfirmToken($token, $code);
                if($user){
                    $user->status = User::STATUS_ACTIVE;
                    $user->removeEmailConfirmToken();
                    $user->update(false);
                    return $this->goHome();
                }
                else {
                    Yii::$app->getSession()->setFlash('success', Module::t('module', 'FLASH_EMAIL_CONFIRM_REQUEST'));
                    return Module::t('module', 'ERROR_EMAIL_CONFIRM_CODE');
                }
//                Yii::$app->getSession()->setFlash('success', Module::t('module', 'FLASH_EMAIL_CONFIRM_REQUEST'));
        }
    }

    public function actionPhoneConfirm()
    {

        if( Yii::$app->request->isPost) {
            try {
                $code = Yii::$app->request->post()['txtSms'];
//          $token = Yii::$app->request->post()['confirm-token'];
                $token = Yii::$app->getSession()->get('sms_token');


                $model = new PhoneConfirm($token, $code);
            } catch (InvalidParamException $e) {
                Yii::$app->getSession()->setFlash('error', Module::t('module', 'FLASH_EMAIL_CONFIRM_ERROR'));
               // throw new BadRequestHttpException($e->getMessage());
                 return $this->render('confirmPhone', [
//            'model' => $model,
                 ]);
            }

            if ($model->confirmPhone()) {
                Yii::$app->getSession()->setFlash('success', Module::t('module', 'FLASH_EMAIL_CONFIRM_SUCCESS'));
            } else {
                Yii::$app->getSession()->setFlash('error', Module::t('module', 'FLASH_EMAIL_CONFIRM_ERROR'));
                return $this->render('confirmPhone', [
//            'model' => $model,
                ]);
            }

            return $this->goHome();
        }

        return $this->render('confirmPhone', [
//            'model' => $model,
        ]);
    }


    public function actionSignup()
    {
        /** @var SignupForm $model */
            $model = Yii::createObject(SignupForm::class);
            if ($model->load(Yii::$app->request->post())) {
                if ($user = $model->signup()) {
                    Yii::$app->getSession()->setFlash('success', Module::t('module', 'FLASH_EMAIL_CONFIRM_REQUEST'));
                    Yii::$app->getSession()->set('sms_token' ,$user->email_confirm_token );
//                    return $this->goHome();

                    return $this->redirect([\yii\helpers\Url::to('phone-confirm')], 301);
                }
            }

            return $this->render('signup', [
                'model' => $model,
            ]);

    }


    public function actionReSms()
    {
        if (Yii::$app->request->isAjax) {

            $user = User::findByEmailConfirmToken(Yii::$app->getSession()->get('sms_token'));
            if ($user) {
                $user->generatePhoneConfirmToken();
                if ($user->update(false)) {
                    if (isset($user->phone)) {
                        //send sms
                        if (!empty(Yii::$app->turbosms)) {
                            Yii::$app->turbosms->send($user->phone_confirm, $user->phone);
                        }
                    }
                }

            }
        }
    }

    public function actionSignup1()
    {
        /** @var SignupForm $model */


        $model = Yii::createObject(SignupForm::class);
        if (Yii::$app->request->isAjax &&
            $model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                Yii::$app->getSession()->setFlash('success', Module::t('module', 'FLASH_EMAIL_CONFIRM_REQUEST'));
                Yii::$app->getSession()->set('sms_token' ,$user->email_confirm_token );
                return  $user->email_confirm_token;
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);

    }

    public function actionValidateSignupForm()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $model = Yii::createObject(SignupForm::class);
            if($model->load(Yii::$app->request->post()))
                return \yii\widgets\ActiveForm::validate($model);
        }
        throw new \yii\web\BadRequestHttpException('Bad request!');
    }




    public function requestCode() {
//        $this->verify_code = rand(0,9999);
//        $this->requested_at = time();
//        $this->request_count+=1;
//        $this->update();
//        $sms = new Sms;
//        $sms->transmit($this->info,Yii::t('frontend',
//            'Please return to the site and type in {code}',['code'=>sprintf("%04d",$this->verify_code)]));
    }

    public function actionEmailConfirm($token)
    {
        try {
            $model = new EmailConfirm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->confirmEmail()) {
            Yii::$app->getSession()->setFlash('success', Module::t('module', 'FLASH_EMAIL_CONFIRM_SUCCESS'));
        } else {
            Yii::$app->getSession()->setFlash('error', Module::t('module', 'FLASH_EMAIL_CONFIRM_ERROR'));
        }

        return $this->goHome();
    }

    public function actionPasswordResetRequest()
    {
        /** @var PasswordResetRequestForm $model */
        $model = Yii::createObject(PasswordResetRequestForm::class);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {


            if (User::isEmail($model->email_phone)  &&  $model->sendPassByEmail()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('app', 'New password is sent to your email.'));
                return $this->goHome();
            }else if (User::isPhone($model->email_phone)  &&  $model->sendPassBySms()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('app', 'New password is sent to your phone.'));
                return $this->goHome();
            }
            else {
                Yii::$app->getSession()->setFlash('error', Yii::t('app', 'PASSWORD_RESET_ERROR'));
            }
        }

        return $this->render('passwordResetRequest', [
            'model' => $model,
        ]);
    }

    public function actionPasswordReset($token)
    {
        try {
            /** @var PasswordResetForm $model */
            $model = Yii::createObject(PasswordResetForm::class, [$token]);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', Module::t('module', 'FLASH_PASSWORD_RESET_SUCCESS'));

            return $this->goHome();
        }

        return $this->render('passwordReset', [
            'model' => $model,
        ]);
    }
}
