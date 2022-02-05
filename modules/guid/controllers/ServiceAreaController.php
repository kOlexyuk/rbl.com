<?php


namespace app\modules\guid\controllers;

use app\modules\guid\models\ServiceArea;
use app\modules\guid\models\ServiceAreaLang;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\modules\guid\models\ServiceAreaSearch ;
use yii\web\NotFoundHttpException;


class ServiceAreaController extends Controller
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


    public function actionIndex()
    {

//        echo ' ServiceAreaController ';  die;

        $searchModel = new  ServiceAreaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Service model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
//        $modelRu = ($this->findModelRu($id))??(new ServiceLang());

//        var_dump($modelRu);
//        die;

        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelRu'=> $this->findModelRu($id),
        ]);
    }

    /**
     * Creates a new Service model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ServiceArea();
//        $modelRu = new ServiceLang();

        if ($model->load(Yii::$app->request->post())
//            && $modelRu->load(Yii::$app->request->post())
//            && $model->serviceSave($modelRu)
            && $model->save()
        ) {
//            return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
//            'modelRu'=> $modelRu,
        ]);
    }

    /**
     * Creates a new Service model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate1()
    {
        $model = new ServiceArea();
        $modelRu = new ServiceAreaLang();

//        $model->scenario = 'create';
//        $modelRu->scenario = 'create';

        if ($model->load(Yii::$app->request->post())  && $modelRu->load(Yii::$app->request->post())
//            && $model->serviceSave($modelRu)

        ) {
            $isValid = $model->validate();
            $isValid = $modelRu->validate() && $isValid;

            if($isValid){

                $model->save(false);
                $modelRu->save(false);
                return $this->redirect(['index']);

            }

//            return $this->redirect(['view', 'id' => $model->id]);

        }

        return $this->render('create', [
            'model' => $model,
             'modelRu'=> $modelRu,
        ]);
    }

    /**
     * Updates an existing Service model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
//        $modelRu = $this->findModelRu($id);

        if ($model->load(Yii::$app->request->post()) && $model->save() ){
            return $this->redirect(['view', 'id' => $model->id]);
//            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model
//            , 'modelRu'=> $modelRu
        ]);
    }

    /**
     * Deletes an existing Service model.
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
     * Finds the Service model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ServiceArea the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ServiceArea::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findModelLang($id , $lang='ru')
    {
        $model = ServiceAreaLang::findOne([
                'id' => $id,
                'lang' => $lang,////Yii::$app->language,
            ]);
         if( $model  !== null) {
            return $model;
        }
        else
        {
            return new ServiceAreaLang();
        }

    }


    public function  actionServiceAreaLang($id)
    {
        $modelRu = $this->findModelLang($id);//?? new ServiceAreaLang();
        if ($modelRu->load(Yii::$app->request->post())){
            $modelRu->lang = 'ru';
            $modelRu->id = $id;
           if( $modelRu->save())
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'model' => $modelRu
        ]);
    }
}