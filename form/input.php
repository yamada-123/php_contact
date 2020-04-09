<?php
session_start();

require 'validation.php';

header('X-FRAME-OPTIONS:DENY');
//クリックジャッキング対策
//cssでボタンを透明にされたりするための対策

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
//javascriptに対する攻撃を防ぐ(XSS)



// echo $_POST['name'];
//スーパーグローバル変数 
//連想配列のこと


//入力、確認、完了 input.php,confirm.php,thanks.php
//CSRF 偽物のinput2.phpを表示する(パスワードを抜かれたりもする)
//input2.php



$pageFlag = 0;
$error = validation($_POST);


if (!empty($_POST['btn_confirm']) && empty($error)){
  $pageFlag = 1; //エラーメッセージが空なら確認画面に移行する
}

if (!empty($_POST['btn_submit'])){
  $pageFlag = 2;
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
<body>






<?php if($pageFlag == 0) : ?>
<?php
if(!isset($_SESSION['csrfToken'])){
  $csrfToken = bin2hex(random_bytes(32));
  $_SESSION['$csrfToken'] = $csrfToken;
}
$token = $_SESSION['csrfToken'];
?>
<!-- 後にこのtokenを確認画面に移行するときに送ってあげる -->

<?php if(!empty($_POST['btn_confirm']) && !empty($error)) :?>
<ul>
<?php foreach($error as $value): ?>
<li><?php echo $value; ?></li>
<?php endforeach ?>
</ul>
<?php endif ;?>
<!-- エラー文の繰り返し表示 -->

<div class = "container">
<div class = "row">
  <div class="col-md-6">
    <form method="POST" action="input.php">

    <div class = "form-group">
      <label for="your_name1">名前(姓)</label>
      <input type = "text" class="form-control" id="your_name1"  name="your_name1" value=<?php echo h($_POST['your_name1']) ; ?>></input>
      <br>
    </div>
  
    <div class = "form-group">
      <label for="your_name2">名前(名)</label>
      <input type = "text" class="form-control" name="your_name2" id = "your_name2" value=<?php echo h($_POST['your_name2']) ; ?>></input>
      <br>
    </div>

    <div class = "form-group">
      <label for="your_name3">フリガナ(セイ)</label>
      <input type = "text"  class="form-control" name="your_name3" id = "your_name3" value=<?php echo h($_POST['your_name3']) ; ?>></input>
      <br>
    </div>

    <div class = "form-group">
      <label for="your_name4">フリガナ(メイ)</label>
      <input type = "text" class="form-control" name="your_name4" id = "your_name4" value=<?php echo h($_POST['your_name4']) ; ?>></input>
      <br>
    </div>

    <div class = "form-group">
      <label for="phone">電話番号</label>
      <input type = "text" class="form-control" name="phone" id = "phone" value=<?php echo h($_POST['phone']) ; ?>></input>
      <br>
    </div>

    <div class = "form-group">
      <label for="email1">メールアドレス</label>
      <input type = "email" class="form-control" name="email1" id = "email1" value=<?php echo h($_POST['email1']) ; ?>></input>
      <br>
    </div>

    <div class = "form-group">
      <label for="email1">メールアドレス(確認用)</label>
      <input type = "email" class="form-control" name="email2" id = "email2" value=<?php echo h($_POST['email2']) ; ?>></input>
      <br>
    </div>

性別
<br>
<input type="radio"  name="gender" value="0">男性</input>
<input type="radio"  name="gender" value="1">女性</input>
<br>
<br>
<br>

年齢
<select class="form-control">
  <option value="1">~19歳</option>
  <option value="2">20歳~29歳</option>
  <option value="3">30歳~39歳</option>
  <option value="4">40歳~49歳</option>
  <option value="5">50歳~59歳</option>
  <option value="6">60歳~</option>
</select>
<br>


    <div class = "form-group">
      <label for="contact">お問い合わせ内容</label>
      <textarea class = "form-control" id = "contact" row="3"  class="form-control" name="contact"   value=<?php echo h($_POST['contact']) ; ?>></textarea>
      <br>
    </div>

<input type = "submit" name="btn_confirm" value="確認する">
<input type= "hidden" name="csrf" value="<?php echo $token ?>">

</div>

</form>

<?php endif; ?>







<?php if($pageFlag == 1) : ?>
<?php if($_POST['csrf'] == $_SESSION['csrfToken']) : ?>

<form method = "POST" action="input.php">
名前(姓)
<?php echo h($_POST['your_name1']) ; ?>
<br>

名前(名)
<?php echo h($_POST['your_name2']) ; ?>
<br>

フリガナ(セイ)
<?php echo h($_POST['your_name3']) ; ?>
<br>

フリガナ(メイ)
<?php echo h($_POST['your_name4']) ; ?>
<br>

電話番号
<?php echo h($_POST['phone']) ; ?>
<br>

メールアドレス
<?php echo h($_POST['email1']) ; ?>
<br>

メールアドレス(確認用)
<?php echo h($_POST['email2']) ; ?>
<br>

性別
<?php if($_POST['gender'] === '0'){echo '男性';}
      if($_POST['gender'] === '1'){echo '女性';}
?>
<br>

年齢
<?php if($_POST['age'] === '1'){echo '〜19歳';}
elseif($_POST['age'] === '2'){echo '20歳〜29歳';}
elseif($_POST['age'] === '3'){echo '30歳〜39歳';}
elseif($_POST['age'] === '4'){echo '40歳〜49歳';}
elseif($_POST['age'] === '5'){echo '50歳〜59歳';}
elseif($_POST['age'] === '6'){echo '60歳〜';}
?>
<br>

お問い合わせ内容
<?php echo h($_POST['contact']) ; ?>
<br>




<input type="submit" name="back" value = "戻る">
<input type = "submit" name="btn_submit" value="送信する">
<input type = "hidden" name="your_name1" value="<?php echo h($_POST['your_name1']) ; ?>">
<input type = "hidden" name="your_name2" value="<?php echo h($_POST['your_name2']) ; ?>">
<input type = "hidden" name="your_name3" value="<?php echo h($_POST['your_name3']) ; ?>">
<input type = "hidden" name="your_name4" value="<?php echo h($_POST['your_name4']) ; ?>">
<input type = "hidden" name="email1" value = "<?php echo h($_POST['email1']) ; ?>"
<input type = "hidden" name="email2" value = "<?php echo h($_POST['email2']) ; ?>"
<input type="hidden" name="gender" value="<?php echo h($_POST['gender']) ; ?>">
<input type="hidden" name="age" value="<?php echo h($_POST['age']) ; ?>">
<input type="hidden" name="contact" value="<?php echo h($_POST['contact']) ; ?>">
<input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']); ?>">


</form>

<?php endif; ?>
<?php endif; ?>





<?php if($pageFlag == 2) : ?>
  <?php if($_POST['csrf'] == $_SESSION['csrfToken']) : ?>
送信完了!!
<?php endif; ?>
  <?php endif; ?>
<?php unset($_SESSION['csrfToken']); ?>


</form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>