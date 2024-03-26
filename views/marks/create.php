<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Marks $model */
/** /@var app\models\Student $model2 */

$this->title = Yii::t('app', 'Create Marks');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Marks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="marks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
