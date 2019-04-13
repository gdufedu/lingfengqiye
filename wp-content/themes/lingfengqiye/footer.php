	<div class="footer">
		<div class="footer-nav">
			<?php
			/*
			wp_nav_menu( $args )
			@参数 array $args, 传递此参数时用array(成员参数名=>成员参数值)
			特别说明：
			调用导航菜单时，可以直接复制以下代码。然后根据需要删除成员参数
			*/
			wp_nav_menu( array(
			  'theme_location'	=> 'daohangdi',			//[保留]
			  'menu'					=> '',									//[可删]
			  'container'				=> false,							//[可删]
			  'container_class'	=> '',									//[可删]
			  'container_id'		=> '',									//[可删]
			  'menu_class'		=> 'menu',						//[可删]
			  'menu_id'				=> '',									//[可删]
			  'echo'					=> true,							//[可删]
			  'fallback_cb'			=> 'wp_page_menu',		//[可删]
			  'before'					=> '',									//[可删]
			  'after'						=> '',									//[可删]		
			  'link_before'			=> '',									//[可删]
			  'link_after'				=> '',									//[可删]
			  'items_wrap'			=> '<ul id="%1$s" class="%2$s">%3$s</ul>',	//[可删]
			  'depth'					=> -1,								//[可删]
			  'walker'					=> ''									//[可删]			
			) );
			?>
		</div><!-- .footer-na -->
		<div class="copyinfo">
		Copyright © 2014 All Rights Reserved.
		</div><!-- .copyinfo -->
	</div><!-- .footer -->
</div><!-- .wrap -->

<?php wp_footer(); ?>
</body>
</html>