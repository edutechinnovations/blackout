<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "organization_unit".
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property string $unit_code
 * @property int $unit_type_id
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

    public function behaviors()
    {
        return [
            BlameableBehavior::className(),
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'short_name', 'unit_code'], 'required'],
            [['report_to', 'status', 'unit_type_id'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['short_name'], 'string', 'max' => 20],
            [['unit_code'], 'string', 'max' => 10],
            [['unit_code', 'name'], 'unique'],
            [['report_to'], 'required', 'when' => function($model) {
                return ($model->unit_type_id != '1');
            }, 'whenClient' => "function (attribute, value) {
                    return $('#organizationunit-unit_type_id').val() != '1';
            }"],
            [['short_code'], 'required', 'when' => function($model) {
                return ($model->unit_type_id == '1');
            }, 'whenClient' => "function (attribute, value) {
                    return $('#organizationunit-unit_type_id').val() == '1';
            }"]
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
            'unit_type_id' => Yii::t('app', 'Unit Type'),
            'report_to' => Yii::t('app', 'Report To'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * get Unit Type of this unit
     * @return \yii\db\ActiveQuery
     */
    public function getUnitType()
    {
        return $this->hasOne(UnitType::className(), ['id' => 'unit_type_id']);
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
