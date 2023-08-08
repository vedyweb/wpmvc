<?php

namespace VEDYWEB\WPMVC\Core;

/**
 * Class Asset
 *
 * This class handles the enqueuing of assets (styles and scripts) for the plugin.
 */
class Asset {

    /**
     * Asset constructor.
     *
     * This constructor adds actions to enqueue scripts and styles for the admin area and login page.
     */
    public function __construct() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_script_cdn'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_script'));
        add_action('login_head', array($this, 'the_dramatist_custom_login_css'));
    }

    /**
     * Enqueues CSS and JS scripts from a CDN for the admin area.
     *
     * This method enqueues Bootstrap CSS and JS scripts from a CDN for the admin area.
     */
    public function enqueue_admin_script_cdn() {
        wp_enqueue_style('bootstrapcss', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css');
        wp_enqueue_script('popperminjs', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js');
        wp_enqueue_script('bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js');
    }

    /**
     * Enqueues custom styles and scripts for the public area.
     *
     * This method enqueues custom CSS and JS scripts for the public area using local files.
     */
    public function enqueue_admin_script() {
        wp_enqueue_style('my_custom_public_style', WPMVC_PLUGIN_URL . '/assets/public/css/mypublicstyle.css');
        wp_enqueue_script('my_custom_public_script', WPMVC_PLUGIN_URL . '/assets/public/js/mypublicscript.js');
    }

    /**
     * Enqueues custom styles and scripts for the admin area.
     *
     * This method enqueues custom CSS and JS scripts for the WordPress admin page using local files.
     */
    public function custom_login_css() {
        wp_enqueue_script('my_custom_admin_script', plugin_dir_url(__DIR__) . 'assets/admin/js/myadminscript.js');
        wp_enqueue_style('my_custom_admin_style', plugin_dir_url(__DIR__) . 'assets/admin/css/myadminstyle.css');
    }
}