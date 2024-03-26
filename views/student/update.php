<?php

use yii\helpers\Html;
use app\models\StudentSearch;
/** @var yii\web\View $this */
///** @var app\models\StudentSearch $model */
/**@var app\models\Student $model */
/**@var app\models\StudentSearch $searchModel */

$this->title = Yii::t('app', 'Update Student: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="student-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'searchModel'=>$searchModel,
    ]) ?>

</div>
