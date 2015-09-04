<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Grupodepago;
use backend\models\Personal;

/* @var $this yii\web\View */
/* @var $model backend\models\Personalxgrupo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personalxgrupo-form">

    <?php $form = ActiveForm::begin(); ?>
     <?=$form->field($model, 'idpersonal')
     ->dropDownList(
            ArrayHelper::map(Personal::find()->orderBy('nombres')->all(), 'idpersonal', 'nombres')
            )
    ?>

    <?=$form->field($model, 'idgrupo')
     ->dropDownList(
            ArrayHelper::map(Grupodepago::find()->where(['estado' => '1'])->orderBy('nombre')->all(), 'idgrupo', 'nombre')
            )
    ?>

    <?= $form->field($model, 'estado')->radioList(array('1'=>'Activo','0'=>'Inactivo')); ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
