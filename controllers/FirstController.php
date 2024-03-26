<?php
namespace app\controllers;

use yii\web\Controller;
use yii;
class FirstController extends Controller{
    public function actionIndex(){
        $data = yii::$app->db->createCommand("select * from student")->queryAll();
        print_r($data);
        echo "Index"; die;
    }

    public function actionAbout(){
        // To prevent basic layout to get render we have two options
        // Option1
        // $this->layout = false;
        // Option 2
        // return $this->renderPartial('test');

        // $response = [];
        // $response['name'] = 'Code Improve';
        // $response['list'] = ['Test','Demo','CRUD'];
        // return $this->render('test',$response);

        $response = [];
        $response['name'] = 'Code Improve';
        $response['list'] = ['Test','Demo','CRUD'];

        return $this->render('About', $response);

    }

    public function actionHome(){


        $response = [];
        $response['name'] = 'Code Improve';
        $response['list'] = ['Test','Demo','CRUD'];

        return $this->render('Home');

    }

    public function actionInfo(){
        $data = yii::$app->request->get();
        echo $data['key'];
        echo "<prev>";
        print_r($data);

        echo "Info Page"; die;

    }

    public function actionDemo(){
        $data = yii::$app->request->get();
        echo $data['key'];
        echo "<prev>";
        print_r($data);

        echo "Second Page"; die;

    }


    public function actionPass(){
        echo "Pass"; die;
    }
}