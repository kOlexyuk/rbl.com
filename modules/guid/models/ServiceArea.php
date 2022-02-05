<?php

namespace app\modules\guid\models;


use app\modules\user\models\User;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "service_area".
 *
 * @property int $id
 * @property string $name
 * @property string $note
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Service[] $services
 * @property ServiceAreaLang[] $serviceAreaLangs
 * @property UserServiceArea[] $userServicesArea
 * @property User[] $users
 */
class ServiceArea extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_area';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['note'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 75],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'note' => Yii::t('app', 'Note'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Service::className(), ['service_area_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceAreaLangs()
    {
        return $this->hasMany(ServiceAreaLang::className(), ['id' => 'id']);
    }

    /**
     * @return array|\yii\db\ActiveQuery|\yii\db\ActiveRecord
     */
    public function getServiceAreaRu()
    {
        $query = $this->hasOne(ServiceAreaLang::className(), ['id' => 'id']);
        $m = $query->one();
        if($m)
            return $m->getName();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserServiceAreas()
    {
        return $this->hasMany(UserServiceArea::className(), ['service_area_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_service_area', ['service_area_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ServiceAreaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServiceAreaQuery(get_called_class());
    }

    public static function getServiceAreaList()
    {
        return ArrayHelper::map(ServiceArea::find()->select('id, name')->all(), 'id', 'name');
    }


    public function getName()
    {
        return $this->name;
    }

    /* Геттер для названия service */
    public function getServiceAreaName() {
        return $this->serviceArea->name;
    }
}
