<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php mr_entry_meta(); ?>
	</header>
	<?php if (has_post_thumbnail()) : ?>
	<div class="entry-thumbnail"><?php the_post_thumbnail(); ?></div>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content(__('Continue reading', 'mr-lite') . '<span class="meta-nav">&rarr;</span>'); ?>
		<?php
			wp_link_pages( array(
				'before' 			=> '<div class="page-links">',
				'after'  			=> '</div>',
				'link_before' => '<span class="btn btn-small">',
				'link_after'  => '</span>'));
		?>
	</div>
</article>
