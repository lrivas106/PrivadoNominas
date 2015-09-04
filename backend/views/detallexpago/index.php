<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Personal;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\DetallexpagoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Detallexpagos'); 
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallexpago-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!--?//=Html::a(Yii::t('app', 'Asignar Empleado'), ['personalxgrupo-list/index/idexpediente=1'], ['class' => 'btn btn-success']) ?-->
        <a href='index.php?r=personalxgrupo-list&idexpediente=<?=$_GET['idexpediente'];?>'  class="btn btn-primary">Asignar empleado</a>
    </p>

     <p>
        <?= Html::a(Yii::t('app', 'Regresar'), ['controldepago/index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'iddetalle',
            //'idexpediente',
            //'idpersonal',
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
        'class' => '\kartik\grid\DataColumn',
        'width' => '110px',
        'vAlign'=>'middle',
        'attribute' => 'Ingresos',
        'format' => 'raw',
        'value' => function ($model) {                      
            return '<div> <a href="" title="Editar Lista de Aportes"> <span class="glyphicon glyphicon-th-list"> </a> </span> 
            Q</div>';
         }, 
    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'width' => '110px',
        'vAlign'=>'middle',
        'attribute' => 'Deducciones',
        'format' => 'raw',
        'value' => function ($model) {                      
            return '<div> <a href="" title="Editar Lista de Deducciones"> <span class="glyphicon glyphicon-th-list"> </a> </span> 
             Q</div>';
         }, 
    ],
   
            //'codusuario',
            //'fechageneracion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
