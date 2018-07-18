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
    <?= Html::activeHiddenInput($modelComment,'parent_id',['value'=>0])?>
    <?= Html::activeHiddenInput($modelComment,'level',['value'=>0])?>
    <?= $form->field($modelComment, 'body')->textarea(['rows' => 3]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>