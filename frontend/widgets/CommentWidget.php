<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 17.07.18
 * Time: 14:47
 */

namespace frontend\widgets;

use yii\base\Widget;
use common\models\Comment;
use common\models\User;


class CommentWidget extends Widget
{
    public $comments = [];
    public $users = [];
    public $post;
    public function init()
    {
        parent::init();
        $comments = Comment::find()->where(['post_id' => $this->post->id])->with('user')->all();
        $count = 1;
        while($count < count($comments) * 2) {
            foreach ($comments as $comment) {
                if (gettype($comment) == 'User'){
                    $this->users[] = $comment;
                }
                if ($comment->left_key == $count) {
                    $this->comments[] = $comment;
                    break;
                }
            }
            $count++;
        }

    }
    public function run()
    {
            foreach ($this->comments as $comment) {

                if(isset($comment->user_id)) {
                    $name = $comment->user->username;
                }
                else
                    $name = 'Guest';
                echo $this->render('comment', ['body' => $comment->body,
                    'level' => $comment->level,
                    'name' => $name,
                    'date' => $comment->date,
                    'id' => $comment->id,
                    'post_id' => $comment->post_id,
                    'left_key' => $comment->left_key,
                    'right_key' => $comment->right_key,
                    'user_id' => $comment->user_id]);

            }
    }


}
