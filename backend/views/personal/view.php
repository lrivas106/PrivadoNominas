<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Personal */
?>
<div class="personal-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpersonal',
            'nombres',
            'apellidos',
            'dpi',
            'fechanac',
            'nit',
            'telefono',
            'celular',
            'email:email',
            'direccion',
        ],
    ]) ?>

</div>
