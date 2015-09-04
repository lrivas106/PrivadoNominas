<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Descuentoxdetalle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="descuentoxdetalle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iddetalle')->textInput() ?>

    <?= $form->field($model, 'iddescuento')->textInput() ?>

    <?= $form->field($model, 'monto')->textInput() ?>

    <?= $form->field($model, 'codusuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechageneracion')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
