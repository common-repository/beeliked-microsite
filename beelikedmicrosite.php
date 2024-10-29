<?php
/*
 * Plugin Name: BeeLiked Plugin
 * Plugin URI: http://wordpress.org/plugins/beeliked-microsite/
 * Description: Beeliked is a plugin that will let you embed Beeliked microsites as iframe - an HTML tag that allows a webpage to be displayed inline with the current page, in a Wordpress post.
 * Version: 2.0.1
 * Requires at least: 3.0
 * Requires PHP: 4
 * Author: BeeLiked
 * Author URI: https://beeliked.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'ABSPATH' ) ) { // Avoid direct calls to this file and prevent full path disclosure
	exit;
}

define('BEELIKED_PLUGIN_VERSION', '2.0');

if (!function_exists('beeliked_plugin_add_shortcode_cb')) {
  function beeliked_plugin_add_shortcode_cb( $atts ) {
    $html = "\n".'<!-- BeeLiked plugin v.'.IFRAME_PLUGIN_VERSION.' wordpress.org/plugins/beeliked-microsite/ -->'."\n";  
    if (!isset($atts['src'])) {
      $html .= "BeeLiked microsite src not set";
      return $html;
    }
    
    $extractUrlUid = function($src) {
      $urlParts = array();
      preg_match('/^http[s]?:\/\/([\w-]+)/', $src, $urlParts);
      if (count($urlParts) >= 2) {
        return $urlParts[1];
      }
      return rand(0, 100);
    };
    
    $defaults = array(
      'id' => 'blkd-microsite-' . $extractUrlUid($atts['src']),
      'src' => $atts['src'],
      'width' => '100%',
      'height' => '700px',
      'auto-resize' => '1',
      'class' => 'beeliked-iframe',
      'loader-message' => 'Loading...',
      'loader-image' => 'https://campaign.beeliked.com/imgs/microsites/loader-dark.gif'
    );

    foreach ( $defaults as $default => $value ) { // add defaults
      if ( ! @array_key_exists( $default, $atts ) ) { // mute warning with "@" when no params at all
        $atts[$default] = $value;
      }
    }

    $html .= '<div class="' . esc_attr($atts['class']) .'" id="' . esc_attr($atts['id']) .'" style="position:relative;width:' . esc_attr($atts['width']) .';height:' . esc_attr($atts['height']) .'">
      <div class="blkd-loader" style="padding: 10px 0px; width: 100px; margin-left:-50px; background:#333;position:absolute; left:50%; top:160px; text-align:center; border-radius:5px; opacity:0.8;">
          <img src="' . esc_attr($atts['loader-image']) .'" alt="" style="margin: 0 auto 10px; width: 64px; height: 64px;">
          <span style="color:#ddd; font-size:14px">' . esc_attr($atts['loader-message']) .'</span>
      </div>
  </div>
  <script src="https://campaign.beeliked.com/min/beeliked.iframeCtrl2.min.js"></script>
  <script>blkdIframeCtrl(document.getElementById(\'' . esc_attr($atts['id']) .'\'), \'' . esc_attr($atts['src']) .'\', { loaderClass: \'blkd-loader\'' . (esc_attr($atts['auto-resize']) == "1" ? '' : ', iframeResizer: false') . ' });</script>'."\n";  
    return $html;
  }
  add_shortcode( 'beeliked', 'beeliked_plugin_add_shortcode_cb' );
}

if (!function_exists('beeliked_plugin_row_meta_cb')) {
  function beeliked_plugin_row_meta_cb( $links, $file ) {
    if ( $file == plugin_basename( __FILE__ ) ) {
      $row_meta = array(
        'support' => '<a href="https://beeliked.com" target="_blank">' . __( 'BeeLiked', 'beeliked' ) . '</a>'
      );
      $links = array_merge( $links, $row_meta );
    }
    return (array) $links;
  }
  add_filter( 'plugin_row_meta', 'beeliked_plugin_row_meta_cb', 10, 2 );
}
