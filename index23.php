<?php
//文字列の長さ
// マルチバイト
// 日本語 UTF-8 3~6バイトある一文字につき

$text = 'あいうえお';

// echo strlen($text);

echo mb_strlen($text); //文字列の長さを得る


//文字列の置換

$str = '文字列を置換します';

echo str_replace('置換','ちかん',$str);

//指定文字列で分割

$str_2 = '指定文字列で、分割します';

echo '<pre>';
var_dump(explode('、' , $str_2));
echo '</pre>'

//implode 文字列をくっつける

//正規表現



?>