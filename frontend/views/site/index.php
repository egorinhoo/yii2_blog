<?php


use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use common\models\Post;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'MyBlog';

$dataProvider = new ActiveDataProvider([
        'query' => Post::find()->indexBy('id'),
        'pagination' => ['pageSize' => 20],
]);


?>
<div class="site-index">


    <div class="col-sm-8 post-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?= GridView::widget(['dataProvider' => $dataProvider, 'columns' => [
                'title',
            [
                    'attribute' => 'body',
                'contentOptions' => [
                    'style' => 'white-space: normal; max-width: 330px;'
                ]
],

            ['class' => 'yii\grid\ActionColumn'],
        ],]) ?>

    </div>
</div>
