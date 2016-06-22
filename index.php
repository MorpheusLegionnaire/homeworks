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

$ages = array ('1'=>'22', '2'=>'21');
$city = array ('1'=>'Kiev', '2'=>'Mariupol');
$neskolko = array($ages, $city);

print_r($neskolko);
echo "</pre>";


