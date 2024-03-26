<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MarksSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="marks-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'rno') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'english') ?>

    <?= $form->field($model, 'maths') ?>

    <?= $form->field($model, 'hindi') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
