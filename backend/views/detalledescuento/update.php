<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\Personal;
use backend\models\Detallexpago;
use backend\models\Controldepago;
use backend\models\Descuento;
use backend\models\Puestoxpersonal;
use kartik\grid\FormulaColumn;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Descuentoxdetalle */


//Datos de el empleado
$modelDetail = Detallexpago::find()->where(['iddetalle'=>$_GET['iddetalle']])->one();
$modelCP = Controldepago::find()->where(['idexpediente'=>$modelDetail->idexpediente])->one();
$modelP = Personal::find()->where(['idpersonal'=>$modelDetail->idpersonal])->one();
$modelPuesto = Puestoxpersonal::find()->where(['idpersonal'=>$modelDetail->idpersonal])->one();
$modelDescuento = Descuento::find()->where(['iddescuento'=>$model->iddescuento])->one();


$this->title = Yii::t('app', 'Actualizar '.$modelDescuento->nombre, [
    'modelClass' => 'Actualizar Descuento',
]) . ' ' ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Actualizando Descuento'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddetalle, 'url' => ['view', 'iddetalle' => $model->iddetalle, 'iddescuento' => $model->iddescuento]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<br/><br/>
<a href="?r=detalledescuento%2Findex&iddetalle=<?=$modelDetail->iddetalle;?>" class="btn btn-primary"><span class='glyphicon glyphicon-triangle-left'></span> Regresar</a>
    <h2><?= $modelP->nombres;?> <?= $modelP->apellidos;?></h2>
    <div class="alert alert-info" role="alert"><?= $modelCP->concepto;?>
 <h3>Salario Base:Q <?= number_format($modelPuesto->base,2);?> </h3>
    </div>
    <br/><br/>
    

   <hr/>


<div class="descuentoxdetalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
