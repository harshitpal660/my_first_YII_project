<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Marks $model */

//print_r($model->student);
//die;
$this->title = isset($model->student) ? $model->student->name : 'N/A';
//print_r($this->title);
//die;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Marks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="marks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'rno' =>\app\components\SecurityHelper::hashData($model->id)], ['class' => 'btn btn-primary']) ?>
<!--        --><?php //= Html::a(Yii::t('app', 'Delete'), ['delete', 'rno' => $model->rno], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'Student Name',
                'value' => isset($model->student) ? $model->student->name : 'N/A',
            ],
            'id',
            'english',
            'maths',
            'hindi',
        ],
    ]) ?>

</div>
