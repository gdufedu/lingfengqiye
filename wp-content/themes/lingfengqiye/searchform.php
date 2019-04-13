<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>" class="topsearch">
    <div>
        <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="搜索" />
    </div>
</form>