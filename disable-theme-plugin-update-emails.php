<?php
/*
 * Plugin name: Disable Theme and Plugin Auto-Update Emails
 * Plugin URI: https://wordpress.org/plugins/disable-theme-and-plugin-auto-update-emails/
 * Description: Disables the default notification email sent by a site after an automatic theme and/or plugin update. Simply activate the plugin to disable these email notifications.
 * Author: KZeni
 * Author URI: https://kzeni.com
 * License: GPLv3
 * Version: 1.0.6
 * Requires at least: 5.5
 * Tested up to: 6.0
 */

// Per https://make.wordpress.org/core/2020/07/30/controlling-plugin-and-theme-auto-update-email-notifications-and-site-health-infos-in-wp-5-5/
// Disable auto-update email notifications for plugins.
add_filter('auto_plugin_update_send_email', '__return_false');
// Disable auto-update email notifications for themes.
add_filter('auto_theme_update_send_email', '__return_false');
?>
