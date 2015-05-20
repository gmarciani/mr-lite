<?php

function register_section_copyright($wp_customize) {
  $wp_customize->add_section(
    'mr_section_copyright', array(
    'title'       => __('Copyright', 'mr-lite'),
    'description' => __('Change copyright options here.', 'mr-lite'),
    'capability'  => 'edit_theme_options',
    'priority'    => 4)
  );
}

function register_setting_copyright_owner($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[copyright_owner]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[copyright_owner]', array(
    'label'       => __('Owner', 'mr-lite'),
    'section'     => 'mr_section_copyright',
    'settings'    => 'mr_theme_options[copyright_owner]',
    'priority'    => 1))
  );
}

?>
