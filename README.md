# Learn-Wordpress-Plugin-Development
Hi there

# First Created folder
- create folder in plugin in folder by the name of plugin 
- create file your plugin name `my-plugin.php`
`index.php`
- enter this code in `my-plugin.php`
```php
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
```
- Activate Plugin


# Create Table in DB When plugin is activate:
    ```php
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
    ```

# Remove Data from DB Table When plugin is deactivate:
```php
        function my_plugin_deactivation() {
    // Deactivation code here
    global $wpdb, $table_prefix;
    $wp_emp = $table_prefix.'emp';
    $q = "TRUNCATE `$wp_emp`";
    $wpdb->query($q);
}
register_deactivation_hook(__FILE__, 'my_plugin_deactivation');
```

# Remove Table in DB When plugin is Uninstall:
- create uninstall.php
```php
    <?php

if(!defined('WP_UNINSTALL_PLUGIN')){
    die('');
}

global $wpdb, $table_prefix;
$wp_emp = $table_prefix.'emp'
$q = "DROP TABLE `$wp_emp`;";
$wpdb->query($q);

```