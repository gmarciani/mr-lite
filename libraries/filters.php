<?php

function mr_remove_more_jump_link($link) {
  $offset = strpos($link, '#more-');

  if ($offset) {
    $end = strpos($link, '"',$offset);
  }

  if ($end) {
    $link = substr_replace($link, '', $offset, $end-$offset);
  }

  return $link;
}
add_filter('the_content_more_link', 'mr_remove_more_jump_link');

function mr_post_gallery( $output, $attr) {
  global $post, $wp_locale;
  static $instance = 0;
  $instance++;

  if (isset( $attr['orderby'])) {
      $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
      if (!$attr['orderby'])
          unset( $attr['orderby'] );
  }

  extract(shortcode_atts(array(
      'order'      => 'ASC',
      'orderby'    => 'menu_order ID',
      'id'         => $post->ID,
      'itemtag'    => 'div',
      'icontag'    => 'div',
      'captiontag' => 'div',
      'columns'    => 3,
      'size'       => array(620,350),
      'include'    => '',
      'exclude'    => ''
  ), $attr));

  $id = intval($id);

  if ('RAND' == $order)
      $orderby = 'none';

  if (!empty($include)) {
      $include = preg_replace('/[^0-9,]+/', '', $include);
      $_attachments = get_posts(array('include'         => $include,
                                      'post_status'     => 'inherit',
                                      'post_type'       => 'attachment',
                                      'post_mime_type'  => 'image',
                                      'order'           => $order,
                                      'orderby'         => $orderby));
      $attachments = array();

      foreach ($_attachments as $key => $val) {
          $attachments[$val->ID] = $_attachments[$key];
      }

  } elseif ( !empty($exclude) ) {
      $exclude = preg_replace('/[^0-9,]+/', '', $exclude);
      $attachments = get_children(array('post_parent'     => $id,
                                        'exclude'         => $exclude,
                                        'post_status'     => 'inherit',
                                        'post_type'       => 'attachment',
                                        'post_mime_type'  => 'image',
                                        'order'           => $order,
                                        'orderby'         => $orderby));
  } else {
      $attachments = get_children(array('post_parent'     => $id,
                                        'post_status'     => 'inherit',
                                        'post_type'       => 'attachment',
                                        'post_mime_type'  => 'image',
                                        'order'           => $order,
                                        'orderby'         => $orderby));
  }

  if (empty($attachments))
      return '';

  if (is_feed()) {
      $output = "\n";
      foreach ($attachments as $att_id => $attachment)
          $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
      return $output;
  }

	$itemtag = tag_escape($itemtag);
	$selector = "carousel-{$instance}";
	$captiontag = tag_escape($captiontag);
  $output = "<div class='entry-gallery'>";
	$output .= "<div id='{$selector}' class='carousel slide carousel-{$id}'>";
	$output .= "<ol class='carousel-indicators'>";
	$j = 0;

  foreach ($attachments as $id => $attachment) {
  	$itemclass = ($j==0) ? 'active' : '';
  	$output .= "<li class='{$itemclass}' data-slide-to='{$j}' data-target='#{$selector}'></li>";
  	$j++;
  }

  $output .= "</ol>";
	$i = 0;
  $output .= "<div class='carousel-inner'>";

  foreach ($attachments as $id => $attachment) {
  	$itemclass = ($i == 0) ? 'item active' : 'item';
  	$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
  	$output .= "<{$itemtag} class='{$itemclass}'>";
  	$output .= "
      <{$icontag} class='carousel-icon'>
        $link
      </{$icontag}>";
  	if ($captiontag && trim($attachment->post_excerpt)) {
      $output .= "
        <{$captiontag} class='carousel-caption'>
        " . wptexturize($attachment->post_excerpt) . "
        </{$captiontag}>";
    }

  	$output .= "</{$itemtag}>";
  	$i++;
  }

  $output .= "</div>";
  $output .= "<a data-slide='prev' href='#{$selector}' class='carousel-control left'><i class='fa fa-chevron-left'></i></a>";
  $output .= "<a data-slide='next' href='#{$selector}' class='carousel-control right'><i class='fa fa-chevron-right'></i></a>";
  $output .= "</div>";
  $output .= "</div>";

  return $output;
}
add_filter('post_gallery', 'mr_post_gallery', 10, 2);

?>
