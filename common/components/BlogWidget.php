<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 16.07.18
 * Time: 15:48
 */

namespace common\components;


use yii\base\Widget;
use yii\helpers\Html;

class BlogWidget extends Widget
{
    public $message;
    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }
    }
    public function run()
    {
        return Html::encode($this->message);
    }
}