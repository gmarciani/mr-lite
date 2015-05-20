<?php get_header(); ?>

<div id="primary" class="content-area">
	<div class="primary-inner">
		<div id="content" class="site-content" role="main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"> <?php _e('Oops! That page can\'t be found', 'mr-lite'); ?>.</h1>
				</header>
				<div class="page-content">
					<p><?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'mr-lite'); ?></p>
					<?php get_search_form(); ?>
				</div>
			</section>
		</div>
	</div>
</div>

<?php get_footer(); ?>
