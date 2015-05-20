<?php

function register_section_contacts($wp_customize) {
  $wp_customize->add_section(
    'mr_section_contacts', array(
    'title'       => __('Contacts', 'mr-lite'),
    'description' => __('Change contacts options here.', 'mr-lite'),
    'capability'  => 'edit_theme_options',
    'priority'    => 2)
  );
}

function register_setting_address($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[address]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[address]', array(
    'label'       => __('Address', 'mr-lite'),
    'section'     => 'mr_section_contacts',
    'settings'    => 'mr_theme_options[address]',
    'priority'    => 1))
  );
}

function register_setting_phone($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[phone]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[phone]', array(
    'label'       => __('Phone', 'mr-lite'),
    'section'     => 'mr_section_contacts',
    'settings'    => 'mr_theme_options[phone]',
    'priority'    => 2))
  );
}

function register_setting_mobile($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[mobile]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[mobile]', array(
    'label'       => __('Mobile', 'mr-lite'),
    'section'     => 'mr_section_contacts',
    'settings'    => 'mr_theme_options[mobile]',
    'priority'    => 3))
  );
}

function register_setting_skype($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[skype]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[skype]', array(
    'label'       => __('Skype', 'mr-lite'),
    'section'     => 'mr_section_contacts',
    'settings'    => 'mr_theme_options[skype]',
    'priority'    => 4))
  );
}

function register_setting_whatsapp($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[whatsapp]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[whatsapp]', array(
    'label'       => __('Whatsapp', 'mr-lite'),
    'section'     => 'mr_section_contacts',
    'settings'    => 'mr_theme_options[whatsapp]',
    'priority'    => 5))
  );
}

function register_setting_fax($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[fax]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[fax]', array(
    'label'       => __('Fax', 'mr-lite'),
    'section'     => 'mr_section_contacts',
    'settings'    => 'mr_theme_options[fax]',
    'priority'    => 6))
  );
}

function register_setting_email($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[email]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[email]', array(
    'label'       => __('Email', 'mr-lite'),
    'section'     => 'mr_section_contacts',
    'settings'    => 'mr_theme_options[email]',
    'priority'    => 7))
  );
}

function register_setting_contact_page($wp_customize) {
  $wp_customize->add_setting(
    'mr_theme_options[contact_page]', array(
    'default'     => '',
    'type'        => 'option',
    'capability'  => 'edit_theme_options',
    'transport'   => 'refresh')
  );

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'mr_theme_controls[contact_page]', array(
    'label'       => __('Contact Page', 'mr-lite'),
    'section'     => 'mr_section_contacts',
    'settings'    => 'mr_theme_options[contact_page]',
    'type'        => 'dropdown-pages',
    'priority'    => 8))
  );
}

?>
