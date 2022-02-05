<?php
namespace app\modules\main\validators;

use app\modules\user\models\User;
use Yii;
use yii\validators\Validator;

class PhoneEmailValidator  extends Validator
{
    public function init()
    {
        parent::init();
        $this->message = Yii::t('app','Email or phone not exists in system');
    }

    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        if(!User::findByEmailOrPhone($value)){
            $model->addError($attribute, $this->message);
        }

    }

//    public function clientValidateAttribute($model, $attribute, $view)
//    {
//        $statuses = json_encode(Status::find()->select('id')->asArray()->column());
//        $message = json_encode($this->message, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
//        return <<<JS
//if ($.inArray(value, $statuses) === -1) {
//    messages.push($message);
//}
//JS;
//    }
}