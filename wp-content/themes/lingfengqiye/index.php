<?php get_header();?>
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
      <div class="module xinxi05">
        <?php
          $my_term = get_term_by('name','公司新闻','category');
          $my_term_id = $my_term->term_id;
          $my_term_link = get_page_link($my_term_id,'category');
        ?>
        <h2>
          <a href="<?php echo $my_term_link;?>">公司新闻</a>
          <span><a href="<?php echo $my_term_link;?>" title="查看详细"></a></span>
        </h2>
        <ul>
          <?php
            $my_query = new WP_Query(array(
              'cat'=>$my_term_id,
              'posts_per_page'=>14
            ));
          ?>
          <?php if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post(); ?>
          <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
          <?php endwhile; ?>
          <?php endif; ?>
        </ul>
      </div><!-- .xinxi05 -->
      <div class="clear"></div>
    </div><!-- .content -->
<?php get_footer();?>