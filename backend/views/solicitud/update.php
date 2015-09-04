<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Solicitud */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Solicitud',
]) . ' ' . $model->idsolicitud;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Solicituds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsolicitud, 'url' => ['view', 'id' => $model->idsolicitud]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="solicitud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
