<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Aporte */
?>
<div class="aporte-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idaporte',
            'nombre',
            'descripcion:ntext',
            'idvalor',
            'cantidad',
            'estado',
        ],
    ]) ?>

</div>
