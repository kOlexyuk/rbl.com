<?php

namespace app\modules\guid\models;

use Yii;

/**
 * This is the model class for table "service_area_lang".
 *
 * @property int $id
 * @property string $lang
 * @property string $name
 * @property string $note
 * @property int $created_at
 * @property int $updated_at
 *
 * @property ServiceArea $id0
 */
class ServiceAreaLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_area_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'lang', 'name'], 'required'],
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['note'], 'string'],
            [['lang'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 255],
            [['id', 'lang'], 'unique', 'targetAttribute' => ['id', 'lang']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => ServiceArea::className(), 'targetAttribute' => ['id' => 'id']],
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
        return $this->hasOne(ServiceArea::className(), ['id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ServiceAreaLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServiceAreaLangQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     * @return string the active query used by this AR class.
     */
    public  function getName()
    {
        return $this->name;
    }
}
