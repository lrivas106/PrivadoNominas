<?php

namespace backend\controllers;

use Yii;
use backend\models\Personalxgrupo;
use backend\models\search\PersonalxgrupoListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonalxgrupoListController implements the CRUD actions for Personalxgrupo model.
 */
class PersonalxgrupoListController extends Controller
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
     * Lists all Personalxgrupo models.
     * @return mixed
     */
    public function actionIndex($idgrupo, $idexpediente)
    {
        $searchModel = new PersonalxgrupoListSearch();

        //Agregando busqueda automatica
        $searchModel->idgrupo = $idgrupo;
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $idexpediente);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personalxgrupo model.
     * @param integer $idpersonal
     * @param integer $idgrupo
     * @return mixed
     */
    public function actionView($idpersonal, $idgrupo)
    {
        return $this->render('view', [
            'model' => $this->findModel($idpersonal, $idgrupo),
        ]);
    }


/*metodo para agregar un empleado a un detalle de expediente*/
    public function actionAgregardetalle()
    {

       // return $this->redirect(['index', 'idpersonal' => $model->idpersonal, 'idgrupo' => $model->idgrupo]);
    }

    /**
     * Creates a new Personalxgrupo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Personalxgrupo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idpersonal' => $model->idpersonal, 'idgrupo' => $model->idgrupo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Personalxgrupo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idpersonal
     * @param integer $idgrupo
     * @return mixed
     */
    public function actionUpdate($idpersonal, $idgrupo)
    {
        $model = $this->findModel($idpersonal, $idgrupo);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idpersonal' => $model->idpersonal, 'idgrupo' => $model->idgrupo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Personalxgrupo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idpersonal
     * @param integer $idgrupo
     * @return mixed
     */
    public function actionDelete($idpersonal, $idgrupo)
    {
        $this->findModel($idpersonal, $idgrupo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Personalxgrupo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idpersonal
     * @param integer $idgrupo
     * @return Personalxgrupo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idpersonal, $idgrupo)
    {
        if (($model = Personalxgrupo::findOne(['idpersonal' => $idpersonal, 'idgrupo' => $idgrupo])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
