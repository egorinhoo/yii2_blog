<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 17.07.18
 * Time: 15:39
 */

$level;
$body;
$name;
$date;
$id;
$post_id;
$margin = 10 + 5 * $level;
?>
<div class="comment" style="margin-left:<?= $margin; ?>%;">
    <p id="comment-name"><?php echo $name ?></p>
    <p id="comment-date"><?php echo $date ?></p>
    <p id="comment-body"><?php echo $body ?> </p>
    <p id="comment-reply"><a href=# class="ajax_link"
                             data-parent="<?= $id?>"
                             data-level="<?= $level+1?>"
                             >Ответить</a></p>
    <!— Подключаем jquery с сервера Яндекса —>
    <script type="text/javascript" src="http://yandex.st/jquery/1.7.1/jquery.min.js"></script>
        <!— Наш скрипт запроса и обработки —>
        <script type="text/javascript">
            $(document).ready(function() {
// Вешаем обработчик события "клик" на все ссылки с классом ajax_link
                $('a.ajax_link').click(function() {
// Берем действие из атрибута data-action ссылки
                    var parent = $(this).data('parent');
                    var level = $(this).data('level');
// query append
                    $('#comment-parent_id').val(parent);
                    $('#comment-level').val(level);
                })
            })
        </script>
</div>