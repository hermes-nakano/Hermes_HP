<table id ="recruit_table" cellspacing="0" cellpadding="0">
	<tr>
		<td class="m_bar">
			採用エントリー
		</td>
	</tr>
</table>

<form name="entryForm" method="post" action="./sendEntry.php">
	<table class="entrty-tbl">
		<!-- 必須項目 -->
		<tr>
			<td colspan=2>赤字は入力必須項目です。</td>
		</tr>
		<?php
			if(!empty($_errors)){
				foreach($_errors as $err){
		?>
		<tr>
			<td class="require" colspan=2>・<?php echo $err ?></td>
		</tr>
		<?php
				}
			}
		?>
		
		<!-- 氏名(全角) -->
		<tr>
			<td class="require text-right">氏名(全角)</td>
			<td><input type="text" name="shimei" maxlength="10" class="simei"></td>
		</tr>

		<!-- 氏名(かな) -->
		<tr>
			<td class="require text-right">かな(全角)</td>
			<td><input type="text" name="shimeiKana" maxlength="20" class="simei"></td>
		</tr>

		<!-- 年齢 -->
		<tr>
			<td class="require text-right">年齢</td>
			<td>
				<select size=1 name="old">
				<?php
					for($old=18; $old<=59; $old++){
						echo '<option value="'.$old.'">'.$old.'</option>';
					}
				?>
				</select>
			</td>
		</tr>

		<!-- 性別 -->
		<tr>
			<td class="require text-right">性別</td>
			<td>
				<select size=1 name="gender">
					<option value="男性">男性</option>
					<option value="女性">女性</option>
				</select>
			</td>
		</tr>

		<!-- 住所 -->
		<tr>
			<td class="require text-right">住所(全角)</td>
			<td><input class="w400" type="text" name="address" maxlength="50"></td>
		</tr>

		<!-- 電話番号 -->
		<tr>
			<td class="require text-right">電話番号(半角)</td>
			<td><input type="text" name="tel" maxlength="14">(例)000-0000-0000 携帯電話可</td>
		</tr>

		<!-- 電子メール -->
		<tr>
			<td class="require text-right">メール(半角)</td>
			<td><input type="text" name="mailAddress" maxlength="50">(例)xxxx@xx.xx</td>
		</tr>

		<!-- 学歴1～2 -->
		<?php for($i=1; $i<=2; $i++){ ?>
		<tr>
			<td class="<?php if($i===1)echo "require"; ?> text-right">学歴<?php echo $i; ?>(全角)</td>
			<td>
				<input class="w315" type="text" name="career<?php echo $i; ?>" maxlength="50">
				<select size=1 name="career_state<?php echo $i; ?>">
					<option value="卒業">卒業</option>
					<option value="卒業見込">卒業見込</option>
					<option value="中退">中退</option>
				</select>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td></td>
			<td>(例)XX県立YY高等学校　普通科<td>
		</tr>

		<!-- 取得資格 -->
		<tr>
			<td class="text-right">取得資格</td>
			<td>
				<input type="checkbox" name="kihon" value="基本情報">基本情報
				<input type="checkbox" name="ouyou" value="応用情報">応用情報
				<input type="checkbox" name="ccna" value="CCNA">CCNA
				<input type="checkbox" name="oracle" value="Oracle">Oracle
				<input type="checkbox" name="sjcp" value="SJC-P">SJC-P
			</td>
		</tr>

		<!-- 採用試験希望日時 -->
		<tr>
			<td class="require text-right">採用試験<br>希望日時</td>
			<td><input type="text" name="wish" maxlength="30">(例)YYYY/MM/DD HH:MM</td>
		</tr>

		<!-- 職歴・自己PR -->
		<tr>
			<td class="text-right">職歴・自己PR<BR>(500字以内)</td>
			<td colspan=2><textarea class="w400 h200" name="pr" maxlength="500"></textarea></td>
		</tr>
		
		<tr>
			<td class="text-right" colspan=2><input type="submit" value="送信"</td>
		</tr>
</table>
</form>
