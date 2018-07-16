<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Post;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered my_table',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            [
                    'attribute' => 'body',
                    'value' => function(Post $post){
                        $text = $post->body;
                        $text_arr = explode(' ', $text);
                        $text = '';
                        foreach ($text_arr as $element) {
                            $text .= $element.' ';
                            if(strlen($text) > 90){
                                return $text.'...';
                            }
                        }
                        return $text;
                    },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
