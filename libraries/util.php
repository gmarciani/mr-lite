<?php

function mr_get_theme_option($option_name, $default = '') {
  $options = get_option('mr_theme_options');
  if (isset($options[$option_name])) {
    return $options[$option_name];
  }
  return $default;
}

?>
