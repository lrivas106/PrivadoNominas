<?php

namespace backend\controllers;

use Yii;
use backend\models\Detallexpago;
use backend\models\search\DetallexpagosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\grid\GridView;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * DetallexpagosController implements the CRUD actions for Detallexpago model.
 */
class DetallexpagosController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
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
        $searchModel = new DetallexpagosSearch();

        //Realizamos Busqueda Automatica:
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
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Detallexpago #".$iddetalle, $idexpediente, $idpersonal,
                    'content'=>$this->renderPartial('view', [
                        'model' => $this->findModel($iddetalle, $idexpediente, $idpersonal),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','iddetalle, $idexpediente, $idpersonal'=>$iddetalle, $idexpediente, $idpersonal],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($iddetalle, $idexpediente, $idpersonal),
            ]);
        }
    }

    /**
     * Creates a new Detallexpago model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Detallexpago();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Detallexpago",
                    'content'=>$this->renderPartial('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'true',
                    'title'=> "Create new Detallexpago",
                    'content'=>'<span class="text-success">Create Detallexpago success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new Detallexpago",
                    'content'=>$this->renderPartial('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'iddetalle' => $model->iddetalle, 'idexpediente' => $model->idexpediente, 'idpersonal' => $model->idpersonal]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Detallexpago model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $iddetalle
     * @param integer $idexpediente
     * @param integer $idpersonal
     * @return mixed
     */
    public function actionUpdate($iddetalle, $idexpediente, $idpersonal)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($iddetalle, $idexpediente, $idpersonal);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Detallexpago #".$iddetalle, $idexpediente, $idpersonal,
                    'content'=>$this->renderPartial('update', [
                        'model' => $this->findModel($iddetalle, $idexpediente, $idpersonal),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'true',
                    'title'=> "Detallexpago #".$iddetalle, $idexpediente, $idpersonal,
                    'content'=>$this->renderPartial('view', [
                        'model' => $this->findModel($iddetalle, $idexpediente, $idpersonal),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','iddetalle, $idexpediente, $idpersonal'=>$iddetalle, $idexpediente, $idpersonal],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update Detallexpago #".$iddetalle, $idexpediente, $idpersonal,
                    'content'=>$this->renderPartial('update', [
                        'model' => $this->findModel($iddetalle, $idexpediente, $idpersonal),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'iddetalle' => $model->iddetalle, 'idexpediente' => $model->idexpediente, 'idpersonal' => $model->idpersonal]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Detallexpago model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $iddetalle
     * @param integer $idexpediente
     * @param integer $idpersonal
     * @return mixed
     */
    public function actionDelete($iddetalle, $idexpediente, $idpersonal)
    {
        $request = Yii::$app->request;
        $this->findModel($iddetalle, $idexpediente, $idpersonal)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>true];    
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index', 'idexpediente'=>$idexpediente, 'idgrupo'=>'0']);
        }


    }

     /**
     * Delete multiple existing Detallexpago model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $iddetalle
     * @param integer $idexpediente
     * @param integer $idpersonal
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = $request->post('pks'); // Array or selected records primary keys
        foreach (Detallexpago::findAll(json_decode($pks)) as $model) {
            $model->delete();
        }
        

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>true]; 
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
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
