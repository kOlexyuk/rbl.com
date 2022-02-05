<?php

namespace app\modules\guid\controllers;

use app\modules\guid\models\Region;
use app\modules\guid\models\RegionLang;
use app\modules\guid\models\RegionSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class RegionController extends \yii\web\Controller
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
        $searchModel = new  RegionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]
        );
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
     * Creates a new Region model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Region();

        if ($model->load(Yii::$app->request->post())

            && $model->save()
        )
        {
            return $this->redirect(['index']);
        }

        return $this->render('form', [
            'model' => $model,
            'action' => 'create',
        ]);
    }

    /**
     * Updates an existing Region model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save() ){
           return $this->redirect(['index']);;
        }

        return $this->render('form', [
            'model' => $model,
            'action' => 'update',
        ]);
    }

    /**
     * Finds the Service model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Region the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Region::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findModelLang($id , $lang='ru')
    {
        $model = RegionLang::findOne([
            'id' => $id,
            'lang' => $lang,////Yii::$app->language,
        ]);
        if( $model  !== null) {
            return $model;
        }
        else
        {
            return new RegionLang();
        }

    }

    public function  actionRegionLang($id)
    {
        $modelRu = $this->findModelLang($id);//?? new ServiceAreaLang();
        if ($modelRu->load(Yii::$app->request->post())){
            $modelRu->lang = 'ru';
            $modelRu->id = $id;
            if( $modelRu->save())
                return $this->redirect(['index']);
        }
        return $this->render('form', [
            'model' => $modelRu,
            'action' => 'translate',
        ]);
    }

}
