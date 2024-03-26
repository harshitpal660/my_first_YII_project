<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use app\assets\TestAsset;

TestAsset::register($this);
$this->title = 'Home';
$this->params['breadcrumbs'][] = $this->title;
//echo $name;
//echo "<prev>"; print_r($list);

Yii::$app->view->registerMetaTag([
        'title'=>'Home',
        'content' => 'Home'
]);
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        Home Page :
    </p>

<!--    <code>--><?php //= __FILE__ ?><!--</code>-->
</div>
