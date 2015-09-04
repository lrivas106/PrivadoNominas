<?php

use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use backend\models\Valordecalculo;

/* @var $this yii\web\View */
/* @var $model backend\models\Descuento */
?>
<div class="descuento-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        ['label' => 'ID', 'value' => $model->iddescuento],
        ['label' => 'Nombre', 'value' => $model->nombre],
        ['label' => 'Descripción', 'value' => $model->descripcion],
        ['label' => 'Valor', 'value' => $model->idvalor ],
        ['label' => 'Cantidad', 'value' => $model->cantidad],
        ['label' => 'Estado', 'value' => $model->estado == 1 ? 'Activo' : 'Inavtivo'],

        ],
    ]) ?>

</div>
