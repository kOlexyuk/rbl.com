<?php

namespace app\modules\main\models;

/**
 * This is the ActiveQuery class for [[UserMessages]].
 *
 * @see UserMessages
 */
class UserMessagesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserMessages[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserMessages|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
