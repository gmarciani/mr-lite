<?php

function mr_page_title() {
  wp_title(' | ', true, 'right');
}

function mr_body_class() {
  $body_classes = array();

  if (is_home()) {
    array_push($body_classes, 'is-home');
  } else if (is_singular()) {
    array_push($body_classes, 'is-post');
  } else if (is_search()) {
    array_push($body_classes, 'is-search');
  } else if (is_category()) {
    array_push($body_classes, 'is-category');
  } else if (is_archive()) {
    array_push($body_classes, 'is-archive');
  } else if (is_author()) {
    array_push($body_classes, 'is-author');
  } else if (is_404()) {
    array_push($body_classes, 'is-404');
  }

  printf('class="%1$s"', implode (", ", $body_classes));
}

function mr_top_nav() {
  $logo                     = get_template_directory_uri() . '/dist/images/logo.png';

  $brand_nav_pages = array(
    'about'         => get_page_by_path('studio')->ID,
    'competences'   => get_page_by_path('competences')->ID,
    'testimonials'  => get_page_by_path('testimonials')->ID,
    'contact'       => get_page_by_path('contact')->ID,
  );

  $brand_nav_items = array(
    'about'         => array(
                        'title'       => get_the_title($brand_nav_pages['about']),
                        'description' => get_post_meta($brand_nav_pages['about'], 'page_description', true),
                        'link'        => get_post_permalink($brand_nav_pages['about'])
                       ),
    'competences'   => array(
                        'title'       => get_the_title($brand_nav_pages['competences']),
                        'description' => get_post_meta($brand_nav_pages['competences'], 'page_description', true),
                        'link'        => get_post_permalink($brand_nav_pages['competences'])
                       ),
    'testimonials'  => array(
                        'title'       => get_the_title($brand_nav_pages['testimonials']),
                        'description' => get_post_meta($brand_nav_pages['testimonials'], 'page_description', true),
                        'link'        => get_post_permalink($brand_nav_pages['testimonials'])
                       ),
    'contact'       => array(
                        'title'       => get_the_title($brand_nav_pages['contact']),
                        'description' => get_post_meta($brand_nav_pages['contact'], 'page_description', true),
                        'link'        => get_post_permalink($brand_nav_pages['contact'])
                       )
  );

  ?>

  <div class="brand-nav">
    <div class="brand-nav-container">
      <div class="brand-nav-logo">
        <div class="brand-nav-logo-container">
          <a href="<?php echo esc_url(home_url('/')); ?>" ><img alt="<?php esc_attr(get_bloginfo('name', 'display')); ?>" src="<?php echo $logo ?>" /></a>
        </div>
      </div>
      <div class="brand-nav-items">
        <div class="brand-nav-item">
          <div class="brand-nav-item-container">
            <h5 class="brand-nav-item-title"><a href="<?php echo esc_url($brand_nav_items['about']['link']); ?>"><?php echo $brand_nav_items['about']['title'];; ?></a></h5>
            <p class="brand-nav-item-description"><?php echo $brand_nav_items['about']['description']; ?></p>
        </div>
        </div>
        <div class="brand-nav-item">
          <div class="brand-nav-item-container">
            <h5 class="brand-nav-item-title"><a href="<?php echo esc_url($brand_nav_items['competences']['link']); ?>"><?php echo $brand_nav_items['competences']['title']; ?></a></h5>
            <p class="brand-nav-item-description"><?php echo $brand_nav_items['competences']['description']; ?></p>
          </div>
        </div>
        <div class="brand-nav-item">
          <div class="brand-nav-item-container">
            <h5 class="brand-nav-item-title"><a href="<?php echo esc_url($brand_nav_items['testimonials']['link']); ?>"><?php echo $brand_nav_items['testimonials']['title']; ?></a></h5>
            <p class="brand-nav-item-description"><?php echo $brand_nav_items['testimonials']['description']; ?></p>
          </div>
        </div>
        <div class="brand-nav-item">
          <div class="brand-nav-item-container">
            <h5 class="brand-nav-item-title"><a class="text-highlight" href="<?php echo esc_url($brand_nav_items['contact']['link']); ?>"><?php echo $brand_nav_items['contact']['title']; ?></a></h5>
            <p class="brand-nav-item-description"><?php echo $brand_nav_items['contact']['description']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
}

