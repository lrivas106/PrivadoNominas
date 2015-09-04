<?php

namespace backend\controllers;

use Yii;
use backend\models\seguridad\Operacion;
use backend\models\seguridad\search\OperacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\grid\GridView;
use \yii\web\Response;
use yii\helpers\Html;

use common\models\AccessHelpers; //incluyendo funciones de acceso



class BaseController extends Controller
{

//Este método debe devolver verdadero o falso, que se traduce a que la acción solicitada se ejecute o no.
    public function beforeAction($action)
{
    if (!parent::beforeAction($action)) {
        return false;
    }
 
    $operacion = str_replace("/", "-", Yii::$app->controller->route);
 
    $permitirSiempre = ['login','site-captcha', 'site-signup', 'site-index', 'site-error', 'site-contact', 'site-login', 'site-logout'];
 
    if (in_array($operacion, $permitirSiempre)) {
        return true;
    }
 
    if (!AccessHelpers::getAcceso($operacion)) {
         echo 'Sin Permisos para acceder a esta sección'; 
        //echo $this->render('nopermitido');
        return false;
    }
 
    return true;
}
//@Este método debe devolver verdadero o falso, que se traduce a que la acción solicitada se ejecute o no.
}
?>