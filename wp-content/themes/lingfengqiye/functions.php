<?php
/**
* getPostViews()函数
* 功能：获取阅读数量
* 在需要显示浏览次数的位置，调用此函数
* @Param object|int $postID   文章的id
* @Return string $count       文章阅读数量
*/
function getPostViews( $postID ) {
     $count_key = 'post_views_count';
     $count = get_post_meta( $postID, $count_key, true );
     if( $count=='' ) {
         delete_post_meta( $postID, $count_key );
         add_post_meta( $postID, $count_key, '0' );
         return "0";
     }
    return $count;
 }


/**
* setPostViews()函数
* 功能：设置或更新阅读数量
* 在内容页(single.php，或page.php )调用此函数
* @Param object|int $postID   文章的id
* @Return string $count       文章阅读数量
*/
 function setPostViews( $postID ) {
     $count_key = 'post_views_count';
     $count = get_post_meta( $postID, $count_key, true );
     if( $count=='' ) {
         $count = 0;
         delete_post_meta( $postID, $count_key );
         add_post_meta( $postID, $count_key, '0' );
     } else {
         $count++;
         update_post_meta( $postID, $count_key, $count );
     }
 }
/**
*   lingfeng_pagesize()函数
*   作用：修正使用WP_Query时，无法正确分页
*   在此代码段，告诉wordpress每页你要显示多少篇文章
*   设置每页显示的篇数示例代码：
*   $query->set( 'posts_per_page', 1 ); 每页显示1篇文章信息
*/
function lingfeng_pagesize( $query ) {
    /**
        示例代码1：
        作用是，设置首页显示1篇文章
        if ( is_home() ) {
            // Display only 1 post for the original blog archive
            $query->set( 'posts_per_page', 1 );
            return;
        }
    */

    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }
    if(is_category(array('产品中心','办公设备','电脑硬件','数码相机','手机电话'))) {
        $query->set( 'posts_per_page', 12 );
    }
    if(is_category(array('新闻动态','公司新闻','行业新闻'))) {
        $query->set( 'posts_per_page', 20 );
    }
}
add_action( 'pre_get_posts', 'lingfeng_pagesize', 1 );
/**
* 数字分页函数
* 因为wordpress默认仅仅提供简单分页
* 所以要实现数字分页，需要自定义函数
* @参数 $custom_query             自定义的查询对象【必填】
* @参数 $range                                数字分页的宽度
* @返回 string|empty                      输出分页的HTML代码
*/
function lingfeng_custom_pagenavi($custom_query, $range = 4 ) {
    global $paged;
    if ( !$max_page ) {
        $max_page = $custom_query->max_num_pages;
    }
    if( $max_page >1 ) {
        echo "<div class='fenye'>";
        if( !$paged ){
            $paged = 1;
        }
        if( $paged != 1 ) {
            echo "<a href='".get_pagenum_link(1) ."' class='extend' title='跳转到首页'>首页</a>";
        }
        previous_posts_link('上一页');
        if ( $max_page >$range ) {
            if( $paged <$range ) {
                for( $i = 1; $i <= ($range +1); $i++ ) {
                    echo "<a href='".get_pagenum_link($i) ."'";
                if($i==$paged) echo " class='current'";echo ">$i</a>";
                }
            }elseif($paged >= ($max_page -ceil(($range/2)))){
                for($i = $max_page -$range;$i <= $max_page;$i++){
                    echo "<a href='".get_pagenum_link($i) ."'";
                    if($i==$paged)echo " class='current'";echo ">$i</a>";
                    }
                }elseif($paged >= $range &&$paged <($max_page -ceil(($range/2)))){
                    for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){
                        echo "<a href='".get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";
                    }
                }
            }else{
                for($i = 1;$i <= $max_page;$i++){
                    echo "<a href='".get_pagenum_link($i) ."'";
                    if($i==$paged)echo " class='current'";echo ">$i</a>";
                }
            }
        next_posts_link('下一页');
        if($paged != $max_page){
            echo "<a href='".get_pagenum_link($max_page) ."' class='extend' title='跳转到最后一页'>尾页</a>";
        }
        echo '<span>共['.$max_page.']页</span>';
        echo "</div>\n";
    }
}
/**
* lingfeng_breadcrumbs()函数
* 功能是输出面包屑导航HTML代码
* @Param null           不需要输入任何参数
* @Return string        输出HTML代码
*/
function lingfeng_breadcrumbs() {
    /* === OPTIONS === */
    $text['home']     = '网站首页'; // text for the 'Home' link
    $text['category'] = '%s'; // text for a category page
    $text['search']   = '"%s"的搜索结果'; // text for a search results page
    $text['tag']      = '%s'; // text for a tag page
    $text['author']   = '%s'; // text for an author page
    $text['404']      = '404错误'; // text for the 404 page

    $show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
    $show_on_home   = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
    $show_title     = 1; // 1 - show the title for the links, 0 - don't show
    $delimiter      = ' &raquo; '; // delimiter between crumbs
    $before         = '<span class="current">'; // tag before the current crumb
    $after          = '</span>'; // tag after the current crumb
    /* === END OF OPTIONS === */

    global $post;
    $home_link    = home_url('/');
    $link_before  = '<span typeof="v:Breadcrumb">';
    $link_after   = '</span>';
    $link_attr    = ' rel="v:url" property="v:title"';
    $link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
    $parent_id    = $parent_id_2 = $post->post_parent;
    $frontpage_id = get_option('page_on_front');

    if (is_home() || is_front_page()) {

        if ($show_on_home == 1) echo '<div class="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';

    } else {

        echo '<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">';
        if ($show_home_link == 1) {
            echo '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a>';
            if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
        }

        if ( is_category() ) {
            $this_cat = get_category(get_query_var('cat'), false);
            if ($this_cat->parent != 0) {
                $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
            }
            if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

        } elseif ( is_search() ) {
            echo $before . sprintf($text['search'], get_search_query()) . $after;

        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $home_link . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
                if ($show_current == 1) echo $before . get_the_title() . $after;
            }

        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;

        } elseif ( is_attachment() ) {
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            if ($cat) {
                $cats = get_category_parents($cat, TRUE, $delimiter);
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
            }
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

        } elseif ( is_page() && !$parent_id ) {
            if ($show_current == 1) echo $before . get_the_title() . $after;

        } elseif ( is_page() && $parent_id ) {
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs)-1) echo $delimiter;
                }
            }
            if ($show_current == 1) {
                if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
                echo $before . get_the_title() . $after;
            }

        } elseif ( is_tag() ) {
            echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . sprintf($text['author'], $userdata->display_name) . $after;

        } elseif ( is_404() ) {
            echo $before . $text['404'] . $after;

        } elseif ( has_post_format() && !is_singular() ) {
            echo get_post_format_string( get_post_format() );
        }

        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo __('Page') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }

        echo '</div><!-- .breadcrumbs -->';

    }
}
/*
register_sidebar( $args )
函数功能：开启侧边栏功能
@参数 array $args，参数是一个数组，包含多个成员参数。
所有可选的成员参数，都包含在下面的示例代码中。
*/
register_sidebar( array(
  'name'                        => '侧边栏',                  //侧边栏的名称
  'id'                              =>'sidebar-1' ,                    //侧边栏的编号
  'description'             => '侧边栏',                  //侧边栏的描述
  'class'                       => '',
  'before_widget'           => '<li id="%1$s" class="widget %2$s">',
  'after_widget'            => '</li>',
  'before_title'                => '<h3>',
  'after_title'                 => '</h3>'
) );
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
 * @Last Modified time: 2019-04-20 18:50:02
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