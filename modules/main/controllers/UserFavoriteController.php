<?php

namespace app\modules\main\controllers;

use app\modules\main\models\UserFavorite;
use app\modules\user\forms\frontend\ProfileSearch;
use app\modules\user\models\User;
use Yii;
use yii\helpers\Html;
use yii\helpers\Json;

class UserFavoriteController extends \yii\web\Controller
{
    public function actionIndex()
    {
        // http://wch.com/ru/main/user-favorite/

       $model =  ProfileSearch::getFavoriteProfileList();
//
//        $user = User::findOne(Yii::$app->user->id);
//        $fav =   $user->getFavorites()->all();
        return $this->render('index_rejoin0',['model'=>$model]);
    }

    public function actionUpdate($id)
    {

        if (Yii::$app->request->isAjax )
        {
            $user = User::findOne(Yii::$app->user->id);
            $fav =  $user->getFavorites()->where(['favorite_user_id' => $id])->one();
            $res = [];
            if($fav){
                $fav->delete();
                return Yii::t('app', "Add to favorite");
            }else{
                $fav = new UserFavorite();
                $fav->user_id = Yii::$app->user->id;
                $fav->favorite_user_id = $id;
                $fav->save();
                return Yii::t('app', "Remove from favorite");
            }


//        return   var_export($fav);
            //  http://wch.com/ru/main/user-favorite/43/update
//        return 'UserFavoriteControlleUpdate   '.$id;
//            return $this->render('index');
        }

    }

    public function actionSet()
    {
        $id = Yii::$app->request->post()['hiddenFavorite'];

        if (Yii::$app->request->isAjax )
        {
            $user = User::findOne(Yii::$app->user->id);
            $fav =  $user->getFavorites()->where(['favorite_user_id' => $id])->one();
            $res = [];
            if($fav){
                $fav->delete();
                $res['txt']= Yii::t('app', "Add to favorite");
                $res['btn'] = 'btn-primary';

            }else{
                $fav = new UserFavorite();
                $fav->user_id = Yii::$app->user->id;
                $fav->favorite_user_id = $id;
                $fav->save();
                $res['txt']= Yii::t('app', "Remove from favorite");
                $res['btn'] = 'btn-success';
            }
            return Json::encode($res);
//        return   var_export($fav);
            //  http://wch.com/ru/main/user-favorite/43/update
//        return 'UserFavoriteControlleUpdate   '.$id;
//            return $this->render('index');
        }

    }

}
