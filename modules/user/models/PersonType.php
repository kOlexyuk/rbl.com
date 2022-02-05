<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_type".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $note
 *
 * @property PersonTypeLang[] $personTypeLangs
 */
class PersonType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['note'], 'string'],
            [['name'], 'string', 'max' => 45],
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
        ];
    }

    /**
     * Gets query for [[PersonTypeLangs]].
     *
     * @return \yii\db\ActiveQuery|PersonTypeLangQuery
     */
    public function getPersonTypeLangs()
    {
        return $this->hasMany(PersonTypeLang::className(), ['id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PersonTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PersonTypeQuery(get_called_class());
    }
}
