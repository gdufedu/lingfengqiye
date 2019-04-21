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
                <ul class="listmode">
                    <?php if(have_posts()):while(have_posts()):the_post();?>
                      <li>
                        <span><?php the_time('Y-m-d h:i:s');?></span>
                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                      </li>
                    <?php endwhile;?>
                    <?php endif;?>
                </ul>
                <?php lingfeng_custom_pagenavi($my_query);?>
        </div><!-- .postlist -->
    </div><!-- .contentr -->
    <div class="clear"></div><!-- .clear -->
</div><!-- .fenlei -->
<?php get_footer();?>