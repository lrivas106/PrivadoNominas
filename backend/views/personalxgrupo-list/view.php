<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Personalxgrupo */

$this->title = $model->idpersonal;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personalxgrupos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personalxgrupo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idpersonal' => $model->idpersonal, 'idgrupo' => $model->idgrupo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idpersonal' => $model->idpersonal, 'idgrupo' => $model->idgrupo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpersonal',
            'idgrupo',
            'estado',
        ],
    ]) ?>

</div>
