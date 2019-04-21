<?php get_header();?>
<div class="banner">
    <img src="<?php echo get_template_directory_uri();?>/images/default-banner.jpg" alt="">
</div><!-- .banner -->
<div class="error">
    <div class="bread">
        您现在的位置:<?php lingfeng_breadcrumbs();?>
    </div><!-- .bread -->
    <div class="errorinfo">
        <h4>抱歉，您访问的网站页面不存在!</h4>
        <span>The requested URL was not found on this server. </span>
        <strong>您可以尝试以下操作：</strong>
        <ol>
            <li>检查您输入的网址拼写是否正确。</li>
            <li>您可以 <a href="http://biz.wpyou.com/">返回首页</a>，浏览更多精彩内容。</li>
            <li>使用站内搜索，查找您要的内容。<br>
                <?php get_search_form();?>
            </li>
        </ol>
    </div><!-- .errorinfo -->
</div><!-- .error -->
<?php get_footer();?>