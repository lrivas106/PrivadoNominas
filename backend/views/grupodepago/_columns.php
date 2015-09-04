<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use backend\models\Tipopago;
use backend\models\Tipolistado;

use kartik\grid\FormulaColumn;
use kartik\grid\GridView;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',

    ],
    
    /*[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'idgrupo',
        'width' => '50px',
    ],*/

   
    [
        'class' => '\kartik\grid\DataColumn',
        'width' => '110px',
        'attribute' => 'Listado',
        'format' => 'raw',
        'value' => function ($model) {                      
            return '<div> <a href="?r=personalxgrupo&idgrupo='.$model->idgrupo.'"><span class="glyphicon glyphicon-list"></span> Ver Listado</a></div>';
         },
         /*'format' => 'raw',
       'value'=>function ($model) {
            return Html::a(Html::encode("Ver Listado"),'personalxgrupo/index');
        },*/


    ],

     [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nombre',
    ],
   
    [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'estado',
          'width' =>'130px',
         'value' => function ($model) {
            if($model->estado==0){$value="Inactivo";} else {$value="Activo";}
               return $value;
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>array('1'=>'Activo','0'=>'Inactivo'), 
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Seleccione'],

     ],

    [
        'class' => 'kartik\grid\ActionColumn',
        'header'=>'Aciones',
        'template' => '{update}',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   