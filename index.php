<!DOCTYPE html>

<head></head>
<body>

<?php 

// $array_1 = [1,2,3];

// $array_2 = [
//   ['赤','青','黄'],
//   ['緑','紫','黒']
// ];
// echo '<pre>';

// var_dump($array_2);
// echo'</pre>';

// echo $array_2[1][1];


// $array_member = [
//   'name' => '本田',
//   'height' => 170,
//   'hobby' => 'サッカー'
// ];

// echo $array_member['hobby'];

// echo '<pre>';
// var_dump($array_member);
// '</pre>';

// $array_member_2 = [
//   '本田'=> [
//     'height' => 170,
//     'hobby' => 'サッカー'
//   ],
//   '香川'=> [
//     'height' => 165,
//     'hobby' => 'サッカー'
//   ]
// ];

// echo $array_member_2['香川']['height'];

// $array_member_3 = [
//   '1kumi' => [
//     '本田' =>[
//       'height' => 170,
//       'hobby' => 'サッカー'
//     ],
//     '香川' => [
//       'height' => 165,
//       'hobby' => 'サッカー'
//     ]
//   ],

//   '2kumi' => [
//     '長友' => [
//       'height' => 160,
//       'hobby' => 'サッカー'
//     ], 
//     '乾' => [
//       'height' => 168,
//       'hobby' => 'サッカー'
//     ]
//   ]
//   ];

//   echo '<pre>';
//   echo $array_member_3['2kumi']['長友']['height'];
//   echo '</pre>';

// $height = 90;

// if($height === 91){
//   echo '身長は' . $height . 'cmです';
// }else{
//   echo '身長は' . $height . 'cmではありません';
// }

// echo '<br>';
// $signal = 'blue';


// if($signal === 'red'){
//   echo 'とまれ';
// }else if($signal === 'yellow'){
//   echo '一旦停止';
// }else{
//   echo '進め';
// }

// echo '<br>';
// $speed = 80;

// if ($signal == 'blue'){
//   if ($speed >= 80){
//     echo 'スピード違反';
//   }
// }

// $test = '1';//文字

// if(empty($test)){
//   echo '変数は空です';
// }else{
//   echo '変数は空ではありません';
// }

// $signal_1 = 'red';
// $signal_2 = 'blue';

// if($signal_1 === 'red' && $signal_2 === 'blue'){
//   echo '赤と青です';
// }

// $math = 80;

// $comment = $math > 80 ? 'good' : 'not good';
// echo '<br>';
// echo $comment;


// $members = [
//   'name' => '本田',
//   'height' => 170,
//   'hobby' => 'サッカー'
// ];
// //バリューのみ表示
// foreach($members as $member){
//   echo $member;
// }
// echo '<br>';
// //キーとバリューそれぞれ表示
// foreach($members as $key => $value){
//   echo $key . 'は'  . $value . 'です';
// }

// $members_2 = [
//   '本田' => [
//     'height' => 170,
//     'hobby' => 'サッカー'
//   ],
//   '香川' => [
//     'height' => 165,
//     'hobby' => 'サッカー'
//   ]
//   ];

//   echo '<br>';

//   //多段階の配列を展開する
//   foreach($members_2 as $member_1){
//     foreach($member_1 as $member => $value){
//     echo $member . 'は' . $value . 'です';
//     }
//   }


// for($i = 0; $i < 10; $i++ ){
//   if ($i == 5){
//     //break;
//     continue;
//   }

//   echo $i;
// }

// echo '<br>';

// $j = 0;
// while($j < 5){
//   echo $j;
//   $j++;
// }

$data = 1;



switch($data){
  case 1:
    echo '1です';
 break;
  case 2:
    echo '2です';
  break;
  case 3:
    echo '3です';
  break;
  default:
    echo '1~3ではありません';
}

?>





</body>