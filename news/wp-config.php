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
//define('DB_NAME', '_fujinamiiin_wp');
define('DB_NAME', '_fujinamiiin_wp');

/** MySQL データベースのユーザー名 */
//define('DB_USER', '_fujinamiiin_wp');
define('DB_USER', 'root');

/** MySQL データベースのパスワード */
//define('DB_PASSWORD', 'emobile0316');
define('DB_PASSWORD', 'mw0316');

/** MySQL のホスト名 */
//define('DB_HOST', 'mysql125.heteml.jp');
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '5iSYvPWQsCh~AVV>d7MB22+GhzM>3{T,TsIe~E:~Cl!)vyJZ2E.>?7t95]kGx+*2');
define('SECURE_AUTH_KEY',  '${H@(|i:]<bQdIN+F*-{+F~MVdy][nGuAS9PIPzTk_de+!x*hRhFvdP2lWRcTid|');
define('LOGGED_IN_KEY',    '4H0tEs2+L^9uS9.3n)97%8x-{Da~O/7KB:R#`MncOqx8SShRC^+GF<RO4-a?- Pm');
define('NONCE_KEY',        't8Z5P-)O/+)6+M&D$$B.bpiJjc-ZBo-#E_IVm`#|XmY.MuLHT.!*F>*,maw{#EU2');
define('AUTH_SALT',        'RN8+1W~S_D7+e@^`]qz[Sw3yKs7aC={->[Ay]O(B:4v@?x+y]-t&sb*CveVmh~t9');
define('SECURE_AUTH_SALT', 'r`a@?lg/Lq}-a?(l}{shB^1/f9=DT0|y7p4mhJ4!Tpd.C-EC]<Jpf1#ArECGE|x ');
define('LOGGED_IN_SALT',   '-!&)mU+*[.9X!f4+TorTMldWw3E;$ws(|R[cR^X9}S3O&HEOHnesfk.zUbZ X#?q');
define('NONCE_SALT',       'N /Lj`l:3OaUR|s&e]+*fn@{fM{@g9fwMk1|59N^lRU[Q-^eaq-%s_KF`?^sk2&V');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = '_fujinamiiin';

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
