<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php mr_entry_meta(); ?>
	</header>
	<?php if (has_post_thumbnail()) : ?>
	<div class="entry-thumbnail">
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
	</div>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content('<span class="btn btn-small continue-reading">' . __('Continue reading', 'mr-lite') . '</span>'); ?>
		<?php wp_link_pages(array(
				'before' 			=> '<div class="page-links">',
				'after'  			=> '</div>',
				'link_before' => '<span class="btn btn-small">',
				'link_after'  => '</span>'));
		?>
	</div>
</article>
