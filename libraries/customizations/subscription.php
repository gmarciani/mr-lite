<?php

function register_section_subscription($wp_customize) {
  $wp_customize->add_section(
    'mr_section_subscription', array(
    'title'       => __('Subscription', 'mr-lite'),
    'description' => __('Change subscription options here.', 'mr-lite'),
    'capability'  => 'edit_theme_options',
    'priority'    => 5)
  );
}

function register_setting_subscription_form($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[subscription_form]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[subscription_form]', array(
    'label'       => __('Subscription Form', 'mr-lite'),
    'section'     => 'mr_section_subscription',
    'settings'    => 'mr_theme_options[subscription_form]',
    'priority'    => 1))
  );
}

?>