function mr_main_nav() {
  $logo = get_template_directory_uri() . '/dist/images/logo.png';

  ?>

  <div class="site-nav-brand">
    <div class="site-nav-brand-container">
      <div class="brand-nav-item logo">
        <div class="brand-nav-item-container">
          <a href="<?php echo esc_url(home_url('/')); ?>" ><img alt="<?php esc_attr(get_bloginfo('name', 'display')); ?>" src="<?php echo $logo ?>" /></a>
        </div>
      </div>
    </div>
  </div>
  <div class="site-nav-widgets">
    <div class="site-nav-widgets-container">
      <?php get_sidebar(); ?>
    </div>
  </div>

  <?php
}

function mr_main_menu() {
  wp_nav_menu(array(
    'theme_location'  => 'main-menu',
    'container'       => 'nav',
    'container_class' => 'menu-main-menu widget',
    'depth'           => '0',

  ));
}

function mr_site_actions() {
  $social_links['facebook']     = mr_get_theme_option('facebook_id', '');
  $social_links['twitter']      = mr_get_theme_option('twitter_id', '');
  $social_links['google_plus']  = mr_get_theme_option('google_plus_id', '');
  $social_links['youtube']      = mr_get_theme_option('youtube_id', '');
  $social_links['linkedin']     = mr_get_theme_option('linkedin_id', '');
  $social_links['linkedin']     = mr_get_theme_option('linkedin_id', '');
  $social_links['contact']      = mr_get_theme_option('contact_page', '');

  ?>

  <div id="actions" class="site-actions">
      <div id="show-menu" class="action show-site-nav">
          <i class="fa fa-bars"></i>
      </div>
      <div class="actions">
          <div class="action search">
              <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="action searchform">
                  <input type="text" placeholder="Search" id="s" name="s" class="search-query">
                  <input type="hidden" value="post" name="post_type" id="post_type" />
                  <label for="s"></label>
              </form>
          </div>
          <div class="action socials">
              <i class="fa fa-link active-socials"></i>
              <?php if(count($social_links) > 0) : ?>
                <ul class="unstyled list-socials clearfix" style="width: <?php echo count($social_links)*40; ?>px;">
                  <?php if($social_links['facebook']    != '')  : ?><li id="facebook" class="social"><a href="<?php echo $social_links['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>   <?php endif; ?>
                  <?php if($social_links['twitter']     != '')  : ?><li id="twitter"  class="social"><a href="<?php echo $social_links['twitter']; ?>"  target="_blank"><i class="fa fa-twitter"></i></a></li>    <?php endif; ?>
                  <?php if($social_links['google_plus'] != '')  : ?><li id="googlep"  class="social"><a href="<?php echo $social_links['youtube']; ?>"  target="_blank"><i class="fa fa-google-plus"></i></a></li><?php endif; ?>
                  <?php if($social_links['youtube']     != '')  : ?><li id="youtube"  class="social"><a href="<?php echo $social_links['youtube']; ?>"  target="_blank"><i class="fa fa-youtube"></i></a></li>    <?php endif; ?>
                  <?php if($social_links['linkedin']    != '')  : ?><li id="linkedin" class="social"><a href="<?php echo $social_links['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>   <?php endif; ?>
                  <?php if($social_links['contact']     != '')  : ?><li id="email"    class="social"><a href="<?php echo get_permalink($social_links['contact']); ?>"  ><i class="fa fa-envelope-o"></i></a></li> <?php endif; ?>
              </ul>
              <?php endif; ?>
          </div>
          <a class="action back-top" href="#page"><i class="fa fa-chevron-up"></i></a>
      </div>
  </div>

  <?php
}

