<?php
//
//use yii\helpers\Html;
//use yii\widgets\ActiveForm;
//
///** @var yii\web\View $this */
///** @var app\models\update $model */
///** @var yii\widgets\ActiveForm $form */
//?>
<!---->
<!--<div class="marks-update-search">-->
<!---->
<!--    --><?php //$form = ActiveForm::begin([
//        'action' => ['index'],
//        'method' => 'get',
//    ]); ?>
<!---->
<!--    --><?php //= $form->field($model, 'rno') ?>
<!---->
<!--    --><?php //= $form->field($model, 'id') ?>
<!---->
<!--    --><?php //= $form->field($model, 'english') ?>
<!---->
<!--    --><?php //= $form->field($model, 'maths') ?>
<!---->
<!--    --><?php //= $form->field($model, 'hindi') ?>
<!---->
<!--    <div class="form-group">-->
<!--        --><?php //= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
<!--        --><?php //= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
<!--    </div>-->
<!---->
<!--    --><?php //ActiveForm::end(); ?>
<!---->
<!--</div>-->

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\StudentSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="student-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'mobile') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'createdAt') ?>

    <?php // echo $form->field($model, 'updatedAt') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
