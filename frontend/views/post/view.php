<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <div class = "post">
        <h1 style = "display: inline-block; margin: 20px 40%;" ><?= Html::encode($this->title) ?></h1>
        <p style = "width: 80%; margin: 0 8%;"> <?= $model->body; ?> </p>
        <hr>
    </div>
    <div class = "comments">
        
    </div>


</div>
