<?php
/* @var $puser array */
/* @var $lang1 string */
/* @var $pdf int */

use app\modules\guid\models\Util;
use app\modules\user\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$image = $puser['photo']??Yii::$app->params['user.empty_photo'];




$content = '<tr><td>';

        $content .=   '<img class="avatar avatar-md  d-block brround cover-image" src="'.$image.'" style="background: url(&quot;/rejoin/assets/images/users/male/9.jpg&quot;) center center;" width="80px" height="80px">';
        $content .= '</td>
    <td>
        <div class="media mt-0 mb-0">
            <div class="">
                <div class="card-item-desc p-0">
                    <a href="#" class="text-dark"><h4 class="font-weight-semibold">' . $puser['name'] . " " . $puser['surname'] . '</h4></a>
                    <a href="#"><i class="fa fa-clock-o w-4"></i>' . Yii::$app->formatter->asDateTime($puser['created_at']) . '</a><br>
                    <a href="#"><i class="fa fa-tag w-4"></i>' . $puser['services'] . '</a>
                </div>
            </div>
        </div>
    </td>
    <td><i class ="fa fa-map-marker mr-1 text-muted"></i>' . $puser['regions'] . '</td>
</tr>';


echo $content;
