<?php

require_once('customizations/brand.php');
require_once('customizations/contacts.php');
require_once('customizations/socials.php');
require_once('customizations/copyright.php');
require_once('customizations/subscription.php');
require_once('customizations/analytics.php');

class Customizer {

  public static function register($wp_customize) {

    register_section_brand($wp_customize);
    register_setting_tagline($wp_customize);
    register_setting_about($wp_customize);

    register_section_contacts($wp_customize);
    register_setting_address($wp_customize);
    register_setting_phone($wp_customize);
    register_setting_mobile($wp_customize);
    register_setting_skype($wp_customize);
    register_setting_whatsapp($wp_customize);
    register_setting_fax($wp_customize);
    register_setting_email($wp_customize);
    register_setting_contact_page($wp_customize);

    register_section_socials($wp_customize);
    register_setting_facebook($wp_customize);
    register_setting_twitter($wp_customize);
    register_setting_google_plus($wp_customize);
    register_setting_youtube($wp_customize);
    register_setting_linkedin($wp_customize);
    register_setting_quora($wp_customize);

    register_section_copyright($wp_customize);
    register_setting_copyright_owner($wp_customize);

    register_section_subscription($wp_customize);
    register_setting_subscription_form($wp_customize);

    register_section_analytics($wp_customize);
    register_setting_google_analytics($wp_customize);
  }

  public static function header () {

  }

  public static function live () {

  }

}

add_action('customize_register', array('Customizer', 'register'));

add_action('wp_head', array('Customizer', 'header'));

add_action('customize_preview_init', array('Customizer', 'live'));

?>
