<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use backend\models\Controldepago;
use backend\models\Detallexpago;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\DetallexpagosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//Datos de el empleado
$modelCP = Controldepago::find()->where(['idexpediente'=>$_GET['idexpediente']])->one();

$this->title = Yii::t('app', 'Detalle de Pagos');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<a href="index.php?r=controldepago" class="btn btn-primary"><span class='glyphicon glyphicon-triangle-left'></span> Regresar</a>

<a href="index.php?r=controldepago" class="btn btn-info"><span class='glyphicon glyphicon-print'></span> Imprimir</a>

<br><br>

<div class="alert alert-success" role="alert">

 <h3>No de Expediente: <?= $modelCP->idexpediente;?></h3>
 <p>Concepto: <?= $modelCP->concepto;?></p>
    </div>

<br><br>
<div class="detallexpago-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
             //'showPageSummary'=>true,
            //'filterModel' => $searchModel,
            'pjax'=>false,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    //Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['personalxgrupo-list/index', 'idgrupo' => $_GET['idgrupo'], 'idexpediente' => $_GET['idexpediente']],
                    ['title'=> 'Agregar Empleados','class'=>'btn btn-default']).
                   
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Lista de detalles',
                'before'=>"<p>
                A continuación se muestra el detalle en base a los empleados.
                <br>
        
    </p>",
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
