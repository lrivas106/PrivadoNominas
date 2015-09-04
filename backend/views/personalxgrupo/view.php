<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Personalxgrupo */
?>
<div class="personalxgrupo-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpersonal',
            'idgrupo',
            'estado',
        ],
    ]) ?>

</div>
