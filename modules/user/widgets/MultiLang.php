<?php


namespace app\modules\user\widgets;

use Yii\bootstrap\Widget;
class MultiLang extends Widget
{
    public $cssClass;
    public function init(){}

    public function run() {
        return $this->render('MultiLang', [
            'cssClass' => $this->cssClass,
        ]);

    }
}