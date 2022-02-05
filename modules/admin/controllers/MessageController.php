<?php

namespace app\modules\admin\controllers;

use app\modules\admin\forms\search\UserSearch;
use app\modules\main\models\UserMessages;
use app\modules\main\models\UserMessageSearch;
use Yii;

class MessageController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new UserMessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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

        if ($model->load(Yii::$app->request->post())  )
        {
            $model->checked_at = time();
           if( $model->save()) {
               return $this->redirect(['index']);
//            return $this->redirect(['index']);
           }
        }

        return $this->render('update', [
            'model' => $model
//            , 'modelRu'=> $modelRu
        ]);
    }

    protected function findModel($id)
    {
        $model = UserMessages::findOne(['user_messages.id' => $id ]);
        if( $model  !== null) {
            return $model;
        }
    }

}
