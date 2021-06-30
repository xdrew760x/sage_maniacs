<?php

namespace App;

/**
* Register the required plugins for Xpress.
*/
add_action('tgmpa_register', function() {
  $plugins =  [
    [
      'name' => 'Advanced Custom Fields Pro',
      'slug' => 'advanced-custom-fields-pro',
      'source' => dirname( __DIR__ ) . '/app/plugins/advanced-custom-fields-pro.zip',
      'required' => true,
      'force_activation'   => true,
      'force_deactivation' => true,
    ],
    [
      'name' => 'Advanced Custom Fields RGBA Color Picker',
      'slug' => 'acf-rgba-color-picker',
      'source' => dirname( __DIR__ ) . '/app/plugins/acf-rgba-color-picker.zip',
      'required' => true,
      'force_activation'   => true,
      'force_deactivation' => true,
    ],
  ];

  $config = [
    'plugin_activated' => __( 'Plugin activated successfully.', 'tgmpa' ),
    'complete' => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
  ];

  tgmpa( $plugins );
});
