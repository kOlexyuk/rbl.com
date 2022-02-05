<?php


namespace app\modules\guid\controllers;






use app\modules\guid\models\Service;
use app\modules\guid\models\ServiceLang;
use app\modules\guid\models\ServiceSearch;
use app\modules\user\models\User;
use app\modules\guid\models\ServiceArea;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ServiceController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ServiceItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $service_area =  ServiceArea::getServiceAreaList();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
//            'service_area' => $service_area,
        ]);
    }

    /**
     * Displays a single ServiceItem model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [

            'model' => $model,
            'service_area_name' => $model->getServiceAreaName(),
        ]);
    }

    /**
     * Creates a new ServiceItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Service();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $data['service_area'] = ServiceArea::getServiceAreaList();

        return $this->render('create', [
            'model' => $model,
            'data' => $data,
        ]);
    }

    /**
     * Updates an existing ServiceItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        }
        $data['service_area'] = ServiceArea::getServiceAreaList();
        return $this->render('update', [
            'model' => $model,
            'data' => $data,
        ]);
    }

    /**
     * Deletes an existing ServiceItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ServiceItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Service the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Service::findOne($id)) !== null) {
            return $model;
        }

//        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


    protected function findModelLang0($id , $lang='ru')
    {
        if (($model = ServiceLang::findOne(['id'=>$id , 'lang'=>'ru'])) !== null) {
            return $model;
        }
//
//        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findModelLang($id , $lang='ru')
    {
        $model = ServiceLang::findOne([
            'id' => $id,
            'lang' => $lang,////Yii::$app->language,
        ]);
        if( $model  !== null) {
            return $model;
        }
        else
        {
            return new ServiceLang();
        }

    }


    public function  actionServiceLang($id)
    {

//
//        $modelRu = $this->findModelRu($id)?? new ServiceLang();
////        if($modelRu->isNewRecord()){
////            var_dump($modelRu);die;
////        }
//
//        $modelRu->id = $id;
//        if ($modelRu->load(Yii::$app->request->post()) && $modelRu->save() ){
//            return $this->redirect(['index']);
//        }
//
//        $model = $this->findModel($id);
//
//        $service_area_name = ServiceArea::findOne(['id'=>$model->service_area_id])->getName();
//
//        return $this->render('update_lang', [
//            'model' => $modelRu,
//            'service_area_name' => $service_area_name,
//        ]);

        $modelRu = $this->findModelLang($id);//?? new ServiceAreaLang();
        if ($modelRu->load(Yii::$app->request->post())){
            $modelRu->lang = 'ru';
            $modelRu->id = $id;
            if( $modelRu->save())
                return $this->redirect(['index']);
        }
        $model = $this->findModel($id);
        $service_area_name = ServiceArea::findOne(['id'=>$model->service_area_id])->getName();
        return $this->render('update_lang', [
            'model' => $modelRu,
            'service_area_name'=>$service_area_name,
        ]);
    }



//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['post'],
//                ],
//            ],
//        ];
//    }
//
//    /**
//     * Lists all User models.
//     * @return mixed
//     */
//    public function actionIndex()
//    {
//
//        $searchModel = new ServiceSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
//    }
//
//    /**
//     * Displays a single User model.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }
//
//    /**
//     * Creates a new User model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     * @return mixed
//     */
//    public function actionCreate()
//    {
//        $model = new User();
//        $model->scenario = User::SCENARIO_ADMIN_CREATE;
//        $model->status = User::STATUS_ACTIVE;
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
//    }
//
//    /**
//     * Updates an existing User model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//        $model->scenario = User::SCENARIO_ADMIN_UPDATE;
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }
//
//    /**
//     * Deletes an existing User model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
//
//    /**
//     * Finds the User model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param integer $id
//     * @return User the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    protected function findModel($id)
//    {
//        if (($model = User::findOne($id)) !== null) {
//            return $model;
//        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
//        }
//    }

}