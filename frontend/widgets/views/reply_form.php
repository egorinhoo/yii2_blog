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

<div id="reply-form" class="post-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= Html::activeHiddenInput($modelComment,'parent_id',['value'=>0])?>
    <?= Html::activeHiddenInput($modelComment,'level',['value'=>0])?>
    <?= Html::activeHiddenInput($modelComment,'left_key',['value'=>1])?>
    <?= Html::activeHiddenInput($modelComment,'right_key',['value'=>2])?>
    <?= Html::activeHiddenInput($modelComment,'id',['value'=>1])?>
    <?= $form->field($modelComment, 'body')->textarea(['rows' => 2])->label('') ?>


    <div class="form-group">
        <?= Html::submitButton('Ответить', ['class' => 'btn btn-success', 'id' => 'reply-btn']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>