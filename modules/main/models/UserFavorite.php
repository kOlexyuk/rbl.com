<?php

namespace app\modules\main\models;

use app\modules\user\models\User;
use Yii;

/**
 * This is the model class for table "user_favorit".
 *
 * @property int $user_id
 * @property int $favorite_user_id
 *
 * @property User $user
 * @property User $favoriteUser
 */
class UserFavorite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_favorite';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'favorite_user_id'], 'required'],
            [['user_id', 'favorite_user_id'], 'integer'],
            [['user_id', 'favorite_user_id'], 'unique', 'targetAttribute' => ['user_id', 'favorite_user_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['favorite_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['favorite_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'favorite_user_id' => Yii::t('app', 'Favorite User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavoriteUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'favorite_user_id']);
    }

    /**
     * {@inheritdoc}
     * @return UserFavoriteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserFavoriteQuery(get_called_class());
    }


}
