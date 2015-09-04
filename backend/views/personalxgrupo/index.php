<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\helpers\ArrayHelper;
use backend\models\Grupodepago;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PersonalxgrupoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/*Consultas para identificación de información*/
 $valorGrupo = Grupodepago::find()
                  ->where(['idgrupo' => $_GET['idgrupo']])->one();
          

$this->title = Yii::t('app', 'Persona por Grupos');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);



?>



<div class="personalxgrupo-index">
    <div id="ajaxCrudDatatable">


        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Agregar Persona','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Lista de empleados '.$valorGrupo->nombre,
                'before'=>'<a class="btn btn-default" href="javascript:window.history.back();"> <span class="glyphicon glyphicon-triangle-left"> </span> Volver atrás</a>  <h1>'.$valorGrupo->nombre.'</h1>',
                'after'=>                    
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrubModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
