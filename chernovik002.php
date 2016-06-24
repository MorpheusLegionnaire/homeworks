<?php

$a = 33;
$b = 34;

if ($a != $b)
{
    if ($a == $b)
    {
        echo 'Вложенный if else рабочий'."<br><br>";
    }
    elseif($a < $b)
    {
        echo 'elseif работает'."<br><br>";
    }
}
else
{
    echo 'It\'s false'."<br><br>";
}

$res001 = 55>44 ? 'Работает' : 'Не работает'."<br><br>";

$res002 = $a > $b;

echo $res001;