function mr_footer_contacts() {

  $contacts['home']     = mr_get_theme_option('address', '');
  $contacts['phone']    = mr_get_theme_option('phone', '');
  $contacts['mobile']   = mr_get_theme_option('mobile', '');
  $contacts['skype']    = mr_get_theme_option('skype', '');
  $contacts['whatsapp'] = mr_get_theme_option('whatsapp', '');
  $contacts['fax']      = mr_get_theme_option('fax', '');
  $contacts['email']    = mr_get_theme_option('email', '');

  if ($contacts['home']   != '')    : ?> <p><i class="fa fa-home"      ></i><?php echo $contacts['home'];     ?></p> <?php endif;
  if ($contacts['phone']  != '')    : ?> <p><i class="fa fa-phone"     ></i><?php echo $contacts['phone'];    ?></p> <?php endif;
  if ($contacts['mobile'] != '')    : ?> <p><i class="fa fa-mobile"    ></i><?php echo $contacts['mobile'];   ?></p> <?php endif;
  if ($contacts['skype']  != '')    : ?> <p><i class="fa fa-skype"     ></i><?php echo $contacts['skype'];    ?></p> <?php endif;
  if ($contacts['whatsapp']  != '') : ?> <p><i class="fa fa-whatsapp"  ></i><?php echo $contacts['whatsapp']; ?></p> <?php endif;
  if ($contacts['fax']    != '')    : ?> <p><i class="fa fa-fax"       ></i><?php echo $contacts['fax'];      ?></p> <?php endif;
  if ($contacts['email']  != '')    : ?> <p><i class="fa fa-envelope-o"></i><?php echo $contacts['email'];    ?></p> <?php endif;
}

function mr_footer_subscription() {

  $subscription_form = mr_get_theme_option('subscription_form');

  if ($subscription_form != '') : ?> <p><a class="btn btn-small" href="<?php echo $subscription_form; ?>" target="_blank"><?php _e('Subscribe', 'mr-lite');?></a></p><?php endif;
}

function mr_footer_copyright() {
  printf('<p>%1$s %2$s.</p>', __('All rights reserved to', 'mr-lite'), mr_get_theme_option('copyright_owner'));
}

function mr_entry_meta() {
	if (get_post_type() != 'post' || has_post_format('link')) return false;
	echo '<div class="entry-meta">';
	if (!has_post_format('quote')) {
		printf( __( '<span class="byline">By <span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span></span>', 'dw-minion' ),
			esc_url(get_author_posts_url(get_the_author_meta('ID'))),
			esc_attr(sprintf(__('View all posts by %s', 'mr-lite'), get_the_author())),
			esc_html(get_the_author())
		);

		$categories_list = get_the_category_list(',');
		if ($categories_list)
			printf(__( '<span class="cat-links"> | About %1$s</span>', 'mr-lite'), $categories_list);

		if (get_post_format() == 'gallery') {
			$post_format_icon  = 'fa fa-picture-o';
      $post_format_query = '#';
		} else if (get_post_format() == 'video') {
			$post_format_icon  = 'fa fa-video-camera';
      $post_format_query = '#';
		} else if (get_post_format() == 'quote') {
			$post_format_icon  = 'fa fa-quote-left';
      $post_format_query = '#';
		} else if (get_post_format() == 'link') {
			$post_format_icon  = 'fa fa-link';
      $post_format_query = '#';
		} else {
			$post_format_icon  = 'fa fa-file-text';
      $post_format_query = '#';
		}
		printf('<span class="sep"><span class="post-format"><a href="%1$s"><i class="%2$s"></i></a></span></span>',
      esc_url($post_format_query),
      $post_format_icon);
	}

	$time_string = sprintf('<time class="entry-date published" datetime="%1$s">%2$s</time>',
		esc_attr(get_the_date('c')),
		esc_html(get_the_date())
	);

	printf('<span class="posted-on"><a href="%1$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %2$s</a></span>',
		esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))),
		$time_string
	);

	if (!post_password_required() && comments_open()) { ?>
		<span class="comments-link">
      <?php comments_popup_link(__('<i class="fa fa-comment-o"></i> 0 Comment', 'mr-lite'),
                                __('<i class="fa fa-comment-o"></i> 1 Comment', 'mr-lite'),
                                __('<i class="fa fa-comment-o"></i> % Comments', 'mr-lite')); ?>
    </span>
	<?php }

	echo '</div>';
}

