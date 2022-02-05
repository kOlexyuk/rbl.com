<?php

namespace app\modules\guid\models;

/**
 * This is the ActiveQuery class for [[ServiceLang]].
 *
 * @see ServiceLang
 */
class ServiceLangQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ServiceLang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ServiceLang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
