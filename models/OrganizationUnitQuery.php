<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[OrganizationUnit]].
 *
 * @see OrganizationUnit
 */
class OrganizationUnitQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return OrganizationUnit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return OrganizationUnit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
