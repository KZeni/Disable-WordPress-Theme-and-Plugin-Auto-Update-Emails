<?php
/*
 * Plugin name: Disable Theme and Plugin Auto-Update Emails
 * Plugin URI: https://wordpress.org/plugins/disable-theme-and-plugin-auto-update-emails/
 * Description: Disables the default notification emails sent by a site after an automatic theme and/or plugin update. Simply activate the plugin to disable these email notifications (allows failure notices through unless setting is enabled to disable these as well).
 * Author: KZeni
 * Author URI: https://kzeni.com
 * License: GPLv3
 * Version: 1.1
 * Requires at least: 5.5
 * Tested up to: 6.0.1
 */

// Per https://make.wordpress.org/core/2020/07/30/controlling-plugin-and-theme-auto-update-email-notifications-and-site-health-infos-in-wp-5-5/
// Also see https://gist.github.com/afragen/e2f40ed2e71e590a127e8adc1db05948 where it adds update failure detection
// Disable auto-update email notifications for plugins.
add_filter('auto_plugin_update_send_email', 'kzeni_plugin_theme_update_email_on_failure');
// Disable auto-update email notifications for themes.
add_filter('auto_theme_update_send_email', 'kzeni_plugin_theme_update_email_on_failure');

/**
 * Sends plugin & theme update emails only when at least one plugin/theme update has failed.
 *
 * @param bool  $enabled        Whether the plugin update email is enabled.
 * @param array $update_results An array of update results.
 * @return bool
 */
function kzeni_plugin_theme_update_email_on_failure($enabled, $update_results)
{
	if (get_option('kzeni_disable_theme_plugin_update_emails_disable_all') === true || get_option('kzeni_disable_theme_plugin_update_emails_disable_all') === 'true') { // If disable failures as well (disable all) is enabled (not the default so just seeing if it's set to true or not is enough to check)
		return false;
	} else {
		foreach ($update_results as $update_result) {
			if (true !== $update_result->result) {
				return true;
			}
		}
		return false;
	}
}

// Add options to WordPress' General Settings page
add_action('admin_init', 'kzeni_disable_theme_plugin_update_emails_general_settings_section');
function kzeni_disable_theme_plugin_update_emails_general_settings_section()
{
	add_settings_section(
		'kzeni_disable_theme_plugin_update_emails_settings_section', // Section ID 
		__('Disable Theme and Plugin Auto-Update Emails', 'kzeni_disable_theme_plugin_update_emails'), // Section Title
		'kzeni_disable_theme_plugin_update_emails_options_callback', // Callback
		'general' // What Page?  This makes the section show up on the General Settings Page
	);

	add_settings_field( // Option 1
		'kzeni_disable_theme_plugin_update_emails_disable_all', // Option ID
		__('Also disable failed update email notifications', 'kzeni_disable_theme_plugin_update_emails'), // Label
		'kzeni_disable_theme_plugin_update_emails_field_callback', // !important - This is where the args go!
		'general', // Page it will be displayed (General Settings)
		'kzeni_disable_theme_plugin_update_emails_settings_section', // Name of our section
		array( // The $args
			'kzeni_disable_theme_plugin_update_emails_disable_all' // Should match Option ID
		)
	);

	register_setting('general', 'kzeni_disable_theme_plugin_update_emails_disable_all', '_bool');
}

function kzeni_disable_theme_plugin_update_emails_options_callback()
{ // Section Callback
	//echo '<p>' . __('Successful updates already won\'t send emails simply due to the <strong>Disable Theme and Plugin Auto-Update Emails</strong> plugin being enabled.', 'kzeni_disable_theme_plugin_update_emails') . '</p>';
}

function kzeni_disable_theme_plugin_update_emails_field_callback($args)
{  // Textbox Callback
	$option = get_option($args[0]);
	echo '<label><input type="checkbox" id="' . $args[0] . '" name="' . $args[0] . '" value="true" ';
	echo checked($option, 'true');
	echo ' /> ';
	echo __('Yes, disable all.', 'kzeni_disable_theme_plugin_update_emails') . '</label>';
	echo '<p class="description">' . __('Successful updates already won\'t send emails simply due to the <strong>Disable Theme and Plugin Auto-Update Emails</strong> plugin being enabled.', 'kzeni_disable_theme_plugin_update_emails') . '</p>';
}
