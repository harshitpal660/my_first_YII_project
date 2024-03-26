<?php

namespace app\controllers;

use app\components\SecurityHelper;
use app\models\Marks;
use app\models\MarksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
/**
 * MarksController implements the CRUD actions for Marks model.
 */
class MarksController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Marks models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MarksSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Marks model.
     * @param int $rno Rno
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($rno)
    {

        return $this->render('view', [
            'model' => $this->findModel(SecurityHelper::validateData($rno)),
        ]);
    }

    /**
     * Creates a new Marks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     * @param int $rno Rno
     */

    public function  actionCreates($rno)
    {
        $model = new Marks();
        $model->id = SecurityHelper::validateData($rno);

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if($model->validate()) {
                    if ($model->save()) {
                        return $this->redirect(['view', 'rno' => SecurityHelper::hashData($model->rno)]);
                    }
                }

            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionCreate()
    {
        $model = new Marks();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'rno' => $model->rno]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Marks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $rno Rno
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($rno)
    {
//

        $unhashed_rno = SecurityHelper::validateData($rno);
//        print_r($unhashed_rno ); die;
        $mapped_rno = Marks::find()->select('rno')->where(['id'=>$unhashed_rno])->one()->toArray();
//        print_r();die;
        $model = $this->findModel($mapped_rno);
//        print_r($model);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rno' => SecurityHelper::hashData($model->rno)]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Marks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $rno Rno
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($rno)
    {
        $this->findModel($rno)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Marks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $rno Rno
     * @return Marks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($rno)
    {
        if (($model = Marks::findOne(['rno' => $rno])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
