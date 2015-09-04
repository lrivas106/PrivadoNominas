<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Controldepago */

$this->title = Yii::t('app', 'CREAR EXPEDIENTE');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expedientes de control de pagos'), 'url' => ['controldepago/index']];
$this->params['breadcrumbs'][] = 'Crear nuevo expediente';
?>
<div class="controldepago-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
