<?php
/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenido</h1>

        <p class="lead">Este sistema fue desarrollado para llevar el control de empleados, nóminas y planillas de la empresa PROYECCIÓN TOTAL S.A</p>

       
    </div>

<?php
      if (Yii::$app->user->isGuest) {
                //$menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        echo "<h1>Usuario No Registrado</h1>";
            } else {
               // $menuItems[] = [
               //     'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
               //     'url' => ['/site/logout'],
                //    'linkOptions' => ['data-method' => 'post']
               // ];
               // echo "<h1>Usuario Registrado ".Yii::$app->user->identity->username."</h1>";
            }
    ?>


    <div class="body-content">

        <!--<div class="row">
            <div class="col-lg-4">
                <h2><?= Yii::t('app','Congratulations!'); ?></h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2><?= Yii::t('app','Congratulations!'); ?></h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>
        -->

    </div>
</div>
