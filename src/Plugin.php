<?php

namespace VEDYWEB\WPMVC;

/**
 * Class Plugin
 *
 * This class manages the activation, deactivation, and uninstallation of the plugin.
 */
class Plugin {

    /**
     * Plugin constructor.
     *
     * This constructor sets up hooks for activation, deactivation, and uninstallation.
     *
     * @param string $plugin_url The URL of the plugin.
     */
    public function __construct(string $plugin_url) {

        register_activation_hook($plugin_url, array($this, 'activate'));
        register_activation_hook($plugin_url, array($this, 'insert_data'));
        add_action('plugins_loaded', array($this, 'db_check_for_update_by_refresh'));
        register_deactivation_hook($plugin_url, array($this, 'truncate_data'));
        // register_uninstall_hook(MY_PLUGIN_URL, array($this, 'drop_table'));
        
    }

    /**
     * Checks for database update on plugin refresh.
     *
     * This method checks if the plugin version has changed and triggers the activation process if needed.
     */
    public function db_check_for_update_by_refresh() {
        global $wpmvc_notes_db_version;
        if (get_site_option('wpmvc_notes_db_version') != $wpmvc_notes_db_version) {
            $this->activate();
        }
    }

    /**
     * Activates the plugin and sets up the database table.
     *
     * This method creates the necessary database table for the plugin and updates its version if needed.
     */
    public function activate() {
        global $wpdb;
        $wpmvc_notes = '1.0.0';
        $table_name = $wpdb->prefix . 'wpmvc_notes';
        $charset_collate = $wpdb->get_charset_collate();
    
        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            note tinytext NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";
    
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
        add_option('wpmvc_notes', $wpmvc_notes);

        $installed_ver = get_option("wpmvc_notes");
        if ($installed_ver != $wpmvc_notes) {
            $wpmvc_notes = '1.0.1';
            $table_name = $wpdb->prefix . 'wpmvc_notes';
            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE $table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                note tinytext NOT NULL,
                PRIMARY KEY  (id)
                ) $charset_collate;";
        
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
            update_option("wpmvc_notes", $wpmvc_notes);
        }
    }

    /**
     * Inserts sample data into the database.
     *
     * This method inserts sample data into the plugin's database table.
     */
    public function insert_data() {
        global $wpdb;
        $welcome_note = 'Welcome to WP MVC Plugin.';
        $table_name = $wpdb->prefix . 'wpmvc_notes';
        $wpdb->insert(
            $table_name,
            array(
                'time' => current_time('mysql'),
                'note' => $welcome_note,
            )
        );
    }
   
    /**
     * Truncates data from the database.
     *
     * This method truncates the data from the plugin's database table.
     */
    public function truncate_data() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'wpmvc_notes';
        $sql = "TRUNCATE TABLE $table_name";
        $wpdb->query($sql);
    }

    /**
     * Drops the database table on plugin uninstallation.
     *
     * This method drops the plugin's database table when the plugin is uninstalled.
     */
    public function drop_table() {
        if (!defined('WP_UNINSTALL_PLUGIN')) exit();
        global $wpdb;
        $table_name = $wpdb->prefix . 'wpmvc_notes';
        $sql = "DROP TABLE IF EXISTS $table_name";
        $wpdb->query($sql);
        delete_option("wpmvc_notes");      
   } 
}