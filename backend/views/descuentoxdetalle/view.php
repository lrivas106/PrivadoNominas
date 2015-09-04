<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Descuentoxdetalle */
?>
<div class="descuentoxdetalle-view">
 
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
