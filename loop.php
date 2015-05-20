<?php

if (have_posts()) :
  while (have_posts()) : the_post();
    get_template_part('content', get_post_format());
  endwhile;
  mr_content_nav('nav-below');
else :
  get_template_part('content', 'no-results');
endif;

?>
