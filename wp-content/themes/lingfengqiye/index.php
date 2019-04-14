<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
    <div class="slider">
      <ul class="bxslider">
        <li><img src="<?php echo get_template_directory_uri()?>/images/s001.jpg" /></li>
        <li><img src="<?php echo get_template_directory_uri()?>/images/s002.jpg" /></li>
        <li><img src="<?php echo get_template_directory_uri()?>/images/s003.jpg" /></li>
        <li><img src="<?php echo get_template_directory_uri()?>/images/s004.jpg" /></li>
      </ul>
    </div><!-- .slider -->
    <div class="content">
      <div class="module xinxi01">
        <h2>
          <a href="<?php echo get_page_link(33);?>">公司简介</a>
          <span><a href="<?php echo get_page_link(33);?>" title="更多"></a></span>
        </h2>
        <div class="about">
          <?php $my_query = new WP_Query(array(
              'page_id' => 33
            ));
          ?>
          <?php if($my_query->have_posts()):while($my_query->have_posts()):$my_query->the_post();?>
            <?php if ( has_post_thumbnail() ) : ?>
               <?php the_post_thumbnail( 'lingfeng' ); ?>
            <?php endif; ?>
            <?php echo lingfeng_strimwidth(get_the_content(), 230);?>
          <?php endwhile;?>
          <?php endif;?>
        </div><!-- .about -->
      </div><!-- .xinxi01 -->
      <div class="module xinxi02">
        <?php
          $my_term = get_term_by('name','新闻动态', 'category');
          $my_term_ID = $my_term->term_id;
          $my_term_name = $my_term->name;
          $my_term_link = get_term_link($my_term_ID,'category');
        ?>
        <h2>
          <a href="<?php echo $my_term_link;?>"><?php echo $my_term_name;?></a>
          <span><a href="<?php echo $my_term_link;?>" title="更多"></a></span>
        </h2>
        <ul>
          <?php
            $my_query = new WP_Query(array(
                'cat' => $my_term_ID,
                'posts_per_page' => 1,
              ));
          ?>
          <li class="imgsuo">
            <?php if($my_query->have_posts()):while($my_query->have_posts()):$my_query->the_post();?>
              <a href="<?php the_permalink();?>""><img src="http://localhost/lingfengqiye/wp-content/uploads/2019/04/ggg-148x100.jpg" alt=""></a>
              <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
              <?php echo lingfeng_strimwidth(get_the_content(), 34);?>
              <div class="clear"></div>
            <?php endwhile;?>
            <?php endif;?>
          </li>
          <?php
            $my_query = new WP_Query(array(
                'category__in' => array($my_term_ID,7,8),
                'posts_per_page' => 5,
                'offset' => 1,
              ));
          ?>
          <?php if($my_query->have_posts()):while($my_query->have_posts()):$my_query->the_post();?>
            <li>
              <a href="<?php the_permalink();?>"><?php the_title();?></a>
            </li>
          <?php endwhile;?>
          <?php endif;?>
        </ul>
      </div><!-- .xinxi02 -->
      <div class="module xinxi03">
        <h2>
          <a href="<?php echo get_page_link(107);?>">企业荣誉</a>
          <span><a href="<?php echo get_page_link(107);?>" title="查看详细"></a></span>
        </h2>
        <div class="rongyu">
          <ul class="chuzhi-bxslider">
            <li><img src="<?php echo get_template_directory_uri();?>/images/honor01.jpg" /></li>
            <li><img src="<?php echo get_template_directory_uri();?>/images/honor02.jpg" /></li>
            <li><img src="<?php echo get_template_directory_uri();?>/images/honor03.jpg" /></li>
          </ul>
        </div><!-- .rongyu -->
      </div><!-- .xinxi03 -->
      <div class="module xinxi04">
        <?php
          $my_term = get_term_by('name','产品中心','category');
          $my_term_id = $my_term->term_id;
          $my_term_link = get_term_link($my_term_id,'category');
        ?>
        <h2>
          <a href="<?php echo $my_term_link;?>">产品展示</a>
          <span><a href="<?php echo $my_term_link;?>" title="查看详细"></a></span>
        </h2>
        <ul>
            <?php
              $my_query = new WP_Query(array(
                'cat'=>$my_term_id,
                'posts_per_page'=>8,
              ));
            ?>
            <?php if($my_query->have_posts()):while(
              $my_query->have_posts()):$my_query->the_post();?>
              <li>
                <a href="<?php the_permalink();?>">
                  <?php if ( has_post_thumbnail() ) : ?>
                     <?php the_post_thumbnail( 'thumbnail' ); ?>
                  <?php endif; ?>
                </a>
                <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
              </li>
            <?php endwhile;?>
            <?php endif;?>
        </ul>
      </div><!-- .xinxi04 -->
      <div class="module xinxi05"></div><!-- .xinxi05 -->
      <div class="clear"></div>
    </div><!-- .content -->
    <div class="footer"></div><!-- .footer -->
  </div><!-- .wrap -->

<?php wp_footer(); ?>
</body>
</html>