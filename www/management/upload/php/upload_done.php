<?php
$uploaddir = '../../doc/tsutatsu/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

// タイトル記述確認
$title = $_POST["targetText"];
if ($title != "" && $title != null) {
	// ファイル存在チェック
	if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
	
	    // ファイルのリネーム
	    list($file_name,$file_type) = explode(".",$_FILES['userfile']['name']);
	    $datetime=date("YmdHis");
	    $uploadfile = "$uploaddir$datetime.$file_type";
	    
		if($file_type == "pdf"){
			// アップロード
			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {

			// DB情報書き込み
			// DB情報取得
			$host = "mysql464.db.sakura.ne.jp";
			$user = "hermessystems";
			$pass = "HI9_234W8pH9";
			$db = "hermessystems_upload_tsutatsu";
			$table = "t_info";

			// DBへ接続する
			$info_id= $_GET['info_id'];
			$link = new PDO("mysql:dbname=$db;host=$host",$user,$pass);
			
			//最新ID番号取得
			$insert_id = $link->lastInsertId();

			//エンコード
			$link->query('SET NAMES utf8');

			// クエリを送信しDBに新情報書き込み
			$sql = "INSERT INTO $db.$table (info_id, info_title, info_date, shown, newicon, comments)
				VALUES(?,?,?,?,?,?)";
			$stmt = $link->prepare($sql);
			$stmt->execute(array($insert_id,$title,date("Y/m/d H:i:s",strtotime($datetime)),0,0,""));

			// DBを閉じる
			$stmt->closeCursor();
			echo "通達のアップロードが完了しました。\n";
			} else {
				echo "アップロード時に何らかの異常がありました。\n";
			}
		}else {
			echo "PDFファイルのみ指定してください。";
		}
	}else {
	    header("Location:./upload_error.php");
	}
}else{
    header("Location:./upload_error.php");
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
   <body>
	<div align="top"><br/>

	<input TYPE="button" onClick= "location.href='../index.html'" VALUE="OK" STYLE="width: 100px; height:40px;">
	</div>
  </body>
</html>
