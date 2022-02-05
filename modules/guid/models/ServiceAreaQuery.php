<?php

namespace app\modules\guid\models;

/**
 * This is the ActiveQuery class for [[ServiceArea]].
 *
 * @see ServiceArea
 */
class ServiceAreaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ServiceArea[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ServiceArea|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
