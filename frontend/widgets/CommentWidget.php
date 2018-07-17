<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 17.07.18
 * Time: 14:47
 */

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\Comment;
use common\models\Post;
use common\models\User;


class CommentWidget extends Widget
{
    public $comments;
    public $post;

    public function init()
    {
        parent::init();
        $this->comments = Comment::find()->where(['post_id' => $this->post->id])->all();
    }
    public function run()
    {
        echo Html::textInput('text');
        foreach ($this->comments as $comment) {
            $user = User::find()->where(['id' => $comment->user_id])->limit(1)->one();
            echo $this->render('comment', ['body' => $comment->body,
                'level' => $comment->level,
                'name' => $user->username,
                'date' => $comment->date]);
        }
    }


}
