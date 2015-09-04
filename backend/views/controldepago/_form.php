<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
//use yii\base\Configurable;
//use yii\base\ViewContextInterface;
//use yii\base\Widget;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use dosamigos\datepicker\DatePicker;
//use kartik\builder\Form;

//use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
//use kartik\widgets\DatePicker;
//use kartik\date\DatePicker;

use backend\models\Tipoexpediente;
use backend\models\Moneda;
use backend\models\Formapago;
use backend\models\Tipopago;
use backend\models\Etapapago;
use backend\models\Grupodepago;


/* @var $this yii\web\View */
/* @var $model backend\models\Controldepago */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="controldepago-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]); 

echo FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
        [ //Agregamos la primera Fila
            'contentBefore'=>'<legend class="text-info"><small>INFORMACIÓN DEL EXPEDIENTE DE PAGO</small></legend>',
            'columns'=>4,
            'attributes'=>[       // Las columnas estan dadas por la cantidad de campos agregados
                'idtipoexpediente'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                 'items'=>ArrayHelper::map(Tipoexpediente::find()->where(['estado'=>'1'])->orderBy('nombre')->all(), 'idtipoexpediente', 'nombre'), 
                 'hint'=>''],

                'idmoneda'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                 'items'=>ArrayHelper::map(Moneda::find()->where(['estado'=>'1'])->orderBy('etiqueta')->all(), 'idmoneda', 'etiqueta'), 
                 'hint'=>''],

                 'idtipopago'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                 'items'=>ArrayHelper::map(Tipopago::find()->where(['estado'=>'1'])->orderBy('nombre')->all(), 'idtipopago', 'nombre'), 
                 'hint'=>''],

                 'idgrupo'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                 'items'=>ArrayHelper::map(Grupodepago::find()->where(['estado'=>'1'])->orderBy('nombre')->all(), 'idgrupo', 'nombre'), 
                 'hint'=>''],
            ],
        ],

        [ //Agregamos la segunda fila 
            'contentBefore'=>'<hr/>',
            'columns'=>2,
            'attributes'=>[       // Las columnas estan dadas por la cantidad de campos agregados
                'periodoinicio'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 'hint'=>'Enter birthday (dd/mm/yyyy)',
                 'options' => ['placeholder' => 'Select issue date ...'],
    'pluginOptions' => [
        'format' => 'dd-M-yyyy',
        'todayHighlight' => true
    ]],

                

                'periodofin'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 'hint'=>'Enter birthday (dd/mm/yyyy)'],
        
        [ //Agregamos la tercera fila 
            'contentBefore'=>'<hr/>',
            'columns'=>1,
            'attributes'=>[       // Las columnas estan dadas por la cantidad de campos agregados
                'concepto'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Agregue el concepto del pago.']],

            ],
        ],
        
        [ //Agregamos la cuarta fila 
            'contentBefore'=>'<hr/><div style="text-align:center"><legend class="text-info"><small>INFORMACIÓN DEL PAGO</h3></small></legend></div>',
            'columns'=>3,
            'attributes'=>[       // Las columnas estan dadas por la cantidad de campos agregados
                'concepto1'=>['type'=>'raw', 'value'=>'Total Aportes: <div class="panel panel-info">Q. 0</div> '],
                'concepto2'=>['type'=>'raw', 'value'=>'Total Deducciones: <div class="panel panel-info">Q. 0</div>'],
                'concepto3'=>['type'=>'raw', 'value'=>'Total A Pagar: <div class="panel panel-info">Q. 0</div>'],

                 //'usuario_genera'=>['type'=>Form::INPUT_TEXT, 'value'=>'admin'],
                //'fechageneracion'=>['type'=>Form::INPUT_TEXT, 'value'=>'2015-07-23'],

            ],
        ],

         [ //Agregamos la quinta fila 
            'contentBefore'=>'',
            'columns'=>1,
            'attributes'=>[       // Las columnas estan dadas por la cantidad de campos agregados                 
                 'idformapago'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                 'items'=>ArrayHelper::map(Formapago::find()->where(['estado'=>'1'])->orderBy('nombre')->all(), 'idformapago', 'nombre'), 
                 'hint'=>''],

                 'usuario_genera'=>['type'=>Form::INPUT_TEXT, 'staticValue'=>'admin'],
                'fechageneracion'=>['type'=>Form::INPUT_TEXT, 'staticvalue'=>'2015-07-23'],

            ],
        ],

    ],],]
    ]);

    ?>

    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

    	<?php } ?>

    <?php ActiveForm::end(); ?>



    
</div>
