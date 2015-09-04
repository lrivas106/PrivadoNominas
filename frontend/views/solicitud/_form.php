<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;

use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use yii\helpers\ArrayHelper; 

use frontend\models\Tiposolicitud;

/* @var $this yii\web\View */
/* @var $model frontend\models\Solicitud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-form">

      <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]); 

echo FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
            [ //Agregamos la primera Fila
            'contentBefore'=>'<legend class="text-info"><small>Datos del empleado</small></legend>',
            'columns'=>4,
            'attributes'=>[      

                
                'nombre'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Ingrese su nombre']], 
                'codempleado'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Ingrese su codigo de empleado']],   

                

                 /*'iddepartamento'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                 'items'=>ArrayHelper::map(Departamento::find()->where(['estado'=>'1'])->orderBy('nombre')->all(), 'iddepartamento', 'nombre'), 
                 'hint'=>''],     

                 'idcontrato'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                 'items'=>ArrayHelper::map(Contrato::find()->where(['estado'=>'1'])->orderBy('nombre')->all(), 'idcontrato', 'nombre'), 
                 'hint'=>''],       

                 'base'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Q Sueldo Base']],       */      
            ],
        ],


       [ //Agregamos la segunda Fila
            'contentBefore'=>'<legend class="text-info"><small>Solicitud</small></legend>',
            'columns'=>4,
            'attributes'=>[       // Las columnas estan dadas por la cantidad de campos agregados
                // Las columnas estan dadas por la cantidad de campos agregados
                'idtipo'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                 'items'=>ArrayHelper::map(Tiposolicitud::find()->where(['estado'=>'1'])->orderBy('nombre')->all(), 'idtipo', 'nombre'), 
                 'hint'=>''],   

           
            ],
        ],

        [ //Agregamos la segunda Fila
            'contentBefore'=>'',
            'columns'=>4,
            'attributes'=>[       // Las columnas estan dadas por la cantidad de campos agregados
                 'asunto'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Asunto']],   
            ],
        ],

         [ //Agregamos la segunda Fila
            'contentBefore'=>'',
            'columns'=>4,
            'attributes'=>[       // Las columnas estan dadas por la cantidad de campos agregados
                 'mensaje'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Mensaje']],   
            ],
        ],

        
        [ //Agregamos la quinta fila 
            'contentBefore'=>'',
            'columns'=>1,
            'attributes'=>[       // Las columnas estan dadas por la cantidad de campos agregados                 
              //  'estado'=>['type'=>Form::INPUT_HIDDEN, 'options' => ['value'=> '1']],
                 'fecha'=>['type'=>Form::INPUT_HIDDEN, 'options' => ['value'=> date('Y-m-d h:i:s')] , 'label'=>''],
            ],
        ],
        ],
    
    ]);


?>
   
<br/><br/><br/>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Enviar') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
