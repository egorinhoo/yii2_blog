<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 17.07.18
 * Time: 15:39
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$level;
$body;
$name;
$date;
$id;
$post_id;
$user_id;
$margin = 10 + 5 * $level;
$left_key;
$right_key;
?>
<div class="comment" style="margin-left:<?= $margin; ?>%;">
    <div id="comment-name"><?php echo $name ?></div>
    <div id="comment-date"><?php echo $date ?></div>
    <div id="comment-body"><?php echo $body ?> </div>
    <div id="comment-reply"><a class="ajax_link link<?=$id?>"
                               data-parent="<?= $id?>"
                               data-level="<?= $level+1?>"
                               data-left_key="<?= $right_key?>"
                               data-right_key="<?= $right_key+1?>"
        >Ответить</a>
    </div>
    <div id="comment-delete"><a class="delete_link delete<?=$id?>">Удалить</a></div>
    <div id="append<?=$id?>"></div>
    <div style="clear:both;"></div>
</div>
<!— Подключаем jquery с сервера Яндекса —>
<script type="text/javascript" src="http://yandex.st/jquery/1.7.1/jquery.min.js"></script>
<!— Наш скрипт запроса и обработки —>
<script type="text/javascript">
    $(document).ready(function() {
        $('a.delete_link').click(function () {

        })
// Вешаем обработчик события "клик" на все ссылки с классом ajax_link
        $('a.ajax_link').click(function() {
// Берем действие из атрибута data-action ссылки
            var parent = $(this).data('parent');
            var level = $(this).data('level');
            var left_key = $(this).data('left_key');
            var right_key = $(this).data('right_key');
// query append
            $('#comment-parent_id').val(parent);
            $('#comment-level').val(level);
            $('#comment-left_key').val(left_key);
            $('#comment-right_key').val(right_key);
            $('.ajax_link').css('display', 'block');
            $('.link'+parent).css('display', 'none');
            var $form = $("#reply-form").css('display', 'block');
            $('#append'+parent).append($form);
        })
    })
</script>
