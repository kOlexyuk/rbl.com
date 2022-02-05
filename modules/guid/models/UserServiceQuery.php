<?php

namespace app\modules\guid\models;

/**
 * This is the ActiveQuery class for [[UserServiceItem]].
 *
 * @see UserService
 */
class UserServiceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserService[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserService|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
