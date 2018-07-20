<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 17.07.18
 * Time: 12:07
 */

namespace frontend\services;

use common\models\Comment;
use Yii;

class CommentService
{
    public static function createCommentDefault($model, $id){
        $model->post_id = $id;
        $model->level = 0;
        $model->parent_id = 0;
        $model->left_key = 1;
        $model->right_key = 2;
        return $model;
    }
    public static function createCommentZeroLevel($model, $id){
        $model->left_key = Comment::find()->where('post_id ='.$id)->max('right_key') + 1;
        $model->right_key = $model->left_key+1;
        return $model;
    }
    public static function rewriteLeftRightKeys($left, $id){
        Yii::$app->db->createCommand('UPDATE comment SET left_key=left_key+2 WHERE left_key>'.$left.' AND post_id='.$id)
            ->execute();
        Yii::$app->db->createCommand('UPDATE comment SET right_key=right_key+2 WHERE right_key>='.$left.' AND post_id='.$id)
            ->execute();
    }
}