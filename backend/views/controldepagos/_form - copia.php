<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Controldepago */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="controldepago-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idtipoexpediente')->textInput() ?>

    <?= $form->field($model, 'idmoneda')->textInput() ?>

    <?= $form->field($model, 'periodoinicio')->textInput() ?>

    <?= $form->field($model, 'periodofin')->textInput() ?>

    <?= $form->field($model, 'concepto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idetapa')->textInput() ?>

    <?= $form->field($model, 'idgrupo')->textInput() ?>

    <?= $form->field($model, 'fechageneracion')->textInput() ?>

    <?= $form->field($model, 'usuario_genera')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idtipopago')->textInput() ?>

    <?= $form->field($model, 'idformapago')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
