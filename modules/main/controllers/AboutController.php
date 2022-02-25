<?php

namespace app\modules\main\controllers;

use app\modules\main\forms\ContactForm;
use yii\web\Controller;
use Yii;

class AboutController extends Controller
{
    public function actions()
    {

    }

    public function actionIndex()
    {
        return $this->render('index', []);
    }

    public function actionSend()
    {

    }
}
