<?php
if (isset($_POST['start']) && isset($_POST['end'])) {
	$from = $_POST['start'];
	$to = $_POST['end'];
} else {
	$from = $to = date('Y-m-d');
}
?>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".secret_cell2 > a").click(function(){
			fileName = jQuery(this).attr("value");
			fileUrl = jQuery(this).attr("href").split("/");
			fileUrl = fileUrl[fileUrl.length-1];

			jQuery.ajax({
				type: "GET",
				url: "send.php",
				data: {
						fileName: fileName,
						fileUrl: fileUrl
					  }
			}).done(function(){});
		});

		/**
		 * type="date" をサポートするかどうかの判定.
		 */
		var support = false;
		$tmp = $('<input type="date">');
		if ($tmp.prop('type') === 'date') {
			$tmp.val('');
			if ($tmp.val() === '') {
				support = true;
			}
		}
		if (support) {
			$('input[type="date"]').attr('min', '2001-01-01');
			$('input[type="date"]').attr('max', '2037-12-31');
		} else {
			$('input[type="date"]').attr('maxlength', '10');
			$('input[type="date"]').attr('inputmode', 'numeric');
			$('input[type="date"]').attr('pattern', '^(20[0-9][0-9])-(0?[1-9]|1[012])-(0?[1-9]|[12][0-9]|3[01])$');
			$('input[type="date"]').on('blur', function(event) {
				var tmp = $(this).val().split('-');
				var y = parseInt(tmp[0], 10);
				var m = parseInt(tmp[1], 10);
				var d = parseInt(tmp[2], 10);
				var ListofDays = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
				if (event.target.validity.valueMissing) {
					event.target.setCustomValidity('このフィールドを入力してください。'); 
				} else if (event.target.validity.patternMismatch) {
					event.target.setCustomValidity('有効な値を入力してください。\n入力が不完全か、日付が無効です。\nYYYY-MM-DD の形式で入力してください。');
				} else if (y < 2001 || 2037 < y) {
					event.target.setCustomValidity('2001年から2037年の範囲で入力してください。');
				} else if (y % 4 && m == 2 && d > 28) {
					event.target.setCustomValidity(y+'年'+m+'月'+d+'日は存在しません。');
				} else if (ListofDays[m - 1] < d) {
					event.target.setCustomValidity(m+'月'+d+'日は存在しません。');
 				}
				$(this).on('input', function(e) {
					event.target.setCustomValidity('');
				});
			});
			$('input').keydown(function(e) {
				if ((e.which && e.which === 13) || (e.keyCode && e.keyCode === 13)) {
					return false;
				} else {
					return true;
				}
			});
		}
	});
</script>
<!-- コンテンツタイトル枠 -->
<div class="m_bar">イベントカレンダー</div>
<form method="post">
<input type="date" name="start" value="<?php echo htmlspecialchars($from, ENT_QUOTES, 'UTF-8'); ?>" required="required" /><!--
-->～<input type="date" name="end" value="<?php echo htmlspecialchars($to, ENT_QUOTES, 'UTF-8'); ?>" required="required" /><!--
--><button type="submit">表示</button><!--
--><button type="submit" formaction="./ExcelOutput.php">Excel形式でダウンロード</button>
</form>
<table id="secret_table" cellspacing="0" cellpadding="0">
	<tbody>
<?php
if (isset($_POST['start']) && isset($_POST['end'])) {
	/**
	 * 入力値チェック.
	 */
	if (!isset($_POST['start'])) {
		$errors[] = '開始日が送信されていません。';

	} elseif (!is_string($_POST['start'])) {
		// 送信された値が配列等の場合
		$errors[] = '開始日の値が不正です。';

	} elseif ($_POST['start'] === '') {
		$errors[] = '開始日が入力されていません。';

	} elseif (!isset($_POST['end'])) {
		$errors[] = '終了日が送信されていません。';

	} elseif (!is_string($_POST['end'])) {
		$errors[] = '終了日の値が不正です。';

	} elseif ($_POST['end'] === '') {
		$errors[] = '終了日が入力されていません。';

	} else if (
	!preg_match("/^(200[1-9]|20[12]\d|203[0-7])-(0?[1-9]|1[012])-(0?[1-9]|[12][0-9]|3[01])$/", $_POST['start']) || 
	!preg_match("/^(200[1-9]|20[12]\d|203[0-7])-(0?[1-9]|1[012])-(0?[1-9]|[12][0-9]|3[01])$/", $_POST['end'])) {
		$errors[] = '日付の形式が不正です。';
		echo '日付の形式が不正です。';
	} else if (strtotime($_POST['end']) < strtotime($_POST['start'])) {
		$errors[] = '終了日を開始日の前に設定することはできません。';
		echo '終了日を開始日の前に設定することはできません。';
	} else {
		$fromStamp = strtotime($from);
		$fromYear = idate('Y', $fromStamp);
		$fromMonth = idate('m', $fromStamp);
		$fromDay = idate('d', $fromStamp);
		$toStamp = strtotime($to);
		$toYear = idate('Y', $toStamp);
		$toMonth = idate('m', $toStamp);
		$toDay = idate('d', $toStamp);

		include './getEventCalendar.php';
		$records = getEventCalendar($fromYear, $fromMonth, $fromDay, $toYear, $toMonth, $toDay);

		// フォームから1件も予定が取得されなかった場合を判定する分岐. 
		// たまたま予定が1件も無い場合のみにstartDateが空になるためこのような書き方にしているが、あまり良い書き方ではない.
		if (!isset($records[0]['startDate'])) {
			echo '指定した範囲には予定が登録されていません。';
		} else {
			echo '<tr class="schedule_thead">';
			echo '<th colspan="2">タイトル</th>';
			echo '<th>日付</th>';
			echo '<th>時刻</th>';
			echo '</tr>';
			for ($i = 0; $i < count($records); $i++) {
				echo '<tr class="schedule_tbody">';
				echo '<td colspan="2">' .$records[$i]['summary']. '</td>';
				echo '<td>' .$records[$i]['startDate']. '</td>';
				echo '<td>' .$records[$i]['startTime']. '</td>';
				echo '</tr>';
			}
		}
	}
}
?>
	</tbody>
</table>
<!-- googleカレンダー表示 -->
	<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=2u935v20rb8ld4g85vb2muit7k%40group.calendar.google.com&amp;color=%23711616&amp;src=ja.japanese%23holiday%40group.v.calendar.google.com&amp;color=%23125A12&amp;ctz=Asia%2FTokyo" style="border: 0" width="550" height="600" frameborder="0" scrolling="no"></iframe>