function mr_content_nav($nav_id) {
	global $wp_query, $post;
  if ((is_home() || is_archive() || is_search()) && $wp_query->max_num_pages > 1) {
    $nav_class = 'paging-navigation pager';
    ?>
	  <nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
  		<div class="nav-previous">
  			<?php
        if (get_previous_posts_link()) {
          previous_posts_link(__('<span class="meta-nav btn"><i class="fa fa-chevron-left"></i></span>', 'dw-minion'));
        } else {
          echo '<span class="btn disabled"><i class="fa fa-chevron-left"></i></span>';
        }
        ?>
  		</div>
  		<div class="nav-next">
  			<?php
        if (get_next_posts_link()) {
          next_posts_link(__('<span class="meta-nav btn"><i class="fa fa-chevron-right"></i></span>', 'dw-minion'));
        } else {
          echo '<span class="btn disabled"><i class="fa fa-chevron-right"></i></span>';
        }
        ?>
  		</div>
	</nav>
	<?php
  }
}

function mr_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e('Pingback:', 'mr-lite'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __('Edit', 'mr-lite'), '<span class="edit-link">', '</span>'); ?>
		</div>
	<?php else : ?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children'] ) ? '' : 'parent'); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, 60 ); ?>
					<?php printf(__( '%s', 'mr-lite'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link())); ?>
				</div>
				<div class="comment-metadata">
					<a class="comment-datetime" href="<?php echo esc_url(get_comment_link( $comment->comment_ID)); ?>">
						<i class="fa fa-clock-o"></i>
						<time datetime="<?php comment_time('c'); ?>">
							<?php printf(_x('%1$s at %2$s', '1: date, 2: time', 'mr-lite'), get_comment_date(), get_comment_time()); ?>
						</time>
					</a>
					<?php edit_comment_link(__('<i class="fa fa-pencil"></i> Edit', 'mr-lite' ), '<span class="edit-link">', '</span>'); ?>
				</div>
				<?php if ('0' == $comment->comment_approved) : ?>
				<p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'mr-lite'); ?></p>
				<?php endif; ?>
			</footer>
			<div class="comment-content">
				<?php comment_text(); ?>
			</div>
			<span class="reply">
				<?php comment_reply_link(array_merge($args, array('add_below' => 'div-comment', 'reply_text' => '<i class="fa fa-reply"></i> Reply' ,'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
			</span>
		</article>
	<?php
	endif;
}

function mr_get_free_consultancy() {
  $social_links['contact']      = mr_get_theme_option('contact_page', '');
  ?>

  <div class="get-free-consultancy">
    <a class="btn btn-small" href="<?php echo get_permalink($social_links['contact']); ?>"><?php _e('Get Free Consultancy', 'mr-lite')?></a>
  </div>
  <?php
}

function mr_related_post($post_id) {
	$tags = wp_get_post_tags($post_id);
	if ($tags) {
		$tag_ids = array();
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
		$args = array (
			'tag__in' => $tag_ids,
			'post__not_in' => array($post_id),
			'posts_per_page' => 5,
			'ignore_sticky_posts'=>1
		);
	} else {
		$args = array (
			'post__not_in' => array($post_id),
			'posts_per_page' => 5,
			'ignore_sticky_posts'=>1
		);
	}

  $related_query = new wp_query( $args );

  if ($related_query->have_posts()) : ?>
    <div class="related-posts">
		    <h2 class="related-posts-title"><?php _e('Related Articles.', 'dw_minion'); ?></h2>
		      <div class="related-content">
            <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
              <article class="related-post clearfix">
      					<h3 class="related-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
      					<div class="related-meta"><time class="related-date"><?php echo get_the_date('d M, Y'); ?></time></div>
      				</article>
            <?php endwhile; ?>
          </div>
        </div>
  <?php endif; ?>

  <?php

  wp_reset_query();

}

?>
