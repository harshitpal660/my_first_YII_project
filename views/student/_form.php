<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Student $model */ // StudentSearch changed to Student
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\StudentSearch $searchModel */
?>

<div class="student-update-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'category')->dropDownList(
        $searchModel->getCategoryFilter(),
        ['prompt' => 'Select Category']
    ) ?>

    <?= $form->field($model, 'mobile')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'gender')->dropDownList(
        $searchModel->getGenderFilter(),
        ['prompt' => 'Select Gender']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

