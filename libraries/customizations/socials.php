<?php

function register_section_socials($wp_customize) {
  $wp_customize->add_section(
    'mr_section_socials', array(
    'title'       => __('Socials', 'mr-lite'),
    'description' => __('Change socials options here.', 'mr-lite'),
    'capability'  => 'edit_theme_options',
    'priority'    => 3)
  );
}

function register_setting_facebook($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[facebook_id]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[facebook_id]', array(
    'label'       => __('Facebook ID', 'mr-lite'),
    'section'     => 'mr_section_socials',
    'settings'    => 'mr_theme_options[facebook_id]',
    'priority'    => 1))
  );
}

function register_setting_twitter($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[twitter_id]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[twitter_id]', array(
    'label'       => __('Twitter ID', 'mr-lite'),
    'section'     => 'mr_section_socials',
    'settings'    => 'mr_theme_options[twitter_id]',
    'priority'    => 2))
  );
}

function register_setting_google_plus($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[google_plus_id]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[google_plus_id]', array(
    'label'       => __('Google+ ID', 'mr-lite'),
    'section'     => 'mr_section_socials',
    'settings'    => 'mr_theme_options[google_plus_id]',
    'priority'    => 3))
  );
}

function register_setting_youtube($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[youtube_id]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[youtube_id]', array(
    'label'       => __('Youtube ID', 'mr-lite'),
    'section'     => 'mr_section_socials',
    'settings'    => 'mr_theme_options[youtube_id]',
    'priority'    => 4))
  );
}

function register_setting_linkedin($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[linkedin_id]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[linkedin_id]', array(
    'label'       => __('Linkedin ID', 'mr-lite'),
    'section'     => 'mr_section_socials',
    'settings'    => 'mr_theme_options[linkedin_id]',
    'priority'    => 5))
  );
}

function register_setting_quora($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[quora_id]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[quora_id]', array(
    'label'       => __('Quora ID', 'mr-lite'),
    'section'     => 'mr_section_socials',
    'settings'    => 'mr_theme_options[quora_id]',
    'priority'    => 6)
    )
  );
}

?>
