<?php

use app\models\Marks;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MarksSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Marks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marks-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?php //= Html::a(Yii::t('app', 'Create Marks'), ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?php   ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'rno',
            'id',
//            'name'=>Marks::getStudentNameById('id'),
            [
                'attribute' => 'Name',
                'value' => function ($model) {
                    return $model->student->name; // Assuming you have defined the relation in the Marks model as 'student'
                },
                'filter' => Html::activeTextInput($searchModel, 'name', ['class' => 'form-control']),

            ],

            'english',
            'maths',
            'hindi',
            [

                'class' => ActionColumn::className(),
                'header' => "Action",
                'template'=>'{view} {update}',
                'urlCreator' => function ($action, Marks $model, $key, $index, $column) {
                    if($action=='update'){
                        return Url::toRoute([$action, 'rno' =>\app\components\SecurityHelper::hashData( $model->id)]);
                    }
                    return Url::toRoute([$action, 'rno' =>\app\components\SecurityHelper::hashData( $model->rno)]);
                 }
            ],
        ],

    ]); ?>


</div>
