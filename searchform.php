<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _e('Search for:', 'mr-lite'); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'mr-lite'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php _ex('Search for:', 'label', 'mr-lite'); ?>">
	</label>
	<input type="hidden" value="post" name="post_type" id="post_type"/>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button', 'mr-lite'); ?>">
</form>
