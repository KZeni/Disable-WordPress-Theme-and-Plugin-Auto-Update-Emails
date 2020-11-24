=== Disable Theme and Plugin Auto-Update Emails ===
Contributors: KZeni
Donate link: https://www.paypal.me/KZeni
License: GPLv3
Tags: plugin update, theme update, notifications, email, updates, disable
Stable tag: 1.0.2
Requires at least: 5.5
Tested up to: 5.6
Requires PHP: 5.4

Disables the default notification email sent by a site after an automatic theme and/or plugin update. Simply activate the plugin to disable these email notifications.

== Description ==

Disables the default notification email sent by a site after an automatic theme and/or plugin update. Simply activate the plugin to disable these email notifications.

Check things out on GitHub at [https://github.com/KZeni/Disable-WordPress-Theme-and-Plugin-Auto-Update-Emails](https://github.com/KZeni/Disable-WordPress-Theme-and-Plugin-Auto-Update-Emails)

Looking for WordPress core version update email notifications instead/as well? Try out [Disable WordPress Core Update Email](https://wordpress.org/plugins/disable-core-update-email/) (or similar) as that tackles that separate group of emails in this same lightweight fashion (use official WordPress filters to simply disable the email[s] as described.) These two plugins can work together to remove all these notifications (hence why this doesn't also remove core update notifications). Meanwhile, one can use one or the other if a specific set of emails is desired to be blocked (ex. I personally like the core update notifications since they're not too frequent while potentially being substantial so I keep those enabled while I then just use this plugin to disable the more frequent & typically less impactful plugin and theme update notifications.)

== Frequently Asked Questions ==

= What else needs to be done? Is there a settings screen to enable/configure it? =

No. This is a simple & lightweight plugin that simply uses the official filters made available as of WordPress 5.5 to disable these email notifications upon activation. Deactivating the plugin then has it resume default behavior. There's literally nothing else to it. A simple implementation that's quick & easy to utilize. Consider enabling/disabling the plugin the setting for whether or not these email notifications are disabled or not.

== Changelog ==

= 1.0.2 =

Released November 23rd, 2020

* Confirmed WordPress 5.6 compliance.

= 1.0.1 =

Released August 14th, 2020

* Implemented all necessary assets and pushed to WP.org plugin repository.

= 1.0 =

Released August 12th, 2020

* Initial release.
