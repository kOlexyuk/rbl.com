<?php

namespace app\modules\guid\models;

use Yii;

/**
 * This is the model class for table "region_lang".
 *
 * @property int $id
 * @property string $name
 * @property int $lang
 */
class RegionLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            ['id', 'integer'],
                [['lang'], 'string', 'max' => 2],
                [['name'], 'string', 'max' => 255],
            [['id', 'lang'], 'unique', 'targetAttribute' => ['id', 'lang']],
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
//            'lang' => Yii::t('app', 'Lang'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return RegionLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RegionLangQuery(get_called_class());
    }
}
