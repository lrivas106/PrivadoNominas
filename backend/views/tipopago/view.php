<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tipopago */
?>
<div class="tipopago-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           ['label' => 'ID', 'value'=> $model->idtipopago],
           ['label' => 'Nombre', 'value' => $model->nombre],
           ['label' => 'Estado', 'value' => $model->estado == 1 ? 'Activo' : 'Inavtivo'],
        ],
    ]) ?>

</div>
