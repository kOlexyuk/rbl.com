<?php

namespace app\modules\guid\models;

use app\modules\guid\models\Service;
use Yii;

/**
 * This is the model class for table "service_lang".
 *
 * @property int $id
 * @property string $lang
 * @property string $name
 * @property string $note
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Service $id0
 */
class ServiceLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'lang', 'name'], 'required'],
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['lang'], 'string', 'max' => 2],
            [['name', 'note'], 'string', 'max' => 45],
            [['id', 'lang'], 'unique', 'targetAttribute' => ['id', 'lang']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lang' => Yii::t('app', 'Lang'),
            'name' => Yii::t('app', 'Name'),
            'note' => Yii::t('app', 'Note'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Service::className(), ['id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ServiceLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServiceLangQuery(get_called_class());
    }
}
