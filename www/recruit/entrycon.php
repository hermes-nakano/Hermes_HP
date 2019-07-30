<script type="text/javascript">
	jQuery(function(){
		<!-- 同意された場合のみ"採用エントリーフォームへ"ボタンを押下可能に-->

		jQuery(".confirm-check").on("click", function(){

			if(jQuery(this).is(":checked")){
				jQuery(".move-btn").removeAttr("disabled");
			}else{
				jQuery(".move-btn").attr("disabled","disabled");
			}

		});
	});
</script>
<table id ="recruit_table" cellspacing="0" cellpadding="0">
	<tr>
		<td class="m_bar">
			―個人情報取扱い案内及び同意書―
		</td>
	</tr>
</table>

<table class="entrty-tbl">
	<!-- 個人情報取扱い案内及び同意書 -->
	<tr>
		<td>
			<p>
				当社にお渡し頂いた個人情報（履歴書、経歴書等）は、「個人情報保護マネジメントシステム」に基づき、次の通り取り扱いをさせていただきます。
				尚、採用のご希望に添えなかった場合、履歴書等の資料は返却致しません。履歴書等の資料は当社にて責任を持って処理いたします。<br>
				<br>
				1.皆様の個人情報は、採用検討入社手続き、内定期間中の研修受講に伴う手続き及び連絡を利用目的に
				使用させて頂きます。この利用目的以外で使用する場合は改めてお知らせし、同意を得た上で利用致し
				ます。<br>
				<br>
				2.皆様の個人情報は、法令に基づく場合を除き、他へは提供しません。但し、採否の結果を紹介機関に回
				答することがあります。<br>
				<br>
				3.皆様の個人情報は、採用検討及び入社手続きにあたって他に委託することはありません。<br>
				<br>
				4.皆様の個人情報の提供は任意です。但し、必要な情報が提供されないと、上記の目的を達成することが
				できない場合があります。<br>
				<br>
				5.皆様の個人情報は、適切な管理体制のもとに、第三者が触れないよう取扱い、保管します。
				この間、個人情報の利用目的の通知、開示及び訂正、追加又は削除、利用の停止、消去、第三者への提
				供の停止を求められた場合、本人であることを確認させて頂いた上で、速やかに対応いたします。
				尚、ご要望にお応えできない場合は、ご本人に遅滞なくその旨をお知らせし、理由を説明します。
				これらの請求は、下記のお問合せ先までご連絡ください。<br>
				<br>
				　[個人情報についてのお問合せ先]<br>
				　　総務部　市川　雅史<br>
				　　電　話　 03-6327-7767<br>
				　　FAX　　  03-6327-7768<br>
				<br>
				6.次の者を個人情報管理責任者として任命し、皆様の個人情報を適切に管理します。<br>
				　　個人情報管理責任者　北島　昭夫<br>
				　　電　話　 03-6327-7767<br>
				　　FAX　　  03-6327-7768<br>
			</p>
		</td>
	</tr>
	
	<!-- by CEO-->
	<tr>
		<td>
			株式会社ヘルメスシステムズ<br>
			代表取締役　大中　勝博
		</td>
	</tr>

	<!-- 同意チェックボタン -->
	<tr>
		<td>
			[個人情報取扱い案内及び同意書]を読み、同意する<input class="confirm-check" type="checkbox" name="check" value="agree">
		</td>
	</tr>

	<!-- 採用エントリーフォーム移動ボタン-->
	<tr>
		<td>
			<form method="post" action="./index.php?page=entryfrm">
				<input class="move-btn" type="submit" name="button" value="採用エントリーフォームへ" disabled="disabled">
			</form>
		</td>
	</tr>
</table>