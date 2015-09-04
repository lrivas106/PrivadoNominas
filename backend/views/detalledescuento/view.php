<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Descuentoxdetalle */

$this->title = $model->iddetalle;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Descuentoxdetalles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="descuentoxdetalle-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'iddetalle' => $model->iddetalle, 'iddescuento' => $model->iddescuento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'iddetalle' => $model->iddetalle, 'iddescuento' => $model->iddescuento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iddetalle',
            'iddescuento',
            'monto',
            'codusuario',
            'fechageneracion',
        ],
    ]) ?>

</div>
