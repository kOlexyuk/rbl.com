<?php

namespace app\modules\guid\models;

use app\modules\user\models\User;
use Yii;

/**
 * This is the model class for table "user_region".
 *
 * @property int $user_id
 * @property int $region_id
 * @property int $radius
 * @property User $user
 * @property Region $region

 */
class UserRegion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'region_id','radius'], 'required'],
            [['user_id', 'region_id','radius'], 'integer'],
            [['user_id', 'region_id'], 'unique', 'targetAttribute' => ['user_id', 'region_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'region_id' => Yii::t('app', 'Region ID'),
            'radius' => Yii::t('app', 'Radius'),
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
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * {@inheritdoc}
     * @return UserRegionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserRegionQuery(get_called_class());
    }
}
