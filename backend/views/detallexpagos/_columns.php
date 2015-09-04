<?php
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use backend\models\Personal;

use kartik\grid\FormulaColumn;
use kartik\grid\GridView;
use backend\models\views\Vtotalxdetalle;
use backend\models\views\Vexpedientepago;
use yii\helpers\Html;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
      /*  [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'iddetalle',
    ],*/
    //[
     //   'class'=>'\kartik\grid\DataColumn',
      //  'attribute'=>'idexpediente',
    //],
    //[
     //   'class'=>'\kartik\grid\DataColumn',
      //  'attribute'=>'idpersonal',
    //],

/*[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'idpersonal',
        'width' => '130px',
    ],*/

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'idpersonal',
        'label'=>'Nombre',
        'value' => function ($model) {
           $valor = Personal::find()
                   ->where(['idpersonal' => $model->idpersonal])->one();
          return $valor->nombres.' '.$valor->apellidos;
            },
    ],

     
    [
        'class' => '\kartik\grid\DataColumn',
        'width' => '110px',
        'vAlign'=>'middle',
        'attribute' => 'Ingresos',
        'format' => 'raw',
        'value' => function ($model) {         
           $detalle = Vtotalxdetalle::find()->where("idexpediente=".$model->idexpediente." and idpersonal=".$model->idpersonal)->one();
           if(!isset($detalle->aportes)){$vaportes=0;}
             else {$vaportes=$detalle->aportes;}        
            return '<div> <a href="index.php?r=detalleaporte&iddetalle='.$model->iddetalle.'&idpersonal='.$model->idpersonal.'&idexpediente='.$model->idexpediente.'" title="Editar Lista de Aportes"> <span class="glyphicon glyphicon-th-list"> Editar</a> </span> 
             <span class="pull-right"></span></div>';
         }, 
          
         //'pageSummaryFunc'=>GridV
    ],

      [
        'class' => '\kartik\grid\DataColumn',
        'width' => '110px',
        'vAlign'=>'middle',
        'attribute' => 'Ingresos',
        'format' => 'raw',
        'value' => function ($model) {         
           $detalle = Vtotalxdetalle::find()->where("idexpediente=".$model->idexpediente." and idpersonal=".$model->idpersonal)->one();
           if(!isset($detalle->aportes)){$vaportes=0;}
             else {$vaportes=$detalle->aportes;}        
            return "<span class='pull-right'>".(number_format($vaportes,2))."</span>";
         }, 
           'pageSummary'=>true,
         //'pageSummaryFunc'=>GridV
    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'width' => '120px',
        'vAlign'=>'middle',
        'attribute' => 'Descuentos',
        'format' => 'raw',
        'value' => function ($model) {                      

           $detalle = Vtotalxdetalle::find()->where("idexpediente=".$model->idexpediente." and idpersonal=".$model->idpersonal)->one();
           if(!isset($detalle->descuentos)){$vdescuentos=0;}
             else {$vdescuentos=$detalle->descuentos;}
            return '<div> <a href="index.php?r=detalledescuento&iddetalle='.$model->iddetalle.'&idpersonal='.$model->idpersonal.'&idexpediente='.$model->idexpediente.'" title="Editar Lista de Descuentos"> <span class="glyphicon glyphicon-th-list"> Editar</a> </span> 
                  <span class="pull-right">  </span></div>';
         }, 
         
    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'width' => '120px',
        'vAlign'=>'middle',
        'attribute' => 'Descuentos',
        'format' => 'raw',
        'value' => function ($model) {                      

           $detalle = Vtotalxdetalle::find()->where("idexpediente=".$model->idexpediente." and idpersonal=".$model->idpersonal)->one();
           if(!isset($detalle->descuentos)){$vdescuentos=0;}
             else {$vdescuentos=$detalle->descuentos;}
            return  "<span class='pull-right'>".(number_format($vdescuentos,2))."</span>";
         }, 
         'pageSummary'=>true,
    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'width' => '120px',
        'vAlign'=>'middle',
        'attribute' => 'Total',
        'format' => 'raw',
        'value' => function ($model) {                      
           $detalle = Vtotalxdetalle::find()->where("idexpediente=".$model->idexpediente." and idpersonal=".$model->idpersonal)->one();
           if(!isset($detalle->total)){$vtotal=0;}
             else {$vtotal=$detalle->total;}
            return  "<span class='pull-right'>".(number_format($vtotal,2))."</span>";
         }, 
         'pageSummary'=>true,
    ],





    //[
    //    'class'=>'\kartik\grid\DataColumn',
    //    'attribute'=>'codusuario',
    //],
    //[
     //   'class'=>'\kartik\grid\DataColumn',
      //  'attribute'=>'fechageneracion',
    //],
    /*[
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'iddetalle, $idexpediente, $idpersonal'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],*/

];   