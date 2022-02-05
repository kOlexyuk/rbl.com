<?php

namespace app\modules\main\controllers;

use app\modules\guid\models\Util;
use app\modules\main\models\StartForm;
use app\modules\main\models\UserMessages;
use app\modules\main\Module;
use app\modules\user\forms\frontend\ProfileSearch;
use app\modules\user\models\UserProfile;
use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $model= new StartForm();
        return $this->render('index',['model'=>$model]);
    }

    public function actionProfileList()
    {
        if (Yii::$app->request->isAjax ) {
            $service_id = Yii::$app->request->post()['service_id'];
            $service_area_id = Yii::$app->request->post()['service_area_id'];
            $region_id = Yii::$app->request->post()['region_id'];
            $profileList = ProfileSearch::getProfileList(null,$region_id,$service_id,$service_area_id);

//           return Util::getProfileListView( $profileList);

            $lang = substr(Yii::$app->language,0,2);//   $_SESSION['_language'];
            $content = sprintf("<input type='hidden' id='cnt_profList' value='%s'>", count($profileList));
            foreach ($profileList as $puser){

                $content .= ($this->renderPartial('@app/modules/user/views/frontend/profile/user_card_rejoin.php', ['puser'=>$puser, 'lang1'=>$lang, 'pdf'=>0]));
            }
           return  ($content);
//                    $listp = [];
//                    $listp['contentt'] = mb_convert_encoding($content, 'UTF-8', 'UTF-8');;
//                    $listp['cnt'] = count($profileList);
//                    $res = JSON::encode($listp);
//                     return $res;
        }
        else {
            throw new NotFoundHttpException('The requested Is not AJAX  actionProfileList');
        }

    }

    public function actionProfile($id)
    {
//        $user = $this->findModel($id);
////        ProfileController::updateProfile($user, $this);
//        $model = new ProfileUpdateForm($user);

        $model = ProfileSearch::getProfile($id);
        if($model== null)
        {
            $profile = new UserProfile();
            $profile ->id =  $id;
            $profile->save();
            $model = ProfileSearch::getProfile($id);
        }

        $profile = UserProfile::findOne($id);
        if($profile)
        $profile->eventView();
        else
            return "profile not found!";

      //  show all approved reviews
        $my_message =  UserMessages::getApprovedReview($id);

        $message = new UserMessages();

        return $this->render('view_profile_rejoin', [
            'model' => $model,
            'message' => $message,
            'my_message'=>$my_message
        ]);
    }

    public function actionPdf1()
    {
        // http://wch.com/ru/main/user-favorite/

        $model =  ProfileSearch::getFavoriteProfileList();
//
//        $user = User::findOne(Yii::$app->user->id);
//        $fav =   $user->getFavorites()->all();


//          $content = $this->renderPartial('@app/modules/main/views/user-favorite/index.php',['model'=>$model]);

        $lang = $_SESSION['_language'];
        $content = "";
//        foreach ($model as $puser){
//            $content .= $this->renderPartial('@app/modules/user/views/frontend/profile/user_card.php', ['puser'=>$puser, 'lang1'=>$lang, 'pdf'=>0]);
//        }

        $content .=  $this->renderPartial('@app/modules/main/views/user-favorite/container.php',['model'=>$model]);
        $content  = "Test PDF";

        $content= mb_convert_encoding($content, 'UTF-8', 'UTF-8');
        $pdf = Yii::$app->pdf;
        $pdf->content = $content;
        return $pdf->render();
    }

    public function actionPdf()
    {
        // http://wch.com/ru/main/user-favorite/

        $model =  ProfileSearch::getFavoriteProfileList();
//
//        $user = User::findOne(Yii::$app->user->id);
//        $fav =   $user->getFavorites()->all();


//          $content = $this->renderPartial('@app/modules/main/views/user-favorite/index.php',['model'=>$model]);

        $lang = $_SESSION['_language'];
        $content = '    <table class="table table-bordered table-hover mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th class=""></th>
                                    <th>Location</th>
                                </tr>
                                </thead>
                                <tbody>';

//        Yii::$app->html2pdf
//            ->render('@app/modules/main/views/user-favorite/index_rejoin0', ['model'=>$model])
//            ->saveAs('@app/pdf/output/output.pdf')
//        ;

        foreach ($model as $puser){
            $content .= $this->renderPartial('@app/modules/user/views/frontend/profile/user_card_rejoin_pdf.php', ['puser'=>$puser, 'lang1'=>$lang, 'pdf'=>1]);
        }

        $content .=  '</tbody>
                            </table>';

      //  $content .=  $this->renderPartial('@app/modules/main/views/user-favorite/container.php',['model'=>$model]);
//        $content  = "Test PDF";
//
        $content= mb_convert_encoding($content, 'UTF-8', 'UTF-8');
        $pdf = Yii::$app->pdf;
        $pdf->content = $content;
        return $pdf->render();
    }
//    public function actionProfileListServiceArea($id)
//    {
//        $model= new StartForm();
//        return $this->render('index',['model'=>$model]);
//    }
//
//    public function actionProfileListServiceRegion($id)
//    {
//        $model= new StartForm();
//        return $this->render('index',['model'=>$model]);
//    }
}
