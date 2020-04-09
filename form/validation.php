<?php

function validation($data){

  $error = [];

  //名前(姓)
  if (empty($data['your_name1']) || 20 < mb_strlen($data['your_name'])){
    $error[] = '「名前(姓)」は20文字以内で入力してください。';
  }

  //名前(名)
  if (empty($data['your_name2']) || 20 < mb_strlen($data['your_name'])){
    $error[] = '「名前(名)」は20文字以内で入力してください。';
  }

  //フリガナ(セイ)
  if (empty($data['your_name3']) || 20 < mb_strlen($data['your_name'])){
    $error[] = '「フリガナ(セイ)」は20文字以内で入力してください。';
  }

  //フリガナ(メイ)
  if (empty($data['your_name4']) || 20 < mb_strlen($data['your_name'])){
    $error[] = '「フリガナ(メイ)」は20文字以内で入力してください。';
  }

  //電話番号(正規表現)
  if (empty($data['phone'])  || !preg_match("/^\d{9,11}$/",$data['phone'])){
    $error[] = 'ハイフンなしの(9~11桁)の電話番号を入力してください。';
  }

  //メールアドレス
  if(empty($data['email1']) || !filter_var($data['email1'], FILTER_VALIDATE_EMAIL) ){
    $error[] = '「メールアドレス」は正しい形式で入力してください。';
  }

  //メールドレス(確認用)
  if(empty($data['email2']) || !filter_var($data['email2'], FILTER_VALIDATE_EMAIL)){
    $error[] = '「メールアドレス(確認用)」は正しい形式で入力してください。';
  }

  //メールアドレスの一致
  if($data['email1'] != $data['email2']) {
    $error[] = '「同じメールアドレスを入力してください」';
  }


  //性別
  if(!isset($data['gender'])){
    $error[] = '「性別」は必ず入力してください。';
  }


  //お問い合わせ内容
  if (empty($data['contact']) || 200 < mb_strlen($data['contact'])){
    $error[] = '「お問い合わせ内容」は200文字以内で入力してください。';
  }
  
  return $error;
}
