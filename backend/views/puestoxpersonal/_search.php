<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PuestoxpersonalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="puestoxpersonal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddetalle') ?>

    <?= $form->field($model, 'idpersonal') ?>

    <?= $form->field($model, 'idpuesto') ?>

    <?= $form->field($model, 'base') ?>

    <?= $form->field($model, 'idcontrato') ?>

    <?php // echo $form->field($model, 'iddepartamento') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'codusuario') ?>

    <?php // echo $form->field($model, 'fechageneracion') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
