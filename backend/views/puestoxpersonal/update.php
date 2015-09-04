<?php

use yii\helpers\Html;
use backend\models\Personal;

/* @var $this yii\web\View */
/* @var $model backend\models\Puestoxpersonal */

//Datos de el empleado
$modelP = Personal::find()->where(['idpersonal'=>$_GET['idempleado']])->one();

$this->title = Yii::t('app', 'Actualización Puesto ', [
    'modelClass' => 'Puestoxpersonal',
]) ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Puestoxpersonals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddetalle, 'url' => ['view', 'iddetalle' => $model->iddetalle]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="puestoxpersonal-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <br/><br/>
    <h2><?= $modelP->nombres;?> <?= $modelP->apellidos;?></h2>
   

    <?= $this->render('_formupdate', [
        'model' => $model,
    ]) ?>

</div>
