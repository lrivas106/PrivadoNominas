<?php

namespace backend\controllers;

use Yii;
use backend\models\Personalxgrupo;
use backend\models\search\PersonalxgrupoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\grid\GridView;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * PersonalxgrupoController implements the CRUD actions for Personalxgrupo model.
 */
class PersonalxgrupoController extends Controller
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
     * Lists all Personalxgrupo models.
     * @return mixed
     */
    public function actionIndex($idgrupo)
    {    
        $searchModel = new PersonalxgrupoSearch();
         //$searchModel = new AuthorSearch();

    // Trying to set an initial filter value here
    $searchModel->idgrupo = $idgrupo;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



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
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Personalxgrupo #".$idpersonal, $idgrupo,
                    'content'=>$this->renderPartial('view', [
                        'model' => $this->findModel($idpersonal, $idgrupo),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','idpersonal, $idgrupo'=>$idpersonal, $idgrupo],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($idpersonal, $idgrupo),
            ]);
        }
    }


    /**
     * Creates a new Personalxgrupo model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Personalxgrupo();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Personalxgrupo",
                    'content'=>$this->renderPartial('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'true',
                    'title'=> "Create new Personalxgrupo",
                    'content'=>'<span class="text-success">Create Personalxgrupo success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new Personalxgrupo",
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
                return $this->redirect(['view', 'idpersonal' => $model->idpersonal, 'idgrupo' => $model->idgrupo]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Personalxgrupo model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idpersonal
     * @param integer $idgrupo
     * @return mixed
     */
    public function actionUpdate($idpersonal, $idgrupo)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($idpersonal, $idgrupo);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Personalxgrupo #".$idpersonal, $idgrupo,
                    'content'=>$this->renderPartial('update', [
                        'model' => $this->findModel($idpersonal, $idgrupo),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'true',
                    'title'=> "Personalxgrupo #".$idpersonal, $idgrupo,
                    'content'=>$this->renderPartial('view', [
                        'model' => $this->findModel($idpersonal, $idgrupo),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','idpersonal, $idgrupo'=>$idpersonal, $idgrupo],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update Personalxgrupo #".$idpersonal, $idgrupo,
                    'content'=>$this->renderPartial('update', [
                        'model' => $this->findModel($idpersonal, $idgrupo),
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
                return $this->redirect(['view', 'idpersonal' => $model->idpersonal, 'idgrupo' => $model->idgrupo]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Personalxgrupo model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idpersonal
     * @param integer $idgrupo
     * @return mixed
     */
    public function actionDelete($idpersonal, $idgrupo)
    {
        $request = Yii::$app->request;
        $this->findModel($idpersonal, $idgrupo)->delete();

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
     * Delete multiple existing Personalxgrupo model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idpersonal
     * @param integer $idgrupo
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = $request->post('pks'); // Array or selected records primary keys
        foreach (Personalxgrupo::findAll(json_decode($pks)) as $model) {
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
     * Delete multiple existing Personalxgrupo model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idpersonal
     * @param integer $idgrupo
     * @return mixed
     */
    public function actionBulkAddExpediente()
    {        
        $request = Yii::$app->request;
        $pks = $request->post('pks'); // Array or selected records primary keys
        foreach (Personalxgrupo::findAll(json_decode($pks)) as $model) {
            //$model->delete();


        }
        

       // if($request->isAjax){
            /*
            *   Process for ajax request
            */
         //   Yii::$app->response->format = Response::FORMAT_JSON;
          //  return ['forceClose'=>true,'forceReload'=>true]; 
        //}else{
            /*
            *   Process for non-ajax request
            */
          //  return $this->redirect(['index']);
        //}
       
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
