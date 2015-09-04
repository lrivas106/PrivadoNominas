<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Detallexpago */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detallexpago-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idexpediente')->textInput() ?>

    <?= $form->field($model, 'idpersonal')->textInput() ?>

    <?= $form->field($model, 'codusuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechageneracion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
