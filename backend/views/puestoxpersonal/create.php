<?php

use yii\helpers\Html;
use backend\models\Personal;


/* @var $this yii\web\View */
/* @var $model backend\models\Puestoxpersonal */

//Datos de el empleado
$modelP = Personal::find()->where(['idpersonal'=>$_GET['idempleado']])->one();

$this->title = Yii::t('app', 'Nuevo Puesto de Trabajo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Puestoxpersonals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puestoxpersonal-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <br/><br/>
    <h2><?= $modelP->nombres;?> <?= $modelP->apellidos;?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
