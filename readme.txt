=== Joomla to WP Migrated Users Authentication Plugin ===
Contributors: lucky62
Plugin URI: http://lovelyland.info/1/joomla2wp-mig-auth-plugin/
Tags: joomla, mambo, wordpress, authentication, migration, password
Tested up to: WP 3.1
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=WTSJR2PXXSVD8&lc=SK&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Requires at least: WP 3.X
Stable tag: 1.0.1

A plugin to authenticate users migrated from Joomla/Mambo to Wordpress.


== Description ==
Joomla encrypted passwords should be stored in user meta key "joomlapass".
When user is authenticated first time after migration
password provided by user is encrypted by "joomla way"
and compared with value in "joomlapass" meta key.
If password is correct WP user is udated - password encrypted by "wordpress way"
is stored to "user_pass" field.
Then user can be authenticated by standart wordpress authentication plugin.
Meta key "joomlapass" is renamed to "joomlapassbak" to avoid repeatedly updating WP password.

== Screenshots ==
No screenshots.


== Installation ==
1.  extract plugin zip file and load up to your wp-content/plugin directory
2.  Activate Plugin in the Admin => Plugins Menu


== Upgrade Notice ==
No notice.

== License ==
plugin is free for any purpose...


== Frequently Asked Questions ==
No questions at this moment...


== Support ==
Put question here: http://lovelyland.info/1/joomla2wp-mig-auth-plugin/


== Changelog ==
19.3.2011 - 1.0.0 - first release
27.3.2011 - 1.0.1 - links correction
