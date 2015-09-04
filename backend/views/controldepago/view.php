<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Controldepago */
?>
<div class="controldepago-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idexpediente',
            'idtipoexpediente',
            'idmoneda',
            'periodoinicio',
            'periodofin',
            'concepto',
            'idformapago',
            'idtipopago',
            'idetapa',
            'idgrupo',
            'fechageneracion',
            'fechaaprovacion',
            'fechapago',
            'usuario_genera',
            'usuario_aprueba',
        ],
    ]) ?>

</div>
