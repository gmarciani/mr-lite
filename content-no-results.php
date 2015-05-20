<section class="no-results not-found">
	<div class="page-content">
		<?php if (is_category()) : return; ?>
		<?php if (is_home() && current_user_can('publish_posts')) : ?>
			<p><?php _e('Ready to publish your first post?', 'mr-lite'); ?><a href="<?php esc_url(admin_url('post-new.php')); ?>"><?php _e('Get started here', 'mr-lite'); ?></a></p>
		<?php elseif (is_search()) : ?>
			<p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mr-lite'); ?></p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mr-lite'); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div>
</section>
