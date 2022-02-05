<?php

namespace app\modules\guid\models;



use modules\guid\models\UserServiceArea;

/**
 * This is the ActiveQuery class for [[UserService]].
 *
 * @see UserServiceArea
 */
class UserServiceAreaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserServiceArea[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserServiceArea|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
