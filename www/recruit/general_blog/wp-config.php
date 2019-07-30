<?php
/**
 * The base configurations of the WordPress.
 *
 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、言語、ABSPATH の設定を含みます。
 * より詳しい情報は {@link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86 
 * wp-config.php の編集} を参照してください。MySQL の設定情報はホスティング先より入手できます。
 *
 * このファイルはインストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さず、このファイルを "wp-config.php" という名前でコピーして直接編集し値を
 * 入力してもかまいません。
 *
 * @package WordPress
 */

// 注意: 
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - こちらの情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'hermessystems_general');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'hermessystems');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'HI9_234W8pH9');

/** MySQL のホスト名 */
define('DB_HOST', 'mysql464.db.sakura.ne.jp');

/** データベースのテーブルを作成する際のデータベースのキャラクターセット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+w5Yyca0iVl-|Rv~M,AuYN%rWdt)KgP7gPQ^}oR?.*Z5<pGI,Z! DeW{KrV(6N N');
define('SECURE_AUTH_KEY',  'QmVE+Cb!H]Aq;+Ta<T}no[5D42_?SVFK<zjo~T{seT3U^2gxuQ0AfP]!XeP~I) 1');
define('LOGGED_IN_KEY',    'lcx,TiW0Cpw[vb5X~nxRVa.|s[L+aTJeL+Ao<#1)[u5-}Tc8QrlqjM0!Nn+[a@|{');
define('NONCE_KEY',        'bytpL+?1fS@M|oLI`J)sxnI@i-PuP*3+A[[I$h8}Fb<1e {a<i$b5fq-`,,|.AIk');
define('AUTH_SALT',        'slrK&us$zitU}oTX#:cW,]FxqRW@iVpJ454Y,4- Q_6^ {Vg;,#r8Q2nJgf1|PT@');
define('SECURE_AUTH_SALT', 'ziCGnRhs|s{s=x#?odGEa1)VmZnrE4@TlN!*&ZS0ys;X&r%27J#{X.~c6B:Nb])+');
define('LOGGED_IN_SALT',   'w2<6J4+9|YPKO5[n=b|ST6cC1fja*$&u>D&}:$PQlFUW,-M>azxMeb+z%>_/d@<@');
define('NONCE_SALT',       ']}-7_xN~S%e[iwi.`dh-|kCP;4:G+o{he/Ty!=F3j2]}Otn&olE$kzgYjvZ^z*L|');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * ローカル言語 - このパッケージでは初期値として 'ja' (日本語 UTF-8) が設定されています。
 *
 * WordPress のローカル言語を設定します。設定した言語に対応する MO ファイルが
 * wp-content/languages にインストールされている必要があります。例えば de_DE.mo を
 * wp-content/languages にインストールし WPLANG を 'de_DE' に設定することでドイツ語がサポートされます。
 */
define('WPLANG', 'ja');

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
