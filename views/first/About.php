<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use app\assets\TestAsset;

TestAsset::register($this);
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
//echo $name;
//echo "<prev>"; print_r($list);

Yii::$app->view->registerMetaTag([
    'title'=>'About',
    'content' => 'About'
]);
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        This is About Page :
    </p>

    <!--    <code>--><?php //= __FILE__ ?><!--</code>-->
</div>
