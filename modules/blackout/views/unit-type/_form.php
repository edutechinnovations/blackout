<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UnitType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unit-type-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="x_panel">
        <div class="x_title">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="x_content">
            <div class="col-sm-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'status')->textInput() ?>
            </div>

        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
