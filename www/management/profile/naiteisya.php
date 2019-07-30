<?php

$file = "data/naiteisya_h31.csv";	// 内定者情報の csvファイル


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

include 'tantou-list.php';
for ( $i = 0; $i < count($tantous); $i++ ) {
	if ( $tantous[$i] == $login_user_name ) {
		$isAdmin = TRUE;
		break;
	}
}

//echo " isAdmin = " . $isAdmin;

$counter = 0;
if ( ( $handle = fopen ( $file, "r" ) ) !== FALSE ) {

	$update_date = date("Y/m/d", filemtime($file));
	echo "<div>{$update_date} 更新</div>";

	echo "<table border='1'width='1600px'>\n";
	$src="th";
	while ( ( $data = fgetcsv ( $handle, 1000, ",", '"' ) ) !== FALSE ) {
		$png = "";
		$name = "";
		$school = "";
		$profile = "";
		$from = "";
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
			echo "\t\t<{$src} class='school_nai'>{$school}</{$src}>\n";
			// プロフィール(自己紹介)
			echo "\t\t<{$src} colspan='4' class='profile_nai' rowspan='2'>{$profile}</{$src}>\n";
			
			echo "\t</tr>\n\t<tr class='trh'>\n";
			
			// 出身地
			echo "\t\t<{$src} class='from'>{$from}</{$src}>\n";
			// 取得資格
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
			// 取得資格
			echo "\t\t<{$src} class='license'>{$license}</{$src}>\n";
			// プロフィール(自己紹介)
			echo "\t\t<{$src} colspan='4' class='profile_nai'>{$profile}</{$src}>\n";
		}
		echo "\t</tr>\n";
		$src="td";
	}
	echo "</table>";
	fclose ( $handle );
}


?>