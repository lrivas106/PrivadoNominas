<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Puesto */
?>
<div class="puesto-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpuesto',
            'nombre',
            'descripcion:ntext',
            'estado',
        ],
    ]) ?>

</div>
