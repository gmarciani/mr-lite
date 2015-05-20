<?php

require_once('controls.php');

function register_section_brand($wp_customize) {
  $wp_customize->add_section(
    'mr_section_brand', array(
    'title'       => __('Brand', 'mr-lite'),
    'description' => __('Change brand options here.', 'mr-lite'),
    'capability'  => 'edit_theme_options',
    'priority'    => 1)
  );
}

function register_setting_tagline($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[tagline]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[tagline]', array(
    'label'       => __('Tagline', 'mr-lite'),
    'section'     => 'mr_section_brand',
    'settings'    => 'mr_theme_options[tagline]',
    'priority'    => 1))
  );
}

function register_setting_about($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[about]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new DW_Minion_Textarea_Custom_Control(
    $wp_customize,
    'mr_theme_controls[about]', array(
    'label'       => __('About', 'mr-lite'),
    'section'     => 'mr_section_brand',
    'settings'    => 'mr_theme_options[about]',
    'priority'    => 2))
  );
}

?>
