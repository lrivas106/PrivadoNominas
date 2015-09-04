<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\Personal;
use backend\models\Grupodepago;
use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PersonalxgrupoListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Personalxgrupos');
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="personalxgrupo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Personalxgrupo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
        'class' => '\kartik\grid\DataColumn',
        'width' => '110px',
        'attribute' => 'Listado',
        'format' => 'raw',
        'value' => function ($model) {                      
            return '<div> <a href="?r=detallexpago%2Fcreatedetalle&idexpediente='.$_GET['idexpediente'].'&idpersonal='.$model->idpersonal.'&idgrupo='.$_GET['idgrupo'].'"><span class="glyphicon glyphicon-plus"></span> Agregar</a></div>';
         },
         /*'format' => 'raw',
       'value'=>function ($model) {
            return Html::a(Html::encode("Ver Listado"),'personalxgrupo/index');
        },*/


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
         //   'idpersonal',
            //'idgrupo',
            //'estado',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
