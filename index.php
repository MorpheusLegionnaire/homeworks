<?php
/**
 * Created by PhpStorm.
 * User: M0rpheus
 * Date: 22.06.2016
 * Time: 16:26
 */
echo "<pre>";
echo "Hello lalka"."<br><br>";

$firstArray['razRaz']='Znachenie1';
echo"<br><br>";
print_r($firstArray);

$twoArray['razRaz1']['DvaDva']="MnogomerniyMassiv";

print_r($twoArray);

$age = array ('1'=>'22', '2'=>'21');
$city = array ('1'=>'Kiev', '2'=>'Berlin');
$neskolko = array($age, $city);

print_r($neskolko);



define ('pi', 3.14);

echo pi;
echo "<br>";

$firstVariable = "secondVariable";
$secondVariable = "the value of the second variable";

echo $$firstVariable;
echo "<br>";
echo $firstVariable;


echo "<br><br>";

$x = & $z;

$x = 32;
$z++;

echo $x;
echo "<br><br>";

$square000 = "верхний левый угол; правый верхний угол; нижний левый угол; правый нижний угол";
$square001 = explode("; ", $square000);

print_r($square001);

$arrayNotImplode = array('Name', 'Surname', 'Age', 'Phone', 'email');
$arrayImplode = implode(", ", $arrayNotImplode);
echo "<br>";
echo $arrayImplode;

$abc =& $def;

$abc = 100;
$def += 15;
echo $abc;
$string001 = 2.25;

settype($abc, 'array');

print_r($abc);

settype ($string001, 'integer');

echo $string001;
echo "<br><br>";
settype ($arrayNotImplode, 'float');

echo $arrayNotImplode;
echo "<br><br>";

$newArr['one'] = 'Odin';
$newArr['two'] = 'Dva';
$newArr['three'] = 'Tri';
$newArr['four'] = 'Chetiri';
$newArr['five'] = 'Pyat\'';

print_r($newArr);

$newNewArr = serialize($newArr);

echo $newNewArr."<br><br>";

$unserArr = unserialize($newNewArr);

print_r($unserArr);




echo "</pre>";