<?php

$globalVariable = "グローバル変数です";

function checkScope($str){
  $localVariable = "ローカル変数です";
  echo $localVariable;
  echo $str;
}

echo $globalVariable;
// echo $localVariable;

checkScope($globalVariable);

?>