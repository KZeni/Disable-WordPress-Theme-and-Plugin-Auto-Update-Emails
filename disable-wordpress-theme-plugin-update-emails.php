<?php
/*
 * Plugin name: Disable WordPress Theme and Plugin Auto-Update Emails
 * Plugin URI: https://wordpress.org/plugins/disable-wordpress-theme-plugin-update-emails/
 * Description: Disables the default notification email sent by WordPress for an automatic theme and/or plugin update. Simply activate the plugin to disable these notification emails.
 * Author: KZeni
 * Author URI: http://kzeni.com
 * Version: 1.0
 * Requires at least: 5.5
 * Tested up to: 5.5
 */

// Per https://make.wordpress.org/core/2020/07/30/controlling-plugin-and-theme-auto-update-email-notifications-and-site-health-infos-in-wp-5-5/
// Disable auto-update email notifications for plugins.
add_filter( 'auto_plugin_update_send_email', '__return_false' );
// Disable auto-update email notifications for themes.
add_filter( 'auto_theme_update_send_email', '__return_false' );
?>