<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UnitType]].
 *
 * @see UnitType
 */
class UnitTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UnitType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UnitType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
