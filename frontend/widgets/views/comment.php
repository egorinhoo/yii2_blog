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
$margin = 10 + 5 * $level;
?>
<div class="comment" style="margin-left:<?= $margin; ?>%;">
    <p id="comment-name"><?php echo $name ?></p>
    <p id="comment-date"><?php echo $date ?></p>
    <p id="comment-body"><?php echo $body ?> </p>

</div>