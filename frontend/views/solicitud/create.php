<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Solicitud */

$this->title = Yii::t('app', 'Crear Solicitud');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Solicitud'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
