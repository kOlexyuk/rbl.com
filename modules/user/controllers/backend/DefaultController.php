<?php

namespace app\modules\user\controllers\backend;

use app\modules\guid\models\Region;
use app\modules\guid\models\Service;
use app\modules\guid\models\Util;
use app\modules\user\controllers\frontend\ProfileController;
use app\modules\user\forms\backend\search\UserSearch;
use app\modules\user\forms\frontend\ProfileSearch;
use app\modules\user\forms\frontend\ProfileUpdateForm;
use app\modules\user\models\backend\User;
use app\modules\user\models\UserProfile;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * UsersController implements the CRUD actions for User model.
 */
class DefaultController extends Controller
{


    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
//        $user = $this->findModel($id);
////        ProfileController::updateProfile($user, $this);
//        $model = new ProfileUpdateForm($user);
        $model = null;
        $models = ProfileSearch::getProfileList($id );
        if(count($models)> 0)
            $model = $models[0];
        if($model== null)
        {
            $profile = new UserProfile();
            $profile ->id =  $id;
            $profile->save();
            $model = ProfileSearch::getProfileList($id )[0];
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $model->scenario = User::SCENARIO_ADMIN_CREATE;
        $model->status = User::STATUS_ACTIVE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = User::SCENARIO_ADMIN_UPDATE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateProfile($id)
    {
//        $user = $this->findModel($id);
//        $model = new ProfileUpdateForm($user);
//        if ($model->load(Yii::$app->request->post()) ){
//
//            $photo = UploadedFile::getInstance($model, 'photo');
//
//            if(!empty($photo->tempName))
//                $model->photo = 'data:image/jpeg;base64,'.base64_encode(file_get_contents($photo->tempName));
//            else
//                $model->photo = Yii::$app->request->post()['photo_hidden'];
//            if($model->update()) {
//                return $this->redirect(['index']);
//            }
//        } else {
//            $data['service'] = Service::getServiceList();
//            $data['service_json'] = Util::toArrayForJson( $data['service']);
//            $data['region'] = Region::getRegionList();
//            $data['region_json'] = Util::toArrayForJson( $data['region']);
//            $data['empty_photo']  = Yii::$app->params['user.empty_photo'];
//            return $this->render('@app/modules/user/views/frontend/profile/update_rejoin', [
//                'model' => $model,
//                'data' => $data,
//            ]);
//        }

        $user = $this->findModel($id);
//        self::updateProfile($user, $this);
        $model = new ProfileUpdateForm($user);

        if ($model->load(Yii::$app->request->post()) ){
            $photo = UploadedFile::getInstance($model, 'photo');
            if(!empty($photo->tempName))
                $model->photo = 'data:image/jpeg;base64,'.base64_encode(file_get_contents($photo->tempName));
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
            return $this->render('@app/modules/user/views/frontend/profile/update_rejoin.php', [
                'model' => $model,
                'data' => $data,
            ]);
        }

    }





    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $us = $this->findModel($id);
        $us->ChangeEmailBlockUser();
       // $model->scenario = User::SCENARIO_ADMIN_UPDATE;

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findProfileModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
