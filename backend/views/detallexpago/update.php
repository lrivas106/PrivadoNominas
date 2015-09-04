<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Detallexpago */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Detallexpago',
]) . ' ' . $model->iddetalle;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detallexpagos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddetalle, 'url' => ['view', 'iddetalle' => $model->iddetalle, 'idexpediente' => $model->idexpediente, 'idpersonal' => $model->idpersonal]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="detallexpago-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
