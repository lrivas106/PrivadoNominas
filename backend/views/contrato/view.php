<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Contrato */
?>
<div class="contrato-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idcontrato',
            'nombre',
            'descripcion:ntext',
            'estado',
        ],
    ]) ?>

</div>
