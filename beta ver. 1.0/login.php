<?php
require('dbconnect.php');

session_start();

if(!empty($_POST)){
  //ログインの処理
  if($_POST['id'] != '' && $_POST['pass'] != ''){
    $sql = sprintf('SELECT * FROM users WHERE id="%s" AND pass="%s"',
      mysqli_real_escape_string($db, $_POST['id']),
      mysqli_real_escape_string($db, sha1($_POST['pass']))
    );
    $record = mysqli_query($db, $sql) or die(mysqli_error($db));
    $id = $_REQUEST["id"];
    if($table = mysqli_fetch_assoc($record)){
     // 認証成功
    session_regenerate_id(true);    // 念のためセッションIDを変更
    $_SESSION["accid"] = $id;
    $_SESSION["code"] = "10001";
    header("Location: ./hoge.php"); // 指定のページに移動
    exit();
    }else{
      $error['login'] = 'failed';
    }
  }else{
    $error['login'] = 'blank';
  }
}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>ログイン</title>
  </head>
  <body>
  	<p>メールアドレスとパスワードを記入してログインしてください。</p>
  	<p>入会手続きがまだの方はこちらからどうぞ。</p>
  	<p>&raquo;<a href="test/">入会手続きをする</a></p>
  	<form action="" method="post">
<dl>
  <dt>アカウントID</dt>
  <dd>
    <input type="text" name="id" size="35" maxlength="255"
        value="<?php echo htmlspecialchars($_POST['id']); ?>">
    <?php if(!empty($error['login']) && $error['login'] == 'blank'): ?>
      <p><font color="red">* アカウントIDとパスワードをご記入ください</font></p>
    <?php endif; ?>
    <?php if(!empty($error['login']) && $error['login'] == 'failed'): ?>
      <p><font color="red">* ログインに失敗しました。正しくご記入ください。</font></p>
    <?php endif; ?>
  </dd>
  <dt>パスワード</dt>
  <dd>
    <input type="password" name="pass" size="35" maxlength="255"
        value="<?php echo htmlspecialchars($_POST['pass']); ?>">
  </dd>
</dl>
  		<input type="submit" value="ログインする">
  	</form>
  </body>
</html>