<?php

namespace app\modules\guid\models;

/**
 * This is the ActiveQuery class for [[UserRegion]].
 *
 * @see UserRegion
 */
class UserRegionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserRegion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserRegion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
