<?php
use yii\bootstrap\Nav;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Luis Rivas</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?=
       


        Nav::widget(
            [
                'encodeLabels' => false,
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                
                ['label' => '<i class="fa fa-file-code-o"></i><span>Cerrar Sesión</span>', 'url' => ['/site/logout']], 
                   

               '<li class="header"><span class="glyphicon glyphicon-globe"></span> Recursos Humanos</li>',
               
                //['label' => '<i class="fa fa-file-code-o"></i><span>Constancia Laboral</span>', 'url' => ['product/index', 'tag' => '/site/index']],
                ['label' => '<i class="fa fa-file-code-o"></i><span>Empleados</span>', 'url' => ['personal/index', 'tag' => '/site/index']],
                ['label' => '<i class="fa fa-file-code-o"></i><span>Departamentos</span>', 'url' => ['departamento/index', 'tag' => '']],
                ['label' => '<i class="fa fa-file-code-o"></i><span>Contratos</span>', 'url' => ['contrato/index', 'tag' => '/site/index']],
                ['label' => '<i class="fa fa-file-code-o"></i><span>Puestos de Trabajo</span>', 'url' => ['puesto/index', 'tag' => '/site/index']],
                
               '<li class="header"><span class="glyphicon glyphicon-globe"></span> Nóminas y Planillas</li>',
              
                ['label' => '<i class="fa fa-file-code-o"></i><span>Pagos</span>', 'url' => ['controldepago/index', 'tag' => '/site/index']],
                ['label' => '<i class="fa fa-file-code-o"></i><span>Grupos</span>', 'url' => ['grupodepago/index', 'tag' => '/site/index']],
                ['label' => '<i class="fa fa-file-code-o"></i><span>Tipos de Pago</span>', 'url' => ['tipopago/index', 'tag' => '/site/index']],
                ['label' => '<i class="fa fa-file-code-o"></i><span>Cátalogo de Descuentos</span>', 'url' => ['descuento/index', 'tag' => '/site/index']],
                ['label' => '<i class="fa fa-file-code-o"></i><span>Cátalogo de Aportes</span>', 'url' => ['aporte/index', 'tag' => '/site/index']],
               

                ['label' => 'Usuarios', 'url' => ['product/index'], 'items' => [
                ['label' => 'Rol', 'url' => ['rol/index']],
                ['label' => 'Operaciones', 'url' => ['operacion/index']],
                           
                ]],


                  /*  ['label' => '<i class="fa fa-file-code-o"></i><span>Gii</span>', 'url' => ['/gii']],
                    ['label' => '<i class="fa fa-dashboard"></i><span>Debug</span>', 'url' => ['/debug']],
                    [
                        'label' => '<i class="glyphicon glyphicon-lock"></i><span>Sing in</span>', //for basic
                        'url' => ['/site/login'],
                        'visible' =>Yii::$app->user->isGuest
                    ],*/
                ],
            ]
        );

       
        ?>

        <!--

        <ul class="sidebar-menu">
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Same tools</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['/gii']) ?>"><span class="fa fa-file-code-o"></span> Gii</a>
                    </li>
                    <li><a href="<?= \yii\helpers\Url::to(['/debug']) ?>"><span class="fa fa-dashboard"></span> Debug</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>


        </ul>
-->
    </section>

</aside>
