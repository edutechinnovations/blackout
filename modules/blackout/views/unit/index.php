<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OrganizationUnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Organization Units');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-unit-index">
    <div class="x_panel">
        <div class="x_title">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="x_content">
            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a(Yii::t('app', 'Create Organization Unit'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'name',
                    'short_name',
                    'unit_code',
                    'parentName',
                    [
                        'attribute' => 'status',
                        'label' => 'Active',
                        'format' => 'boolean'
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
