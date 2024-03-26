
<?php

use yii\helpers\Html;
use app\models\StudentSearch;

/** @var yii\web\View $this */

/** @var app\models\Student $model */

$this->title = Yii::t('app', 'Create Student');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Student'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'searchModel' => new StudentSearch(),
    ]) ?>

</div>


