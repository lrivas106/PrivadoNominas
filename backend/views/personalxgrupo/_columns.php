<?php
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use backend\models\Personal;
use backend\models\Grupodepago;

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
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'idpersonal',
        'value' => function ($model) {
           $valor = Personal::find()
                   ->where(['idpersonal' => $model->idpersonal])->one();
          return $valor->nombres.' '.$valor->apellidos;
            },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'idgrupo',
        'value' => function ($model) {
           $valor = Grupodepago::find()
                   ->where(['idgrupo' => $model->idgrupo])->one();
          return $valor->nombre;
            },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'estado',
        'value' => function ($model) {
            if($model->estado==0){$value="Inactivo";} else {$value="Activo";}
               return $value;
            },
    ],
     

    [
        'class' => 'kartik\grid\ActionColumn',
        'header'=>'Aciones',
        //'template' => '{update}',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'idpersonal, idgrupo'=>$key]);
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