<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\models\Personal;
use backend\models\Puesto;
use backend\models\Contrato;
use backend\models\Departamento;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PuestoxpersonalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Expediente Laboral');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puestoxpersonal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Agregar Nuevo Puesto'), ['create','idempleado'=>$_GET['idempleado']], ['class' => 'btn btn-success']) ?>
        <span>    |     </span>
        
        <?= Html::a(Yii::t('app', 'IMPRIMIR HISTORIAL'), ['create','idempleado'=>$_GET['idempleado']], ['class' => 'btn btn-success']) ?>
    </p>
    <br/> <br/> <br/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'iddetalle',

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
        'attribute'=>'idpuesto',
        'value' => function ($model) {
           $valor = Puesto::find()
                   ->where(['idpuesto' => $model->idpuesto])->one();
          return $valor->nombre;
            },
    ],

            [
        'class' => '\kartik\grid\DataColumn',
        'width' => '110px',
        'vAlign'=>'middle',
        'attribute' => 'base',
        'format' => 'raw',
        'value' => function ($model) {                      
            return '<div> '.number_format($model->base,2).' </span> 
            Q</div>';
         }, 
    ],

            [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'idcontrato',
        'value' => function ($model) {
           $valor = Contrato::find()
                   ->where(['idcontrato' => $model->idcontrato])->one();
          return $valor->nombre;
            },
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'iddepartamento',
        'value' => function ($model) {
           $valor = Departamento::find()
                   ->where(['iddepartamento' => $model->iddepartamento])->one();
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

     'fechainicio',
    'fechafin',
            // 'iddepartamento',
            // 'estado',
            // 'codusuario',
            // 'fechageneracion',

         //   ['class' => 'yii\grid\ActionColumn',
            //'template' => '{update}',
            // 'header'=>'Acciones',],

                   [
        'class' => '\kartik\grid\DataColumn',
        'width' => '110px',
        'vAlign'=>'middle',
        'attribute' => 'Acciones',
        'format' => 'raw',
        'value' => function ($model) {                      
            return '<a href="?r=puestoxpersonal%2Fupdate&id='.$model->iddetalle.'&idempleado='.$model->idpersonal.'"><span class="glyphicon glyphicon-pencil"></span></a>
            </div>';
         },
          ],


        ],
    ]); ?>

</div>
