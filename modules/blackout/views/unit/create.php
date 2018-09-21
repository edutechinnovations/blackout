<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrganizationUnit */
/* @var $unitTypes array */

$this->title = Yii::t('app', 'Create Organization Unit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organization Units'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-unit-create">

    <?= $this->render('_form', [
        'model' => $model,
        'unitTypes' => $unitTypes,
        'units' => $units
    ]) ?>

</div>
