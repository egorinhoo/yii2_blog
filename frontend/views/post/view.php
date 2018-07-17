<?php

use yii\helpers\Html;
use frontend\widgets\CommentWidget;


/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <div class = "post">
        <h1 style = ""><?= Html::encode($this->title) ?></h1>
        <p> <?= $model->body; ?> </p>
        <hr>
    </div>
    <div class = "comments">
        <?php
            echo CommentWidget::widget(['post' => $model]);
        ?>
    </div>


</div>
