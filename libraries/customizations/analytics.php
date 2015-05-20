<?php

function register_section_analytics($wp_customize) {
  $wp_customize->add_section(
    'mr_section_analytics', array(
    'title'       => __('Analytics', 'mr-lite'),
    'description' => __('Change analytics options here.', 'mr-lite'),
    'capability'  => 'edit_theme_options',
    'priority'    => 6)
  );
}

function register_setting_google_analytics($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[google_analytics_id]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[google_analytics_id]', array(
    'label'       => __('Google Analytics UA-ID', 'mr-lite'),
    'section'     => 'mr_section_analytics',
    'settings'    => 'mr_theme_options[google_analytics_id]',
    'priority'    => 1))
  );
}

?>
