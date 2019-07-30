<?php
  $host = "mysql464.db.sakura.ne.jp";
  $user = "hermessystems";
  $pass = "HI9_234W8pH9";
  $db = "hermessystems_upload_tsutatsu";


 // 引数を格納する
  $shown_check = $_POST['C_STATUS'];
  $id_check= $_POST['C_BUTTON'];
  $delete_check= $_POST['C_DELETE'];
  $link = new PDO("mysql:dbname=$db;host=$host",$user,$pass);

  //エンコード
  $link->query('SET NAMES utf8');

  // クエリを送信する
  $sql = "SELECT* FROM t_info WHERE info_id= ?";
  $stmt = $link->prepare($sql);
  $stmt->execute(array($id_check));

   // 値を配列として取得
  $row = $stmt->fetch();
 
  //エンコード
  $link->query('SET NAMES utf8');
 
  // 表示/不表示の値を入れ替える
  if ($delete_check == "1"){
	$sql = "UPDATE t_info SET comments = 1 WHERE info_id = ?";
	$stmt = $link->prepare($sql);
	$stmt->execute(array($id_check));
 }else{
  if($shown_check == "on"){
	$sql = "UPDATE t_info SET shown = 0 WHERE info_id = ?";
	$stmt = $link->prepare($sql);
	$stmt->execute(array($id_check));
  }else{
	$sql = "UPDATE t_info SET shown = 1 WHERE info_id = ?";
	$stmt = $link->prepare($sql);
	$stmt->execute(array($id_check));
}}
?>	    
<?php
	// PDOを閉じる
	$stmt->closeCursor();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
   <body>

	<font size="4">通達の情報を更新しました。</font>
	<div align="left"><br/>
　　　　    <input TYPE="button" onClick= "location.href='./test_tsutatsu_edit.php'" VALUE="OK">
	</div>
  </body>
</html>
