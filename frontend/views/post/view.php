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
    <?php echo $this->render('../../forms/comment_form') ?>
    <?php echo $this->render('../../widgets/views/reply_form') ?>
    <div class = "comments">
        <?= CommentWidget::widget(['post' => $model]); ?>
    </div>


</div>
