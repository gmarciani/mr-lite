<?php get_header(); ?>

<div id="primary" class="content-area">
	<div class="primary-inner">
		<div id="content" class="site-content" role="main">
		<?php
		while (have_posts()) : the_post();
			get_template_part('content', 'single');
			mr_get_free_consultancy();
			mr_related_post($post->ID);
			if (comments_open()) comments_template();
		endwhile;
		?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
