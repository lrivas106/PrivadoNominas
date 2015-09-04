<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Departamento */
?>
<div class="departamento-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iddepartamento',
            'nombre',
            'estado',
        ],
    ]) ?>

</div>
