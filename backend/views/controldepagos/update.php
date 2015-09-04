<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Controldepago */

$this->title = Yii::t('app', 'ACTUALIZAR EXPEDIENTE: ', [
    'modelClass' => 'Controldepago',
]) . ' ' . $model->idexpediente;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expedientes de control de pagos'), 'url' => ['controldepago/index']];
$this->params['breadcrumbs'][] = ['label' => $model->idexpediente, 'url' => ['view', 'id' => $model->idexpediente]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="controldepago-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
