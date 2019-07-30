<link rel="stylesheet" type="text/css" href="./css/css.css">
<meta http-equiv="Content-Type" content="text/html; charset=Shift-JIS"> 
<html>
<?php
	$newest = 30;	// 社員プロフィールを表示する最新年
	$oldest = 17;	// 社員プロフィールを表示する最古年
	
	$login_user_name = $_SERVER['REMOTE_USER'];
	//echo "LoginUserName: " . $login_user_name;
	
	include 'admin-list.php';
	$isAdmin = FALSE;
	for ( $i = 0; $i < count($admins); $i++ ) {
		if ( $admins[$i] == $login_user_name ) {
			$isAdmin = TRUE;
			break;
		}
	}
	
	//echo " isAdmin = " . $isAdmin;
	
	for ( $year = $newest; $year >= $oldest; $year-- ) {
		$file = "data/shain_h".$year.".csv";
		if (!file_exists($file)) {
			continue;
		}
		echo "<div id='shain{$year}' align='center'>";
		echo "<br>";
		echo "<h1>平成{$year}年入社社員</h1>";
		echo "<br>";
		$update_date = date("Y/m/d", filemtime($file));
		echo "<div>{$update_date} 更新</div>";
		// 各年入社社員情報を csv から読み込み、HTML成型
		{
			$counter = 0;
			if ( ( $handle = fopen ( $file, "r" ) ) !== FALSE ) {
				echo "<table border='1'width='1450px'>\n";
				$src="th";
				while ( ( $data = fgetcsv ( $handle, 1000, ",", '"' ) ) !== FALSE ) {
					$png = "";
					$name = "";
					$school = "";
					$profile = "";
					$license = "";
					echo "\t<tr class='trh'>\n";
					
					// csvからデータ取得
					for ( $i = 0; $i < count( $data ); $i++ ) {
						switch($i){
							case 0:	// No.
								$png = $data[$i];
								break;
							case 1:	// 氏名
								$name = $data[$i];
								break;
							case 2:	// 出身校
								$school = $data[$i];
								break;
							case 3:	// プロフィール(取得資格)
								$profile = $data[$i];
								break;
							case 4:	// 出身地
								$from = $data[$i];
								break;
							case 5:	// 所属
								$license = $data[$i];
								break;
							default :
							break;
						}
					}
					
					// HTML成型
					if ($isAdmin) {	// 管理者表示(詳細あり)
						// No. と 写真
						if ($counter != 0) {
							echo "\t\t<$src rowspan='2' class='index'>".$counter."</$src>\n";
						} else {
							echo "\t\t<$src rowspan='2' class='index'>No.</$src>\n";
						}
						echo "\t\t<$src rowspan='2' width='95px'>";
						if($counter==0){
							$counter++;
						}else{
							echo "<img src='img/{$png}.png'>";
							$counter++;
						}
						echo "</$src>\n";
						// 氏名
						echo "\t\t<$src class='name'>{$name}</$src>\n";
						// 出身校
						echo "\t\t<{$src} class='school'>{$school}</{$src}>\n";
						// プロフィール(取得資格)
						echo "\t\t<{$src} colspan='4' class='profile' rowspan='2'>{$profile}</{$src}>\n";
						
						echo "\t</tr>\n\t<tr class='trh'>\n";
						
						// 出身地
						echo "\t\t<{$src} class='license'>{$from}</{$src}>\n";
						// 所属
						echo "\t\t<{$src} class='license'>{$license}</{$src}>\n";
						
					} else {	// 一般表示(詳細なし)
						// No. と 写真
						if ($counter != 0) {
							echo "\t\t<$src class='index'>".$counter."</$src>\n";
						} else {
							echo "\t\t<$src class='index'>No.</$src>\n";
						}
						echo "\t\t<$src width='95px'>";
						if($counter==0){
							$counter++;
						}else{
							echo "<img src='img/{$png}.png'>";
							$counter++;
						}
						echo "</$src>\n";
						// 氏名
						echo "\t\t<$src class='name'>{$name}</$src>\n";
						// 所属
						echo "\t\t<{$src} class='license'>{$license}</{$src}>\n";
						// プロフィール(取得資格)
						echo "\t\t<{$src} colspan='4' class='profile'>{$profile}</{$src}>\n";
					}
					echo "\t</tr>\n";
					$src="td";
				}
				echo "</table>";
				fclose ( $handle );
			}
		}
		echo "<br>";
		echo "</div>\n";
	}
?>
<FORM>
<div id="footer" align="center">
<INPUT type="button" value="戻る" onClick="history.back()">
</FORM>
</div>
</html>
