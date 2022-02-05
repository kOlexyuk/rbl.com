<?php

namespace app\modules\guid\models;

/**
 * This is the ActiveQuery class for [[ServiceAreaLang]].
 *
 * @see ServiceAreaLang
 */
class ServiceAreaLangQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ServiceAreaLang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ServiceAreaLang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
