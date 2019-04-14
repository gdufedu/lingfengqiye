<?php
function lingfeng_strimwidth( $str, $len, $start = 0, $suffix = '……' ) {
    $str = str_replace(array(' ', '　','&nbsp;', '\r\n'), '', strip_tags( $str ));
    if ( $len>mb_strlen( $str ) ) {
        return mb_substr( $str, $start, $len );
    }
    return mb_substr($str, $start, $len) . $suffix;
}
/*
add_theme_support($features, $arguments)
函数功能：开启缩略图功能
@参数 string $features, 此参数是告诉wordpress你要开启什么功能
@参数 array $arguments, 此参数是告诉wordpress哪些信息类型想要开启缩略图
第二个参数如果不填写，那么文章信息和页面信息都开启缩略图功能。
*/
add_theme_support('post-thumbnails');
/*
    add_image_size( $name, $width, $height, $crop )
    函数功能：增加一种新尺寸的图片

    特别说明：
    一般情况下，当你上传一张图片时，除了上传的原图外，wordpress还会把原图结成三种尺寸的图片，一个是“缩略图”， 一个是“中等尺寸图”，一个是“大尺寸图片”。
    如果你的网站，需要两种尺寸的缩略图，比如一个是150*150， 一个是150*180。而你在上传图片时，wordpress默认只能生成一种尺寸的。
    而通过此函数，可以让wordpress在原图的基础上修改出两种尺寸的缩略图

    @参数$name, 增加的新尺寸图片的名称。比如,thumbnail代表的是缩略图，medium代表的是中等尺寸图，large代表的是大尺寸图，full代表的是完整尺寸图。那么你新创建的这个尺寸的图片，叫什么名字？你自己命名即可

    @参数$width,  代表的是你设置的新尺寸的宽度是多少？填写数字，不用写单位。因为单位默认为像素即px

    @参数$height, 代表的是你设置的新尺寸的高度是多少？填写数字，不用单位

    @参数$crop, 代表的是压缩模式还是剪切模式。

    范例：
    //当上传图片时，给我新生成一种尺寸的图片。尺寸为300*200, 压缩模式
    add_image_size( 'cat-thumb', 300, 200, false );

    // 当上传图片时，给我新生成一种尺寸的图片。尺寸为220*180, 裁剪模式
    add_image_size( 'hom-thumb', 220, 180, true );
*/
    add_image_size('lingfeng', 148, 100, true );
/**
 * @Author: Marte
 * @Date:   2019-04-13 10:38:12
 * @Last Modified by:   Marte
 * @Last Modified time: 2019-04-14 14:17:52
 */
register_nav_menu( 'daohangding', '网站的顶部导航' );     //注册一个菜单
register_nav_menu( 'daohangzhu', '网站的主导航' );     //注册一个菜单
register_nav_menu( 'daohangdi', '网站的底部导航' );     //注册一个菜单
add_action('wp_enqueue_scripts', 'lingfeng_scripts');
function lingfeng_scripts() {
    /**
    * wp_enqueue_style( $handle, $src, $deps, $ver, $media );
    * 功能：添加样式表
    * @Param string $handle             【必填】样式表的标识符（名称）
    * @Param string $src                        【可选】样式表的所在地址（url）
    * @Param array $deps                    【可选】加载本样式之前，必须首先加载的
    * @Param string $ver                        【可选】样式表的版本
    * @Param boolen $media              【可选】样式表指定的媒体
    * 例如：wp_enqueue_style( 'lingfeng-style', get_stylesheet_uri() );
    * 加载主题中的style.css文件
    */
    wp_enqueue_style( 'lingfeng-style', get_template_directory_uri().'/style.css');

    /**
    * wp_register_script( $handle, $src, $deps, $ver, $in_footer )
    * 函数功能：加载js脚本
    * @Param string $handle             【必填】脚本的标识符（名称）
    * @Param string $src                        【可选】脚本所在地址（url）
    * @Param array $deps                    【可选】加载本脚本之前，必须首先加载的
    * @Param string $ver                        【可选】脚本的版本
    * @Param boolen $in_footer          【可选】脚本的位置，是否放在页脚
    * 函数说明，仅仅是注册和备案，并没有真正添加。
    * 真正要添加脚本，用wp_enqueue_script( ) 函数
    * 例如：wp_register_script ('lingfeng-lazyload', get_template_directory_uri().'/js/jquery.lazyload.js');
    * 解释：注册一个名字为'lingfeng-lazyload'的脚本，脚本的地址是主题文件夹下的js/juqery.lazyload.js
    */


    /**
    * wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer )
    * 函数功能：加载js脚本
    * @Param string $handle             【必填】脚本的标识符（名称）
    * @Param string $src                        【可选】脚本所在地址（url）
    * @Param array $deps                    【可选】加载本脚本之前，必须首先加载的
    * @Param string $ver                        【可选】脚本的版本
    * @Param boolen $in_footer          【可选】脚本的位置，是否放在页脚
    * 例如: wp_enqueue_script ('lingfeng-tool', get_template_directory_uri().'/js/tool.js', array( 'jquery', 'lingfeng-lazyload'));
    * 解释：添加名字为‘lingfeng-tool’的脚本，脚本的地址为主题目录下的js/tool.js，而且在加载此脚本之前先要加载名字叫做'jquery'和'lingfeng-lazyload'的脚本
    */
   wp_enqueue_script ('lingfeng-tool', get_template_directory_uri().'/js/tool.js', array( 'jquery'));
   wp_enqueue_script ('bxslider', get_template_directory_uri().'/js/jquery.bxslider.min.js', array( 'jquery'));
   wp_enqueue_script ('dobxslider', get_template_directory_uri().'/js/dobxslider.js', array( 'jquery'));

}
add_filter('wp_title', 'lingfeng_wp_title', 10, 2);
function lingfeng_wp_title($title, $sep) {
    global $paged, $page;

    //如果是feed页，返回默认标题内容
    if ( is_feed() ) {
        return $title;
    }

    // 标题中追加站点标题
    $title .= get_bloginfo( 'name' );

    // 网站首页追加站点副标题
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    // 标题中显示第几页
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( '第%s页', max( $paged, $page ) );

    //去除空格，-的字符实体
    $search = array('&#8211;', ' ');
    $replace = array('-', '');
    $title = str_replace($search, $replace, $title);

    return $title;
}