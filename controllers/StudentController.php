<?php

namespace app\controllers;

//use app\models\MarksUpdate;
use app\components\SecurityHelper;
use app\models\Student;
use app\models\StudentSearch;
//use app\models\update;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
/**
 * StudentController implements the CRUD actions for MarksUpdate model.
 */
class StudentController extends Controller
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
     * Lists all MarksUpdate models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MarksUpdate model.
     * @param int $id Rno
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id){
        $new_id = SecurityHelper::validateData($id);
        return $this->render('view', [
            'model' => $this->findModel($new_id)
        ]);
    }

    /**
     * Creates a new MarksUpdate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Student(); // Assuming Student is your model
        $searchModel = new StudentSearch(); // Assuming StudentSearch is your search model

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $new_id = SecurityHelper::hashData($model->id);
            return $this->redirect(['view', 'id' => $new_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'searchModel' => $searchModel, // Pass the $searchModel variable to the view
        ]);
    }

    /**
     * Updates an existing MarksUpdate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id Rno
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $new_id = SecurityHelper::validateData($id);
        $model = $this->findModel($new_id);
        $searchModel = new StudentSearch();
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('update', [
            'model' => $model,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Deletes an existing MarksUpdate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id Rno
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MarksUpdate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id Rno
     * @return MarksUpdate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StudentSearch::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
