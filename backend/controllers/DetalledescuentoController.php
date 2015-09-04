<?php

namespace backend\controllers;

use Yii;
use backend\models\Descuentoxdetalle;
use backend\models\search\Descuentoxdetalle as DescuentoxdetalleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetalledescuentoController implements the CRUD actions for Descuentoxdetalle model.
 */
class DetalledescuentoController extends Controller
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
     * Lists all Descuentoxdetalle models.
     * @return mixed
     */
    public function actionIndex($iddetalle=null)
    {
        $searchModel = new DescuentoxdetalleSearch();
         //Realizamos Busqueda Automatica:
        $searchModel->iddetalle = $iddetalle;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Descuentoxdetalle model.
     * @param integer $iddetalle
     * @param integer $iddescuento
     * @return mixed
     */
    public function actionView($iddetalle, $iddescuento)
    {
        return $this->render('view', [
            'model' => $this->findModel($iddetalle, $iddescuento),
        ]);
    }

    /**
     * Creates a new Descuentoxdetalle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Descuentoxdetalle();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'iddetalle' => $model->iddetalle, 'iddescuento' => $model->iddescuento]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Descuentoxdetalle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $iddetalle
     * @param integer $iddescuento
     * @return mixed
     */
    public function actionUpdate($iddetalle, $iddescuento)
    {
        $model = $this->findModel($iddetalle, $iddescuento);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'iddetalle' => $model->iddetalle]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Descuentoxdetalle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $iddetalle
     * @param integer $iddescuento
     * @return mixed
     */
    public function actionDelete($iddetalle, $iddescuento)
    {
        $this->findModel($iddetalle, $iddescuento)->delete();

        return $this->redirect(['index', 'iddetalle' => $iddetalle]);
    }

    /**
     * Finds the Descuentoxdetalle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $iddetalle
     * @param integer $iddescuento
     * @return Descuentoxdetalle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($iddetalle, $iddescuento)
    {
        if (($model = Descuentoxdetalle::findOne(['iddetalle' => $iddetalle, 'iddescuento' => $iddescuento])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
