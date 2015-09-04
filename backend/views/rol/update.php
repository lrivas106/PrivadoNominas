<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\seguridad\Rol */
?>
<div class="rol-update">

    <?= $this->render('_form', [
        'model' => $model,
        'tipoOperaciones' => $tipoOperaciones,
    ]) ?>

</div>
