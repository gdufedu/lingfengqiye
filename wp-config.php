<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'lingfengqiye');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'root');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'wAtkIYMs(u),?pj/wGmg!EN?Fh/7K:v<jd4N=3nKQ[nh].KXp1Q=FTt%wa[#}-ft');
define('SECURE_AUTH_KEY',  'N~D m)dKk30yNdC_zSU7.$.{bU<PyI^G$4!W#-$n;t_$>7[LgqhzQLdc#jzn5-MR');
define('LOGGED_IN_KEY',    'v#Pnd8y&Q(oVx >Sr*DHQr!CCM%b.DS:QXeuV 48*(f(,?jT=6yNr/5ok)8its&1');
define('NONCE_KEY',        '_1TJbJEer<1@a}WM wydx/@b/QEqk0COScb{2OsLpNQ1q;v/xGJ^uST2xWNJ[tAv');
define('AUTH_SALT',        'L@3nFEO(UX*Z~SD&se=FVz[q{Q+9s>?U%YI~d(@fNg:Uq/6cOKT&oUkx>9CKe!8o');
define('SECURE_AUTH_SALT', 'hNl1Tl>R!zkH$0%uYU}7raqZu-,U:/6FX?/crc050t23*]~EMi QNhyXW+L5;Jp(');
define('LOGGED_IN_SALT',   'sXWQNRX;nLHT=] 1V+jK/TGqzh>6=q {:$|r5z+a8UhP8=983B|&7MaY@>dMFka.');
define('NONCE_SALT',       'n=HU_8euepd^rT{[y]I3OGWCg`i$NJ2c,hH{J-J0QGC23pk<`]i=RdY`v0CW[EGE');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'qiye_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
