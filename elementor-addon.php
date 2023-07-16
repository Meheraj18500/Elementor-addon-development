<?php
/**
 * Plugin Name: Meheraj Addon
 * Description: Simple addon for Elementor.
 * Version:     1.0.0
 * Author:      Meheraj
 * Author URI:  https://developersmeheraj.com/
 * Text Domain: meheraj-addon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Loading CSS file
add_action('wp_enqueue_scripts','meheraj_addon_enqueue_register');
function meheraj_addon_enqueue_register(){
  wp_enqueue_style( 'meheraj_addon', plugins_url( 'assets/style.css', __FILE__ ), false, "1.0.0");
}

// Check if Elementor is active
if (class_exists('Elementor\Plugin')) {
    
    // Meheraj Addon Register
    function meheraj_elementor_addon_register( $widgets_manager ) {

        require_once( __DIR__ . '/widgets/test-widget.php' );
        require_once( __DIR__ . '/widgets/team_member.php' );
    
        $widgets_manager->register( new \Meheraj_Elementor_Test_Widget() );
        $widgets_manager->register( new \Meheraj_Team_Member_Widget() );
    
    }
    add_action( 'elementor/widgets/register', 'meheraj_elementor_addon_register' );

} else {
    
    // Elementor is not installed or not active notice
    function meheraj_addon_admin_notice() {
        ?>
        <div class="notice notice-warning is-dismissible">
            <p><?php echo 'You must have to install Elementor'; ?></p>
        </div>
        <?php
    }
    add_action('admin_notices', 'meheraj_addon_admin_notice');
}