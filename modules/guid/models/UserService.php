<?php

namespace app\modules\guid\models;

use app\modules\guid\models\Service;
use app\modules\user\models\User;
//use app\modules\guid\models\UserServiceQuery;
use Yii;

/**
 * This is the model class for table "user_service_item".
 *
 * @property int $id
 * @property int $user_id
 * @property int $service_id
 *
 * @property User $user
 * @property Service $service
 */
class UserService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'service_id'], 'integer'],
            [['user_id', 'service_id'], 'unique', 'targetAttribute' => ['user_id', 'service_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
//            [['service_area_id'], 'exist', 'skipOnError' => true, 'targetClass' => ServiceArea::className(), 'targetAttribute' => ['service_area_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'service_id' => Yii::t('app', 'Service ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }

    /**
     * {@inheritdoc}
     * @return UserServiceAreaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserServiceAreaQuery(get_called_class());
    }
}
