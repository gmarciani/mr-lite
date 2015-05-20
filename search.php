<?php get_header(); ?>

<div id="primary" class="content-area">
	<div class="primary-inner">
		<header class="page-header">
			<h1 class="page-title"><?php _e('Search Results for ', 'mr-lite'); ?><span class="search-query text-highlight"><?php echo get_search_query(); ?></span></h1>
		</header>
		<div id="content" class="site-content content-list" role="main">
		<?php get_template_part('loop'); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
