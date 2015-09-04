<?php

namespace backend\controllers;

use Yii;
use backend\models\Aportexdetalle;
use backend\models\search\Aportepordetalle;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetalleaporteController implements the CRUD actions for Aportexdetalle model.
 */
class DetalleaporteController extends Controller
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
     * Lists all Aportexdetalle models.
     * @return mixed
     */
    public function actionIndex($iddetalle=null)
    {
        $searchModel = new Aportepordetalle();
         //Realizamos Busqueda Automatica:
        $searchModel->iddetalle = $iddetalle;
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Aportexdetalle model.
     * @param integer $iddetalle
     * @param integer $idaporte
     * @return mixed 
     */
    public function actionView($iddetalle, $idaporte)
    {
        return $this->render('view', [
            'model' => $this->findModel($iddetalle, $idaporte),
        ]);
    }

    /**
     * Creates a new Aportexdetalle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Aportexdetalle();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'iddetalle' => $model->iddetalle, 'idaporte' => $model->idaporte]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Aportexdetalle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $iddetalle
     * @param integer $idaporte
     * @return mixed
     */
    public function actionUpdate($iddetalle, $idaporte)
    {
        $model = $this->findModel($iddetalle, $idaporte);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['index', 'iddetalle' => $model->iddetalle]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Aportexdetalle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $iddetalle
     * @param integer $idaporte
     * @return mixed
     */
    public function actionDelete($iddetalle, $idaporte)
    {
        $this->findModel($iddetalle, $idaporte)->delete();

        return $this->redirect(['index', 'iddetalle' => $iddetalle]);
    }

    /**
     * Finds the Aportexdetalle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $iddetalle
     * @param integer $idaporte
     * @return Aportexdetalle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($iddetalle, $idaporte)
    {
        if (($model = Aportexdetalle::findOne(['iddetalle' => $iddetalle, 'idaporte' => $idaporte])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
