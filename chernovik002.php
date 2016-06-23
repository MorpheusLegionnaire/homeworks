<?php

$a = 33;
$b = 34;

if ($a != $b)
{
    if ($a == $b)
    {
        echo 'Вложенный if else рабочий';
    }
    elseif($a < $b)
    {
        echo 'elseif работает';
    }
}
else
{
    echo 'It\'s false';
}