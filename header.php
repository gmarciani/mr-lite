<!DOCTYPE html>

<html class="no-js" prefix="og: http://ogp.me/ns#" <?php language_attributes(); ?>>

<head>

  <!-- General -->

  <meta charset="<?php bloginfo('charset'); ?>">

  <title><?php mr_page_title(); ?></title>

  <meta name="viewport"               content="width=device-width, initial-scale=1.0 user-scalable=no">

  <!-- Wordpress -->
  <link rel="profile" 	href="http://gmpg.org/xfn/11">
  <link rel="pingback" 	href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>

</head>

<body <?php mr_body_class(); ?>>

<?php mr_site_actions(); ?>

<div id="page" class="page">
	<div class="page-container">

    <section role="banner">
      <?php mr_top_nav(); ?>
    </section>

    <section role="navigation">
  		<div id="site-nav" class="site-nav">
        <div class="site-nav-container">
          <?php mr_main_nav(); ?>
    		</div>
      </div>
    </section>

    <section role="main">
      <div id="main" class="site-main">
	       <div class="site-main-container">
