<?php
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use backend\models\Tipoexpediente;
use backend\models\Tipopago;
use backend\models\EtapaPago;
use backend\models\views\Vexpedientepago;
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
        'class' => '\kartik\grid\DataColumn',
        'width' => '85px',
        'vAlign'=>'middle',
        'attribute' => 'Detalle',
        'format' => 'raw',
        'value' => function ($model) {                      
            return ' <a href="?r=detallexpagos%2Findex&idgrupo='.$model->idgrupo.'&idexpediente='.$model->idexpediente.'">
                <div class="btn btn-default"> <span class="glyphicon glyphicon-folder-open"></span> Abrir</div></a>';
         }, 

    ],

        [
        'class'=>'\kartik\grid\DataColumn',
        'width' => '20px',
        'attribute'=>'idexpediente',

    ],
    [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'idtipoexpediente',
          'width' => '20px',
         'value' => function ($model) {
         $valor = Tipoexpediente::find()
                   ->where(['idtipoexpediente' => $model->idtipoexpediente])->one();
          return $valor->nombre;
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(Tipoexpediente::find()->orderBy('nombre')->asArray()->all(), 'idtipoexpediente', 'nombre'), 
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Seleccione'],
            //'group'=>true,  // enable grouping
    ], 
    [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'idtipopago',
         'value' => function ($model) {
         $valor = Tipopago::find()
                   ->where(['idtipopago' => $model->idtipopago])->one();
          return $valor->nombre;
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(Tipopago::find()->orderBy('nombre')->asArray()->all(), 'idtipopago', 'nombre'), 
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Seleccione'],
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'fechageneracion',
         'value' => function ($model) {
         return Yii::$app->formatter->asDatetime($model->fechageneracion, "php:d/m/Y");

         },
     ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'width' => '300px',
        'attribute'=>'concepto',
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'periodoinicio',
        'value' => function ($model) {
         return Yii::$app->formatter->asDatetime($model->periodoinicio, "php:d/m/Y");
        },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'periodofin',
        'value' => function ($model) {
         return Yii::$app->formatter->asDatetime($model->periodofin, "php:d/m/Y");
        },
        'pageSummary'=>'Totales',
        'pageSummaryOptions'=>['class'=>'text-right text-warning'],
    ],


    [   'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Ingresos',
         'hAlign'=>'right',
        'format'=>['decimal', 2],
         'value' => function ($model) {
            $valor = Vexpedientepago::find()
                   ->where(['idexpediente' => $model->idexpediente])->one();
            if(!$valor->aportes){$valor->aportes=0;}
             return $valor->aportes;
         },
         'pageSummary'=>true,
         //'pageSummaryFunc'=>GridView::F_AVG
    ],

    [   'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Descuentos',
         'hAlign'=>'right',
        'format'=>['decimal', 2],
         'value' => function ($model) {
            $valor = Vexpedientepago::find()
                   ->where(['idexpediente' => $model->idexpediente])->one(); 
             if(!$valor->descuentos){$valor->descuentos=0;}
             return $valor->descuentos;
         },
         'pageSummary'=>true,
         //'pageSummaryFunc'=>GridView::F_AVG
    ],

    [   'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Total',
        'hAlign'=>'right',
        'format'=>['decimal', 2],
         'value' => function ($model) {
             $valor = Vexpedientepago::find()
                   ->where(['idexpediente' => $model->idexpediente])->one(); 
               if(!$valor->total){$valor->total=0;}
             return $valor->total;
         },
         'pageSummary'=>true,
    ],


     [
        'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'idetapa',
         'format' => 'raw',
         'value' => function ($model) {
         $valor = EtapaPago::find()
                   ->where(['idetapa' => $model->idetapa])->one();
             $icon=''; 
             if($model->idetapa==1){$icon='<span class="glyphicon glyphicon-hand-right" ></span> '.$valor->nombre.'';}
             else if($model->idetapa==2){$icon='<span class="glyphicon glyphicon-hand-up" ></span> '.$valor->nombre.'';}
             else if($model->idetapa==3){$icon='<span class="glyphicon glyphicon-thumbs-up" ></span> '.$valor->nombre.'';}
             else if($model->idetapa==4){$icon='<span class="glyphicon glyphicon-thumbs-down" ></span> '.$valor->nombre.'';}
             else {$icon='<span class="glyphicon glyphicon-hand-left" ></span> '.$valor->nombre.'';}

          return $icon;
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(EtapaPago::find()->orderBy('nombre')->asArray()->all(), 'idetapa', 'nombre'), 
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Seleccione'],
     ],
    

    
    [
        'class' => '\kartik\grid\DataColumn',
        'width' => '110px',
        'vAlign'=>'middle',
        'attribute' => 'Acciones',
        'format' => 'raw',
        'value' => function ($model) {                      
            return '<a href="?r=controldepagos%2Fupdate&id='.$model->idexpediente.'"><span class="glyphicon glyphicon-pencil"></span></a>
            </div>';
         },
         /*'format' => 'raw',
       'value'=>function ($model) {
            return Html::a(Html::encode("Ver Listado"),'personalxgrupo/index');
        },*/


    ],

    //[
      //  'class'=>'\kartik\grid\DataColumn',
        //'attribute'=>'idmoneda',
    //],
    
    
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'idetapa',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'idgrupo',
    // ],
    
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'fechaaprovacion',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'fechapago',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'usuario_genera',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'usuario_aprueba',
    // ],

   /* [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'raw','title'=>'Update', 'data-toggle'=>'tooltip'] 
    ,
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],
    */

];   