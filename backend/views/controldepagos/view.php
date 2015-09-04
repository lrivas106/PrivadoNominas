<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Controldepago */

$this->title = 'Expediente de pago: '.$model->idexpediente;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expedientes de control de pagos'), 'url' => ['controldepago/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="controldepago-view">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idexpediente',
            'idtipoexpediente',
            'idmoneda',
            'periodoinicio',
            'periodofin',
            'concepto',
            'idetapa',
            'idgrupo',
            'fechageneracion',
            'fechaaprovacion',
            'fechapago',
            'usuario_genera',
            'usuario_aprueba',
            'idtipopago',
            'idformapago',
        ],
    ]) ?>


 


    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->idexpediente], ['class' => 'btn btn-primary']) ?>
        <!--<?php /*= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idexpediente], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) */ ?>-->
    </p>


</div>
