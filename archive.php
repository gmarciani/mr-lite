<?php get_header(); ?>

<div id="primary" class="content-area">
	<div class="primary-inner">
		<header class="page-header">
			<h1 class="page-title">
				<?php
					if (is_category()) {
						printf('<span class="text-highlight">%s<span>', single_cat_title('', false));
					} elseif (is_tag()) {
						printf(__('Tag: %s', 'mr-lite'), '<span class="text-highlight">' . single_tag_title('', false) . '</span>');
					} elseif (is_author()) {
						the_post();
						printf(__('Author: %s', 'mr-lite'), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>');
						rewind_posts();
					} elseif (is_day()) {
						printf(__('Day: %s', 'mr-lite'), '<span class="text-highlight">' . get_the_date() . '</span>');
					} elseif (is_month() ) {
						printf(__('Month: %s', 'mr-lite'), '<span class="text-highlight">' . get_the_date('F Y') . '</span>');
					} elseif (is_year() ) {
						printf(__('Year: %s', 'mr-lite'), '<span class="text-highlight">' . get_the_date('Y') . '</span>');
					} elseif (is_tax('post_format', 'post-format-aside')) {
						printf(__('Archive: %s', 'mr-lite'), '<span class="text-highlight">' . __('Asides', 'mr-lite') . '</span>');
					} elseif (is_tax('post_format', 'post-format-image')) {
						printf(__('Archive: %s', 'mr-lite'), '<span class="text-highlight">' . __('Images', 'mr-lite') . '</span>');
					} elseif (is_tax('post_format', 'post-format-video')) {
						printf(__('Archive: %s', 'mr-lite'), '<span class="text-highlight">' . __('Videos', 'mr-lite') . '</span>');
					} elseif ( is_tax('post_format', 'post-format-quote')) {
						printf(__('Archive: %s', 'mr-lite'), '<span class="text-highlight">' . __('Quotes', 'mr-lite') . '</span>');
					} elseif (is_tax('post_format', 'post-format-link')) {
						printf(__('Archive: %s', 'mr-lite'), '<span class="text-highlight">' . __('Links', 'mr-lite') . '</span>');
					} else {
						_e('Archives', 'mr-lite');
					}
				?>
			</h1>

			<?php
				$term_description = term_description();
				if (!empty($term_description)) :
					printf('<div class="taxonomy-description">%s</div>', $term_description);
				endif;
			?>

		</header>

		<div id="content" class="site-content content-list" role="main">
			<?php get_template_part('loop'); ?>
		</div>

	</div>
</div>

<?php get_footer(); ?>
