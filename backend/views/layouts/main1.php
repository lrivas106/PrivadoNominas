<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Nominale | Proyección Total S.A.',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],

                ['label' => 'Control de Pagos', 'url' => ['personalxgrupo/index'], 'items' => [
                ['label' => 'Pagos', 'url' => ['controldepago/index', 'tag' => '/site/index']],
                ['label' => 'Grupos', 'url' => ['grupodepago/index', 'tag' => '/site/index']],
                ['label' => 'Tipos de Pago', 'url' => ['tipopago/index', 'tag' => '/site/index']],
                ['label' => 'Tipos de Planilla', 'url' => ['product/index', 'tag' => '/site/index']],
                ['label' => 'Catálogo de Descuentos', 'url' => ['descuento/index', 'tag' => '/site/index']],
                ['label' => 'Cátalogo de Aportes', 'url' => ['aporte/index', 'tag' => '/site/index']],
                ]],

                ['label' => 'RRHH', 'url' => ['product/index'], 'items' => [
                ['label' => 'Busqueda de Expediente*', 'url' => ['product/index', 'tag' => '/site/index']],
                ['label' => 'Impresión de Constancia Laboral*', 'url' => ['product/index', 'tag' => '/site/index']],
                ['label' => 'Empleados', 'url' => ['personal/index', 'tag' => '/site/index']],
                ['label' => 'Departamentos', 'url' => ['departamento/index', 'tag' => '']],
                ['label' => 'Contratos Disponibles', 'url' => ['contrato/index', 'tag' => '/site/index']],
                ['label' => 'Puestos de Trabajo', 'url' => ['puesto/index', 'tag' => '/site/index']],
                ]],

                ['label' => 'Usuarios', 'url' => ['product/index'], 'items' => [
                ['label' => 'Rol', 'url' => ['rol/index']],
                ['label' => 'Operaciones', 'url' => ['operacion/index']],
                           
                ]],


                
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; Nominale | Proyección Total <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
