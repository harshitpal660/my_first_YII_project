<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Marks $model */
/** /@var app\models\Student $model2 */
/** @var yii\widgets\ActiveForm $form */
?>

<?php
//print_r($model->rno);
//die;
?>
<div class="marks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'english')->textInput() ?>

    <?= $form->field($model, 'maths')->textInput() ?>

    <?= $form->field($model, 'hindi')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
