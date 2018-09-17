<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrganizationUnit */
/* @var $form yii\widgets\ActiveForm */
/* @var $unitTypes array */
?>

<div class="organization-unit-form">
    <?php $form = ActiveForm::begin([
            'id' => 'unit-form',
            'enableClientValidation' => true
    ]); ?>
    <div class="x_panel">
        <div class="x_title">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'unit_code')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'unit_type_id')->dropDownList($unitTypes, [
                            'prompt' => 'Select unit type...']
                    ) ?>

                    <?= $form->field($model, 'report_to')->textInput() ?>

                    <?= $form->field($model, 'status')->dropDownList(['1' => 'Yes', '0' => 'No']) ?>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
