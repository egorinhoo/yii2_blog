<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 16.07.18
 * Time: 15:48
 */

namespace common\widgets;


use yii\base\Widget;
use yii\helpers\Html;
use common\models\Comment;
use common\models\Post;

class BlogWidget extends Widget
{
    public $post;
    public $message;
    public function init()
    {
        $this->message = 'Hello world';
        parent::init();
    }
    public function run()
    {
        return Html::encode($this->message);
    }
}