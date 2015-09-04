<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\seguridad\Rol */
?>
<div class="rol-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idrol',
            'nombre',
        ],
    ]) ?>

<h2>Operaciones Permitidas</h2>
<?php
 
foreach ($model->operacionesPermitidasList as $operacionPermitida) {
    echo $operacionPermitida['nombre'] . "
";
}
 
?>

</div>
