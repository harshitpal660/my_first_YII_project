<?php
//
//use yii\helpers\Html;
//use yii\widgets\DetailView;
//
///** @var yii\web\View $this */
///** @var app\models\MarksUpdate $model */
//
//$this->title = $model->rno;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Marks Updates'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
//?>
<!--<div class="marks-update-view">-->
<!---->
<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>-->
<!--        --><?php //= Html::a(Yii::t('app', 'Update'), ['update', 'rno' => $model->rno], ['class' => 'btn btn-primary']) ?>
<!--        --><?php //= Html::a(Yii::t('app', 'Delete'), ['delete', 'rno' => $model->rno], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
//                'method' => 'post',
//            ],
//        ]) ?>
<!--    </p>-->
<!---->
<!--    --><?php //= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'rno',
//            'id',
//            'english',
//            'maths',
//            'hindi',
//        ],
//    ]) ?>
<!---->
<!--</div>-->

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\models\Student $model */


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
//print_r(hash_id);
?>
<div class="student-view">

    <h1><?=Html::encode($this->title )?></h1>

    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => \app\components\SecurityHelper::hashData($model->id)], ['class' => 'btn btn-primary']) ?>
  <?php
        // Check if marks exist for the current student
        $marksExist = (new Query())
            ->from('marks')
            ->where(['id' => $model->id])
            ->exists();

        // Display either "Update Marks" or "Add Marks" button based on the existence of marks
        if ($marksExist) {
//            print_r($model->id);
            echo Html::a(Yii::t('app', 'Update Marks'), ['marks/update', 'rno' =>\app\components\SecurityHelper::hashData( $model->id)], ['class' => 'btn btn-success']);
        } else {
//            print_r($model->id); die;
            echo Html::a(Yii::t('app', 'Add Marks'), ['marks/creates', 'rno' => \app\components\SecurityHelper::hashData( $model->id)], ['class' => 'btn btn-success']);
        }
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'category',
            'mobile',
            'email:email',
            [
                'attribute'=> 'url',
                'format' => 'raw',
                'value' => function($model) {// Display the photo as an image
                    return Html::img(Url::to([$model->url],true), ['style' => 'width:100px;height:auto;']);
                },
            ],
//            [
//                'attribute'=>'imageFile',
//                'format'=>'html',
//                'value'=>function($model){
//                    return  !empty($model->imageFile) ? Html::img(Url::toRoute([$model->imageFile],true),
//                        ['width' => '70px']) : null;
//                    //   return !empty($model->imageFile)? Url::toRoute([$model->imageFile],true): null;
//                },
//            ],
        ],
    ]) ?>

</div>