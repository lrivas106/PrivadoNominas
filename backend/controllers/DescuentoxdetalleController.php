<?php

namespace backend\controllers;

use Yii;
use backend\models\Descuentoxdetalle;
use backend\models\search\DescuentoxdetalleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\grid\GridView;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * DescuentoxdetalleController implements the CRUD actions for Descuentoxdetalle model.
 */
class DescuentoxdetalleController extends Controller
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
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Descuentoxdetalle #".$iddetalle, $iddescuento,
                    'content'=>$this->renderPartial('view', [
                        'model' => $this->findModel($iddetalle, $iddescuento),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','iddetalle, $iddescuento'=>$iddetalle, $iddescuento],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($iddetalle, $iddescuento),
            ]);
        }
    }

    /**
     * Creates a new Descuentoxdetalle model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Descuentoxdetalle();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Descuentoxdetalle",
                    'content'=>$this->renderPartial('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'true',
                    'title'=> "Create new Descuentoxdetalle",
                    'content'=>'<span class="text-success">Create Descuentoxdetalle success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new Descuentoxdetalle",
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
                return $this->redirect(['view', 'iddetalle' => $model->iddetalle, 'iddescuento' => $model->iddescuento]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Descuentoxdetalle model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $iddetalle
     * @param integer $iddescuento
     * @return mixed
     */
    public function actionUpdate($iddetalle, $iddescuento)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($iddetalle, $iddescuento);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Descuentoxdetalle #".$iddetalle, $iddescuento,
                    'content'=>$this->renderPartial('update', [
                        'model' => $this->findModel($iddetalle, $iddescuento),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'true',
                    'title'=> "Descuentoxdetalle #".$iddetalle, $iddescuento,
                    'content'=>$this->renderPartial('view', [
                        'model' => $this->findModel($iddetalle, $iddescuento),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','iddetalle, $iddescuento'=>$iddetalle, $iddescuento],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update Descuentoxdetalle #".$iddetalle, $iddescuento,
                    'content'=>$this->renderPartial('update', [
                        'model' => $this->findModel($iddetalle, $iddescuento),
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
                return $this->redirect(['view', 'iddetalle' => $model->iddetalle, 'iddescuento' => $model->iddescuento]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Descuentoxdetalle model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $iddetalle
     * @param integer $iddescuento
     * @return mixed
     */
    public function actionDelete($iddetalle, $iddescuento)
    {
        $request = Yii::$app->request;
        $this->findModel($iddetalle, $iddescuento)->delete();

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
     * Delete multiple existing Descuentoxdetalle model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $iddetalle
     * @param integer $iddescuento
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = $request->post('pks'); // Array or selected records primary keys
        foreach (Descuentoxdetalle::findAll(json_decode($pks)) as $model) {
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
