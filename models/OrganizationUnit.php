<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organization_unit".
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property string $unit_code
 * @property int $report_to
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class OrganizationUnit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organization_unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'short_name', 'unit_code', 'report_to', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['report_to', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['short_name'], 'string', 'max' => 20],
            [['unit_code'], 'string', 'max' => 10],
            [['unit_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'short_name' => Yii::t('app', 'Short Name'),
            'unit_code' => Yii::t('app', 'Unit Code'),
            'report_to' => Yii::t('app', 'Report To'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return OrganizationUnitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrganizationUnitQuery(get_called_class());
    }
}
