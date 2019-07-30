<html>
  <head>
    <title>tsutatsu_row.php</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
<?php
	$host = "mysql464.db.sakura.ne.jp";
	$user = "hermessystems";
	$pass = "HI9_234W8pH9";
	$db = "hermessystems_upload_tsutatsu";

 $info_id= $_GET['info_id'];
	$link = new PDO("mysql:dbname=$db;host=$host",$user,$pass);
	//エンコード
	$link->query('SET NAMES utf8');

	// クエリを送信する
	$sql = "SELECT * FROM t_info WHERE info_id= ?";
	$stmt = $link->prepare($sql);
	$stmt->execute(array($info_id));
?>
<!-- ヘッダーの表示 -->
<table border = "3">
	<tr>
		<td><?php echo "通達ID"; ?></td>
		<td><?php echo "タイトル"; ?></td>
		<td><?php echo "掲載日付"; ?></td>
		<td><?php echo "表示/不表示"; ?></td>
		<td><?php echo "NEWアイコン"; ?></td>
		<td><?php echo "削除"; ?></td>
		<td><?php echo "表示状態"; ?></td>
	</tr>

<?php
	//値を配列として取得
	$row = $stmt->fetch();
//var_dump($row);
	//表示状態がONの場合
	if($row["shown"]== 0) {
?>
		<tr>
		    <td><?php echo $row["info_id"]; ?></td>
		    <td><?php echo $row["info_title"]; ?></td>
		    <td><?php echo date("Y/m/d",strtotime($row["info_date"])); ?></td>
		    <td><?php echo $row["shown"]; ?></td>
		    <td><?php echo $row["newicon"]; ?></td>
		<form ACTION= update_done.php METHOD=post ENCTYPE=multipart/form-data>
			<!--チェックボックス-->
			<td><?php echo "<input type=checkbox name=C_DELETE  value=1>"; ?></td>
			<td><?php echo "<input type=checkbox name=C_STATUS checked=checked>"; ?></td>
			<!--更新ボタン-->
			<td><?php echo "<input TYPE=submit VALUE=更新>";?></td>
			<td><?php echo "<input type=hidden name=C_BUTTON value= $info_id>"; ?></td>
		</form>
		</tr>
<?php
	//表示状態がOFFの場合
	} else if($row["shown"]== 1) {
?>
		<tr>
		    <td><font color='grey'><?php echo $row["info_id"]; ?></font></td>
		    <td><font color='grey'><?php echo $row["info_title"]; ?></font></td>
		    <td><font color='grey'><?php echo date("Y/m/d",strtotime($row["info_date"])); ?></font></td>
		    <td><font color='grey'><?php echo $row["shown"]; ?></font></td>
		    <td><font color='grey'><?php echo $row["newicon"]; ?></font></td>	      
		<form ACTION= update_done.php METHOD=post ENCTYPE=multipart/form-data>
			<!--チェックボックス-->
			<td><?php echo "<input type=checkbox name=C_DELETE value=1>"; ?></td>
			<td><font color='grey'><?php echo "<input type=checkbox name=C_STATUS>"; ?></font></td>
			<!--更新ボタン-->
			<td><?php echo "<input TYPE=submit VALUE=更新>"; ?></td>
			<td><?php echo "<input type=hidden name=C_BUTTON value= $info_id>"; ?></td>
		</form>
		</tr>
</form>
<?php
	}	
?>
<?php
	// PDOを閉じる
	$stmt->closeCursor();
?>
    <h2>通達編集画面</h2>
    <?= $msg ?>
    <table width = "200" border = "0">
    </table>
  </body>
</html>
