<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Grupodepago */
?>
<div class="grupodepago-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idgrupo',
            'nombre',
            'estado',
        ],
    ]) ?>

</div>
