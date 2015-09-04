<?php

namespace backend\controllers;

use Yii;
use backend\models\Detallexpago;
use backend\models\search\DetallexpagoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetallexpagoController implements the CRUD actions for Detallexpago model.
 */
class DetallexpagoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Detallexpago models.
     * @return mixed
     */
    public function actionIndex($idexpediente)
    {
        $searchModel = new DetallexpagoSearch();
        $searchModel->idexpediente = $idexpediente;
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detallexpago model.
     * @param integer $iddetalle
     * @param integer $idexpediente
     * @param integer $idpersonal
     * @return mixed
     */
    public function actionView($iddetalle, $idexpediente, $idpersonal)
    {
        return $this->render('view', [
            'model' => $this->findModel($iddetalle, $idexpediente, $idpersonal),
        ]);
    }



    /**
     * Modelo para agregar un registro de detalle de pago.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatedetalle($idexpediente=null, $idpersonal=null, $idgrupo=null)
    {
        //$model = new Detallexpago();

 $table = new Detallexpago;
                $table->idexpediente = $idexpediente;
                $table->idpersonal = $idpersonal;
                $table->codusuario = 'admin';
                $table->fechageneracion = '2015-07-24';
                if ($table->insert())
                {}

   //$command = Yii::$app->db->createCommand();

   /* $command->insert('Detallexpago',[
            'iddetalle' => 3,
            'idexpediente' => 3,
            'idpersonal' => 1,
            'codusuario' => 'admin',
            'fechageneracion' => '2015-07-24',])
    ;?*/

       return $this->redirect(['detallexpagos/index', 'iddetalle' => $table->iddetalle, 'idexpediente' => $table->idexpediente, 'idpersonal' => $table->idpersonal, 'idgrupo' => $idgrupo]);
    //return $this->render('createdetallexpago');

        /*$model = new Detallexpago();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iddetalle' => $model->iddetalle, 'idexpediente' => $model->idexpediente, 'idpersonal' => $model->idpersonal]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
    }


    /**
     * Creates a new Detallexpago model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Detallexpago();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iddetalle' => $model->iddetalle, 'idexpediente' => $model->idexpediente, 'idpersonal' => $model->idpersonal]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Detallexpago model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $iddetalle
     * @param integer $idexpediente
     * @param integer $idpersonal
     * @return mixed
     */
    public function actionUpdate($iddetalle, $idexpediente, $idpersonal)
    {
        $model = $this->findModel($iddetalle, $idexpediente, $idpersonal);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iddetalle' => $model->iddetalle, 'idexpediente' => $model->idexpediente, 'idpersonal' => $model->idpersonal]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Detallexpago model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $iddetalle
     * @param integer $idexpediente
     * @param integer $idpersonal
     * @return mixed
     */
    public function actionDelete($iddetalle, $idexpediente, $idpersonal)
    {
        $this->findModel($iddetalle, $idexpediente, $idpersonal)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Detallexpago model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $iddetalle
     * @param integer $idexpediente
     * @param integer $idpersonal
     * @return Detallexpago the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($iddetalle, $idexpediente, $idpersonal)
    {
        if (($model = Detallexpago::findOne(['iddetalle' => $iddetalle, 'idexpediente' => $idexpediente, 'idpersonal' => $idpersonal])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
