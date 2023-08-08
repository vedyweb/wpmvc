<?php

/**
 * WPMVC Plugin.
 *
 * @package   WPMVC\Main
 * @copyright Copyright (C) 2023, Vedyweb - info@vedyweb.com
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3 or higher
 *
 * @wordpress-plugin
 * Plugin Name: WPMVC
 * Version:     1.0.0
 * Plugin URI:  https://wordpress.org/plugins/wpmvc
 * Update URI:  https://wordpress.org/plugins/wpmvc
 * Description: WPMVC Plugin is a powerful tool designed to enhance the functionality of your WordPress website. Built with an Object-Oriented Programming (OOP) approach and following the Model-View-Controller (MVC) architectural pattern, this plugin provides developers with a solid foundation for creating professional, efficient, and maintainable code.
 * Author:      Vedyweb
 * Author URI:  https://vedyweb.wordpress.com
 * Text Domain: wordpress-mvc, wpmvc, wp-mvc, wp-mvc-plugin
 * Domain Path: /languages/
 * License:     GPL v3
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * 
 * Requires at least: 6.1
 * Requires PHP: 7.2.5
 *
 * WC requires at least: 7.1
 * WC tested up to: 7.8
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

 /**
  * Ensure WordPress environment is loaded.
  *
  * If the script is accessed directly, exit.
  */
 if (!defined('ABSPATH')) {
     exit;
 }
 
 /**
  * Include the Composer autoloader.
  *
  * This line includes the Composer autoloader which loads the classes from the "vendor" directory.
  */
 require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';
 
 /**
  * Define constants for plugin name and URL.
  *
  * These constants provide easy access to the plugin's name and URL.
  */
 define('WPMVC_PLUGIN_NAME', 'wpmvc');
 define('WPMVC_PLUGIN_URL', WP_PLUGIN_URL . '/' . WPMVC_PLUGIN_NAME);
 

/**
 * Initializes the plugin by instantiating classes and setting up actions.
 */
$plugin = new VEDYWEB\WPMVC\Plugin(__FILE__);

/**
 * Init the plugin by instantiating classes and setting up actions.
 */
add_action('init', function () {
    new VEDYWEB\WPMVC\Core\Asset();
    new VEDYWEB\WPMVC\Controller\NoteController();
});
