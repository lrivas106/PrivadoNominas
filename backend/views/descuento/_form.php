<?php

//use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Valordecalculo;


/* @var $this yii\web\View */
/* @var $model backend\models\Descuento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="descuento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>



<?=
$form->field($model, 'idvalor')
     ->dropDownList(
            ArrayHelper::map(Valordecalculo::find()->all(), 'idvalor', 'etiqueta')
            )

?>



    <?= $form->field($model, 'cantidad')->textInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'estado')->radioList(array('1'=>'Activo','0'=>'Inactivo')); ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
