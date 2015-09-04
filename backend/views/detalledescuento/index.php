<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\Personal;
use backend\models\Detallexpago;
use backend\models\Controldepago;
use backend\models\Descuento;
use backend\models\Puestoxpersonal;
use kartik\grid\FormulaColumn; 
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\Descuentoxdetalle */
/* @var $dataProvider yii\data\ActiveDataProvider */

//Datos de el empleado
$modelDetail = Detallexpago::find()->where(['iddetalle'=>$_GET['iddetalle']])->one();
$modelCP = Controldepago::find()->where(['idexpediente'=>$modelDetail->idexpediente])->one();
$modelP = Personal::find()->where(['idpersonal'=>$modelDetail->idpersonal])->one();
$modelPuesto = Puestoxpersonal::find()->where(['idpersonal'=>$modelDetail->idpersonal])->one();


$this->title = Yii::t('app', 'Aplicar Descuento');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="descuentoxdetalle-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br/><br/>
    <a href="?r=detallexpagos%2Findex&idgrupo=<?=$modelCP->idgrupo;?>&idexpediente=<?=$modelDetail->idexpediente;?>" class="btn btn-primary"><span class='glyphicon glyphicon-triangle-left'></span> Regresar</a>
    <h2><?= $modelP->nombres;?> <?= $modelP->apellidos;?></h2>
    <div class="alert alert-info" role="alert"><?= $modelCP->concepto;?>
 <h3>Salario Base:Q <?= number_format($modelPuesto->base,2);?> </h3>
    </div>
    <br/><br/>
    <p>
        <?= Html::a(Yii::t('app', 'Aplicar Nuevo Descuento'), ['create','iddetalle'=>$_GET['iddetalle']], ['class' => 'btn btn-success']) ?>
    </p>

   <hr/>

   
 <div class="col-md-6"> 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class'=>'\kartik\grid\SerialColumn',
             'width' =>'130px',],

            //'iddetalle',
            //'iddescuento',

            [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'iddescuento',
          'width' =>'130px',
          'value' => function ($model) {
         $valor = Descuento::find()
                   ->where(['iddescuento' => $model->iddescuento])->one();
          return $valor->nombre;
            },
            ],

            'monto',
            //'codusuario',
            //'fechageneracion',

           // ['class' => 'yii\grid\ActionColumn'],
            [
        'class' => 'kartik\grid\ActionColumn',
        'header'=>'Aciones',
        'template' => '{update} | {delete}',
        'dropdown' => false,
        'vAlign'=>'middle',
        
    ],
        ],
    ]); ?>
 
</div>
</div>
