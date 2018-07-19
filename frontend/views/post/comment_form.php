<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 18.07.18
 * Time: 11:52
 */

use common\models\Comment;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$modelComment = new Comment();
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['id' => 'create_comment']); ?>
    <?= $form->field($modelComment, 'body')->textarea(['rows' => 3]) ?>


    <div class="form-group">
        <?= Html::submitButton('Оставить комментарий', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>