<?php

use yii\helpers\Html;



use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use yii\helpers\ArrayHelper; 

use backend\models\Personal;
use backend\models\Puesto;
use backend\models\Contrato;
use backend\models\Departamento;
use backend\models\Estadopersonal;

use dosamigos\datetimepicker\DateTimePicker; 

/* @var $this yii\web\View */
/* @var $model backend\models\Puestoxpersonal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="puestoxpersonal-form">
   <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]); 

echo FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
            [ //Agregamos la primera Fila
            'contentBefore'=>'<legend class="text-info"><small>Datos del nuevo puesto</small></legend>',
            'columns'=>4,
            'attributes'=>[       // Las columnas estan dadas por la cantidad de campos agregados
                'idpuesto'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                 'items'=>ArrayHelper::map(Puesto::find()->where(['estado'=>'1'])->orderBy('nombre')->all(), 'idpuesto', 'nombre'),
                 'hint'=>''],   

                 'iddepartamento'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                 'items'=>ArrayHelper::map(Departamento::find()->where(['estado'=>'1'])->orderBy('nombre')->all(), 'iddepartamento', 'nombre'), 
                 'hint'=>''],     

                 'idcontrato'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                 'items'=>ArrayHelper::map(Contrato::find()->where(['estado'=>'1'])->orderBy('nombre')->all(), 'idcontrato', 'nombre'), 
                 'hint'=>''],       

                 'base'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Q Sueldo Base']],             
            ],
        ],


        [ //Agregamos la segunda Fila
            'contentBefore'=>'<legend class="text-info"><small>Datos del nuevo puesto</small></legend>',
            'columns'=>4,
            'attributes'=>[       // Las columnas estan dadas por la cantidad de campos agregados
                'estado'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                 'items'=>ArrayHelper::map(Estadopersonal::find()->where(['estado'=>'1'])->orderBy('nombre')->all(), 'idestado', 'nombre'), 
                 'hint'=>''],   

                 'fechainicio'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\yii\widgets\MaskedInput',
'options' =>['mask' => '9999-99-99'], 'hint'=>'Día de Inicio de Labores.'],  

            'fechafin'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\yii\widgets\MaskedInput',
             'options' =>['mask' => '9999-99-99'], 'hint'=>'Día de Inicio de Labores.'],               
            ],
        ],

        
        [ //Agregamos la quinta fila 
            'contentBefore'=>'',
            'columns'=>1,
            'attributes'=>[       // Las columnas estan dadas por la cantidad de campos agregados                 
         

                 'codusuario'=>['type'=>Form::INPUT_HIDDEN, 'options' => ['value'=> 'lrivas'], 'label'=>''],
                 'idpersonal'=>['type'=>Form::INPUT_HIDDEN, 'options' => ['value'=> $_GET['idempleado']] , 'label'=>''],
                 'fechageneracion'=>['type'=>Form::INPUT_HIDDEN, 'options' => ['value'=> date('Y-m-d h:i:s')] , 'label'=>''],

                // 'fechafin'=>['type'=>Form::INPUT_HIDDEN, 'options' => ['value'=> date('Y-m-d h:i:s')]],

            ],
        ],

        
        
       

         

    ]
    ]);






?>
   
<br/><br/><br/>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Asignar Puesto') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


  