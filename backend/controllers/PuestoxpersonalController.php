<?php

namespace backend\controllers;

use Yii;
use backend\models\Puestoxpersonal;
use backend\models\search\PuestoxpersonalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PuestoxpersonalController implements the CRUD actions for Puestoxpersonal model.
 */
class PuestoxpersonalController extends Controller
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
     * Lists all Puestoxpersonal models.
     * @return mixed
     */
    public function actionIndex($idempleado)
    {
        $searchModel = new PuestoxpersonalSearch();
       // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $searchModel->idpersonal = $idempleado;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Puestoxpersonal model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($idempleado)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Puestoxpersonal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idempleado)
    {
        $model = new Puestoxpersonal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'idempleado' => $idempleado]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]); 
        }
    }

    /**
     * Updates an existing Puestoxpersonal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($idempleado)
    {
        $model = $this->findModel($idempleado);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'idempleado' => $model->idpersonal]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Puestoxpersonal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Puestoxpersonal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Puestoxpersonal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Puestoxpersonal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
