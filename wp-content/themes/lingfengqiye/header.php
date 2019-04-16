<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php wp_title('-',true,'right'); ?></title>
<?php wp_head(); ?>
</head>
<body>
  <div class="wrap">
    <div class="header">
      <div class="header-top">
        <h1 class="top-left">
          <a href="<?php bloginfo('url');?>"><img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt=""></a>
        </h1><!-- .top-left -->
        <div class="top-right">
          <div class="top-nav">
            <?php
            /*
            wp_nav_menu( $args )
            @参数 array $args, 传递此参数时用array(成员参数名=>成员参数值)
            特别说明：
            调用导航菜单时，可以直接复制以下代码。然后根据需要删除成员参数
            */
            wp_nav_menu( array(
              'theme_location'  => 'daohangding',                  //[保留]
              'menu'          => '',                  //[可删]
              'container'       => false,             //[可删]
              'container_class' => '',                  //[可删]
              'container_id'    => '',                  //[可删]
              'menu_class'    => 'menu',            //[可删]
              'menu_id'       => '',                  //[可删]
              'echo'          => true,              //[可删]
              'fallback_cb'     => 'wp_page_menu',    //[可删]
              'before'          => '',                  //[可删]
              'after'           => '',                  //[可删]
              'link_before'     => '',                  //[可删]
              'link_after'        => '',                  //[可删]
              'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',  //[可删]
              'depth'         => 0,               //[可删]
              'walker'          => ''                 //[可删]
            ) );
            ?>
          </div><!-- .top-nav -->
          <div class="top-search">
            <?php get_search_form();?>
          </div><!-- .top-search -->
        </div><!-- .top-right -->
        <div class="clear"></div>
      </div><!-- .header-top -->
      <div class="header-nav">
        <?php
        /*
        wp_nav_menu( $args )
        @参数 array $args, 传递此参数时用array(成员参数名=>成员参数值)
        特别说明：
        调用导航菜单时，可以直接复制以下代码。然后根据需要删除成员参数
        */
        wp_nav_menu( array(
          'theme_location'  => 'daohangzhu',                  //[保留]
          'menu'          => '',                  //[可删]
          'container'       => false,             //[可删]
          'container_class' => '',                  //[可删]
          'container_id'    => '',                  //[可删]
          'menu_class'    => 'menu',            //[可删]
          'menu_id'       => '',                  //[可删]
          'echo'          => true,              //[可删]
          'fallback_cb'     => 'wp_page_menu',    //[可删]
          'before'          => '',                  //[可删]
          'after'           => '',                  //[可删]
          'link_before'     => '',                  //[可删]
          'link_after'        => '',                  //[可删]
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',  //[可删]
          'depth'         => 0,               //[可删]
          'walker'          => ''                 //[可删]
        ) );
        ?>
      </div><!-- .header-nav -->
    </div><!-- .header -->