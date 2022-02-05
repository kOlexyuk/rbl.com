<?php

namespace app\modules\guid\models;

/**
 * This is the ActiveQuery class for [[RegionLang]].
 *
 * @see RegionLang
 */
class RegionLangQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RegionLang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RegionLang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
