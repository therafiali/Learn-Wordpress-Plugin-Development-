<?php 
/**
 * Plugin Name: My Plugin
 * Description: This plugin by Rafi Ali
 * Version: 1.0
 * Author: Rafi Ali
 * Author URI: https://therafiali.vercel.app/
 */

if (!defined('ABSPATH')) {
    header("Location: /");
    die("Can't access");
}

function my_plugin_activation() {
    // Activation code here
    global $wpdb, $table_prefix;
    $wp_emp = $table_prefix.'emp';
    $q = "CREATE TABLE IF NOT EXISTS `$wp_emp` (
    ID INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    status BOOLEAN NOT NULL,
    PRIMARY KEY (ID)
    ) ENGINE=InnoDB;";
    $wpdb->query($q);

//     $q = "INSERT INTO `$wp_emp` (`name`, `email`, `status`)
// VALUES ('rafi', 'rafi@gmail.com', 1);";
$data = array(
    'name' => 'Akshay',
    'email' =>'afi.mail.com',
    'status'=>1

);
    $wpdb->insert($wp_emp, $data);
}
register_activation_hook(__FILE__, 'my_plugin_activation');

function my_plugin_deactivation() {
    // Deactivation code here
    global $wpdb, $table_prefix;
    $wp_emp = $table_prefix.'emp';
    $q = "TRUNCATE `$wp_emp`";
    $wpdb->query($q);
}
register_deactivation_hook(__FILE__, 'my_plugin_deactivation');

function my_sc_fun() {
    // Shortcode functionality here
}
add_shortcode('my-sc', 'my_sc_fun');
