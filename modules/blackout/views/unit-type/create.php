<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UnitType */

$this->title = Yii::t('app', 'Create Unit Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unit Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
