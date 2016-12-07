<?php
// セッションを開始(セッション変数を利用できる)
session_start();

if(!isset($_SESSION["accid"])){	// ログインしているか確認
  header("Location: /login.php");
  exit();
}

echo "おめでとうございます。<br>";
echo $_SESSION["accid"]."さん<br>";
echo "ログイン成功です。";
/*
$id = mysqli_real_escape_string( $db, $_SESSION['accid']);

//下の2つの関数を使い、id_colが1の画像を表示する。
CallImg($id);


//指定したid_colを持つ画像を表示する関数
function CallImg($id_col_num){
	echo '<img src="'.ImgSearchDB($id_col_num).'">';
}

//データベースから、指定したid_colを持つimageファイルを検索する関数。
function ImgSearchDB($id_col_num){
	
	//指定したidのimgを検索
	$serch_query = mysqli_query($db,"SELECT * FROM `img_table` WHERE `name` ='".$id_col_num."'");
	$row = mysqli_fetch_array($serch_query);
	
	header( 'Content-Type: image/jpeg' );
	echo $row['img_col'];
	
	$close_flag = mysqli_close($db);
}*/

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>認証サンプル(認証成功後の画面)</title>
</head>
<body>
	<p><a href="/form/form.php">アップロード</a></p>
  <p><a href="logout.php">ログアウト</a></p>
</body>
</html>