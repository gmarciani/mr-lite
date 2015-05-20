<?php

include_once ABSPATH . 'wp-includes/class-wp-customize-control.php';

class DW_Minion_Textarea_Custom_Control extends WP_Customize_Control {

  public $type = 'textarea';
  public $statuses;
  public function __construct($manager, $id, $args = array()) {

  $this->statuses = array('' => __('Default', 'mr-lite'));
    parent::__construct($manager, $id, $args);
  }

  public function render_content() {
    ?>
    <label>
      <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
      <textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>>
        <?php echo esc_textarea($this->value()); ?>
      </textarea>
    </label>
    <?php
  }
}

?>
