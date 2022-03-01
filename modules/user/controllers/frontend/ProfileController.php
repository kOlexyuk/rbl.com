<?php

namespace app\modules\user\controllers\frontend;

use app\modules\guid\models\Region;
use app\modules\guid\models\Service;
use app\modules\guid\models\ServiceArea;
use app\modules\guid\models\Util;
use app\modules\main\models\UserMessages;
use app\modules\user\forms\frontend\PasswordChangeForm;
use app\modules\user\forms\frontend\ProfileForm;
use app\modules\user\forms\frontend\ProfileSearch;
use app\modules\user\forms\frontend\ProfileUpdateForm;
use app\modules\user\models\User;
use app\modules\user\Module;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;

use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        //  show all approved reviews
        $my_message =  UserMessages::getApprovedReview(Yii::$app->user->identity->getId());
        Yii::$app->user->identity->getProfile();
        $model = ProfileSearch::getProfile(Yii::$app->user->identity->getId());
        $message = new UserMessages();
        return $this->render('index_rejoin', [
            'model' =>     $model,
             'message' => $message,
            'my_message'=>$my_message
        ]);
    }

    public function actionUpdate()
    {
        $user = $this->findModel();
//        self::updateProfile($user, $this);
        $model = new ProfileUpdateForm($user);

        if ($model->load(Yii::$app->request->post()) ){
            $photo = UploadedFile::getInstance($model, 'photo');
            if(!empty($photo->tempName))
            {
                Image::thumbnail($photo->tempName, 80, 80)
                    ->save($photo->tempName.'tmp', ['quality' => 80]);
                $model->photo = 'data:image/jpeg;base64,' . base64_encode(file_get_contents($photo->tempName.'tmp'));
            }

            else
                $model->photo = Yii::$app->request->post()['photo_hidden'];
            if($model->update()) {
            return $this->redirect(['index']);
        }
        } else {
            $data['service'] = Service::getServiceList();
            $data['service_json'] = Util::toArrayForJson( $data['service']);
            $data['region'] = Region::getRegionList();
            $data['region_json'] = Util::toArrayForJson( $data['region']);
            $data['user_region'] =   $user->getUserRegions()->asArray()->all();
            return $this->render('update_rejoin', [
                'model' => $model,
                'data' => $data,
            ]);
        }
    }


    public static function updateProfile($user , $controller)
    {
        $model = new ProfileUpdateForm($user);
        if ($model->load(Yii::$app->request->post()) ){

            $photo = UploadedFile::getInstance($model, 'photo');

            if(!empty($photo->tempName)) {
                $img = Yii::getAlias($photo->tempName);
                Image::thumbnail($img, 80, 80)
                    ->save(Yii::getAlias("tmp".$photo->tempName), ['quality' => 80]);
                $model->photo = 'data:image/jpeg;base64,' . base64_encode(file_get_contents("tmp".$photo->tempName));
            }
            else {
                $model->photo = Yii::$app->request->post()['photo_hidden'];
            }
            if($model->update()) {
//                return $this->redirect(['view', 'id' => $id]);
                return $controller->redirect(['index']);
            }
        } else {
            $data['service'] = Service::getServiceList();
            $data['service_json'] = Util::toArrayForJson( $data['service']);
            $data['region'] = Region::getRegionList();
            $data['region_json'] = Util::toArrayForJson( $data['region']);
            return $controller->render('@app/modules/user/views/frontend/profile/update', [
                'model' => $model,
                'data' => $data,
            ]);
        }
    }


    public function actionPasswordChange()
    {
        $user = $this->findModel();
        $model = new PasswordChangeForm($user);

        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            Yii::$app->getSession()->setFlash('success', Module::t('module', 'FLASH_PASSWORD_CHANGE_SUCCESS'));
            return $this->redirect(['index']);
        } else {
            return $this->render('passwordChange', [
                'model' => $model,
            ]);
        }
    }

    /**
     * @return User the loaded model
     */
    private function findModel()
    {
        return User::findOne(Yii::$app->user->identity->getId());
    }

    /**
     * @return ProfileForm the loaded model
     */
    private function findProfileMessages($userId = null)
    {
        if(!isset($userId))
            $userId = Yii::$app->getUser()->getId();

//        return UserMessages::
    }



    /**
     * @return ProfileForm the loaded model
     */
    private function findProfileModel()
    {
        return new ProfileForm($this->findModel());
    }

    public function getUserProfile($user_id){
        return new ProfileForm(User::findOne($user_id));
    }

    public function  toArrayForJson(array $data)
    {
        $objArr = [];
        foreach ( $data as $key=>$val ){
            $obj= new ToJson();
            $obj->label = $val;
            $obj->value = $val;
            $obj->id = $key;
            $objArr[] = $obj;
        }
        return $objArr;
    }
}

class ToJson
{
    public $label;
    public $value ;
    public $id ;
}
