<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Detallexpago */

$this->title = Yii::t('app', 'Create Detallexpago');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detallexpagos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallexpago-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
