<html>
  <head>
  <meta charset="932">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>通達の表示/非表示</title>
  </head>
  <body>
<?php
  $host = "mysql464.db.sakura.ne.jp";
  $user = "hermessystems";
  $pass = "HI9_234W8pH9";
  $db   = "hermessystems_upload_tsutatsu";

  // MySQLへ接続する
  $link = mysql_connect($host,$user,$pass) or die("MySQLへの接続に失敗しました。");
  // DBを選択する
  $sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");
  
  // エンコード
  mysql_set_charset('utf8');
  // クエリを送信する
  $sql = "SELECT* FROM t_info WHERE comments <> '1' ORDER BY info_date DESC, info_id DESC";
  $result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br/>SQL:".$sql);
  // 結果セットの行数を取得する
  $rows = mysql_num_rows($result);
?>
<!-- ヘッダーの表示 -->
<table border = "3">
	<tr>
		<td><?php echo "通達ID"; ?></td>
		<td><?php echo "タイトル"; ?></td>
		<td><?php echo "掲載日付"; ?></td>
		<td><?php echo "表示/不表示"; ?></td>
		<td><?php echo "NEWアイコン"; ?></td>
	</tr>
<!-- テーブルの表示 -->
<?php
  $i = 0;
  if($rows) {?>

<?php
       while($i<$rows) {
       $row = mysql_fetch_array($result,MYSQL_ASSOC);
        //表示状態がONの場合
	if($row["shown"]== 0) {
?>
		<tr>
		<form ACTION= update_done.php METHOD=post ENCTYPE=multipart/form-data>
		    <td><?php echo $row["info_id"]; ?></td>
		    <!--<?php $info_title = mb_convert_encoding($row["info_title"], 'utf-8'); ?>-->
		    <td><?php echo $row["info_title"]; ?></td>
		    <td><?php echo date("Y/m/d",strtotime($row["info_date"])); ?></td>
		    <td><?php echo $row["shown"]; ?></td>
		    <td><?php echo $row["newicon"]; ?></td>
             
			<!--通達編集リンク-->
			<td><?php echo "<a href= ./tsutatsu_row.php?info_id=$row[info_id]>"; ?>編集</a></td>
<?php		
			$i++;
?>
<?php
        //表示状態がOFFの場合
	}else if ($row["shown"]== 1) {
?>
		<tr>
		    <td><font color='grey'><?php echo $row["info_id"]; ?></font></td>
		    <!--<?php $info_title = mb_convert_encoding($row["info_title"], 'utf-8'); ?>-->
		    <td><font color='grey'><?php echo $row["info_title"]; ?></font></td>
		    <td><font color='grey'><?php echo date("Y/m/d",strtotime($row["info_date"])); ?></font></td>
		    <td><font color='grey'><?php echo $row["shown"]; ?></font></td>
		    <td><font color='grey'><?php echo $row["comments"]; ?></font></td>
	      
			<!--通達編集リンク-->
			<td><?php echo "<a href= ./tsutatsu_row.php?info_id=$row[info_id]>"; ?>編集</a></td>
<?php		
			$i++;
?>
</form>
		</tr>
<?php
	 }
     } 
?>
<?php
      $msg = $rows."件のデータがあります。";
	 }else{
             $msg = "データがありません。";
       }
?>
<?php
	// 結果保持用メモリを開放する
	mysql_free_result($result);
	// MySQLへの接続を閉じる
	mysql_close($link) or die("MySQL切断に失敗しました。");
?>


    <?php echo "<a href= ../index.html>"; ?>メイン画面に戻る</a></td>
    <h2>通達の表示/非表示</h2>
    <?= $msg ?>
    <table width = "200" border = "0">
    </table>
  </body>
</html>
