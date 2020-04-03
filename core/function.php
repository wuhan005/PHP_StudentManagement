<?php
/**
 * function.php
 *
 * Created in 2020/4/3 5:38 下午
 * Created by johnwu
 */

// Template functions

function __(string $text)
{
    echo(htmlspecialchars($text));
}