<?php
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use backend\models\Valordecalculo;
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
        [
        'class'=>'\kartik\grid\DataColumn',
        'width' => '50px',
        'attribute'=>'iddescuento',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nombre',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'descripcion',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'idvalor',
         'width' =>'100px',
         'value' => function ($model) {
         $valor = Valordecalculo::find()
                   ->where(['idvalor' => $model->idvalor])->one();
          return $valor->simbolo;
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(Valordecalculo::find()->orderBy('simbolo')->asArray()->all(), 'idvalor', 'simbolo'), 
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Seleccione'],
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'cantidad',
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