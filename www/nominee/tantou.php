<?php
$counter = 0;
$file = "data/tantou_h30.csv";
if ( ( $handle = fopen ( $file, "r" ) ) !== FALSE ) {
	
	$update_date = date("Y/m/d", filemtime($file));
	echo "<div>{$update_date} çXêV</div>";
    
	echo "<table border='1'width='1450px'>\n";
	$src="th";
	while ( ( $data = fgetcsv ( $handle, 1000, ",", '"' ) ) !== FALSE ) {
		echo "\t<tr class='trh'>\n";
		for ( $i = 0; $i < count( $data ); $i++ ) {
			switch($i){
				case 0:
					if ($counter != 0) {
						echo "\t\t<$src rowspan='2' class='index'>".$counter."</$src>\n";
					} else {
						echo "\t\t<$src rowspan='2' class='index'>No.</$src>\n";
					}
					echo "\t\t<$src rowspan='2' width='95px'>";
					if($counter==0){
						$counter++;
					}else{
						echo "<img src='img/{$data[$i]}.png'>";
						$counter++;
					}
					echo "</$src>\n";
					break;
				case 1:
					echo "\t\t<$src class='name'>{$data[$i]}</$src>\n";
					break;
				case 2:
					echo "\t\t<{$src} colspan='2' class='school'>{$data[$i]}</{$src}>\n";
					break;
				case 3:
					echo "\t\t<{$src} colspan='4' class='profile' rowspan='2'>{$data[$i]}</{$src}>\n";
					echo "</tr><tr class='trh'>";
					break;
				case 4:
					echo "\t\t<{$src} class='from'>{$data[$i]}</{$src}>\n";
					break;
				case 5:
					echo "\t\t<{$src} colspan='2' class='license'>{$data[$i]}</{$src}>\n";
					break;
        		default :
        			break;
        	}
        }
        echo "\t</tr>\n";
        $src="td";
    }
    echo "</table>\n";
    fclose ( $handle );
}

?>