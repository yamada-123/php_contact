<?php
//配列に配列を追加する

$array = ['りんご','みかん'];

array_push($array, 'ぶどう', 'なし');

echo '<pre>';
var_dump($array);
echo '</pre>';


$postalCode = '123-4567';

//camelCase
function  checkPostalCode($str){
  $replaced = str_replace('-','',$str);
  $length = strlen($replaced);

  var_dump($length);
  if($length === 7){
    return true;
  }
  return false;
}

var_dump(checkPostalCode($postalCode));

//snakeCase
// check_postal_code()
?>