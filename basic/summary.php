<!--
    PHP 概述
-->

<?php
echo "我在 php 开始标记和结束标记之间";
echo "<br />";
?>

<?php if (time() % 2 == 0): ?>
    我是 html（用于演示 php 和 html 混编）
    <br />
<?php else: ?>
    这里是 html（用于演示 php 和 html 混编）
    <br />
<?php endif; ?>


<?php
echo "可以没有 php 结束标记";
echo "<br />";