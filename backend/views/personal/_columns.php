<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],

     [
        'class' => '\kartik\grid\DataColumn',
        'width' => '85px',
        'vAlign'=>'middle',
        'attribute' => 'Detalle',
        'format' => 'raw',
        'value' => function ($model) {                      
            return '<div class="btn btn-default"> <a href="?r=puestoxpersonal&idempleado='.$model->idpersonal.'"><span class="glyphicon glyphicon-folder-open"></span> Expediente</a></div>';
         }, 

    ],
        [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'idpersonal', 
         'width' => '80px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nombres',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'apellidos',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'dpi',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'fechanac', 
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'nit',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'telefono',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'celular',
    // ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'email',
     ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'direccion',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'Visualizar','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Actualizar', 'data-toggle'=>'tooltip'],
        
        
    ],

];   