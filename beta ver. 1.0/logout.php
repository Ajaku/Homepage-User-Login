<?php
session_start();
$_SESSION = array();	// セッション変数を初期化

// クッキーを使っている場合はセッションクッキーも削除
if(ini_get("session.use_cookies")){
  $params = session_get_cookie_params();
  setcookie(
    session_name(),       // セッション名
    '',                   // 値を空に
    time() - 42000,       // 有効期限を過去に(結果的に削除)
    $params["path"],      // 情報が保存されている場所のパス
    $params["domain"],    // クッキーのドメイン
    $params["secure"],    // セキュアな接続でのみ送信する
    $params["httponly"]   // HTTP を通してのみアクセス可能
  );
}
session_destroy();	// セッションを破棄
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>認証サンプル(ログアウト画面)</title>
</head>
<body>
  <p>ログアウトされました</p>
  <p><a href="login.php">ログイン画面へ</a></p>
</body>
</html>