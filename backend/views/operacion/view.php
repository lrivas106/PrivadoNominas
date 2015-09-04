<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\seguridad\Operacion */
?>
<div class="operacion-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idoperacion',
            'nombre',
        ],
    ]) ?>

</div>
