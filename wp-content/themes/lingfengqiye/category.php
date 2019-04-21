<?php get_header();?>
<div class="banner">
    <img src="<?php echo get_template_directory_uri();?>/images/default-banner.jpg" alt="">
</div><!-- .banner -->
<div class="fenlei">
    <?php get_sidebar();?>
    <div class="contentr">
        <div class="mianbaoxie">
            您现在的位置:<?php lingfeng_breadcrumbs();?>
        </div><!-- .mianbaoxie -->
        <div class="postlist">
            <?php if(is_category(array('产品中心','办公设备','电脑硬件','数码相机','手机电话'))){?>
                <?php
                    if(get_query_var('paged')) {
                        $my_paged = get_query_var('paged');
                    } else {
                        $my_paged = 1;
                    }
                ?>
                <?php
                    $my_query = new WP_Query(array(
                    'cat'=>get_query_var('cat'),
                    'posts_per_page'=>12,
                    'paged'=>$my_paged,
                    ));
                ?>
                <ul class="imgmode">
                    <?php if($my_query->have_posts()):while($my_query->have_posts()):$my_query->the_post();?>
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
                <div class="clear">

                </div>
                <?php lingfeng_custom_pagenavi($my_query);?>
            <?php } else { ?>
                <?php
                    if(get_query_var('paged')) {
                        $my_paged = get_query_var('paged');
                    } else {
                        $my_paged = 1;
                    }
                ?>
                <?php
                    $my_query = new WP_Query(array(
                    'cat'=>get_query_var('cat'),
                    'posts_per_page'=>20,
                    'paged'=>$my_paged,
                    ));
                ?>
                <ul class="listmode">
                    <?php if($my_query->have_posts()):while($my_query->have_posts()):$my_query->the_post();?>
                      <li>
                        <span><?php the_time('Y-m-d h:i:s');?></span>
                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                      </li>
                    <?php endwhile;?>
                    <?php endif;?>
                </ul>
                <?php lingfeng_custom_pagenavi($my_query);?>
            <?php } ?>
        </div><!-- .postlist -->
    </div><!-- .contentr -->
    <div class="clear"></div><!-- .clear -->
</div><!-- .fenlei -->
<?php get_footer();?>