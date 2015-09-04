<?php


use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use yii\helpers\ArrayHelper; 

use backend\models\Aporte;

/* @var $this yii\web\View */
/* @var $model backend\models\Descuentoxdetalle */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="aportexdetalle-form">


    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]); 

echo FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
            [ //Agregamos la primera Fila
            'contentBefore'=>'<legend class="text-info"><small>Aplicar Aporte</small></legend>',
            'columns'=>4,
            'attributes'=>[       // Las columnas estan dadas por la cantidad de campos agregados

                

                'idaporte'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                 'items'=>ArrayHelper::map(Aporte::find()->where(['estado'=>'1'])->orderBy('nombre')->all(), 'idaporte', 'nombre'), 
                 'hint'=>''],   

                 'monto'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Monto Q:']],

                'codusuario'=>['type'=>Form::INPUT_HIDDEN, 'options' => ['value'=> 'lrivas'], 'label'=>''],
                 'iddetalle'=>['type'=>Form::INPUT_HIDDEN, 'options' => ['value'=> $_GET['iddetalle']] , 'label'=>''],
                 'fechageneracion'=>['type'=>Form::INPUT_HIDDEN, 'options' => ['value'=> date('Y-m-d h:i:s')] , 'label'=>''],
                
            ],
        ],
           

         
    ],
    ]);

?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Asignar Aporte') : Yii::t('app', 'Actualizar Aporte'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
