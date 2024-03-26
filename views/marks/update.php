<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Marks $model */

$this->title = isset($model->student) ? $model->student->name : 'N/A';

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Marks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'rno' => $model->rno]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="marks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
