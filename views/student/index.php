<?php

use app\models\Student;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\components\SecurityHelper;

/** @var yii\web\View $this */
/** @var app\models\StudentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?= Html::a('Create Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            [
                'attribute' => 'category',
                'filter' => $searchModel->getCategoryFilter(),
            ],
            'mobile',
            'email:email',
            [
                'attribute' => 'gender',
                'filter' => $searchModel->getGenderFilter(),
            ],
            'url',
            [
                'class' => ActionColumn::className(),
                'header' => "Action",
                'template'=>'{view}{update}',
                'urlCreator' => function ($action, Student $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' =>
                       SecurityHelper::hashData($model->id)]);
                }
            ],
        ],
    ]); ?>


</div>
