## Joomla to WP Migrated Users Authentication Plugin
Contributors: [lucky62](https://profiles.wordpress.org/lucky62/), [asmartin](https://github.com/asmartin)
Tested up to: WP 4.7
Requires at least: WP 3.X
Stable tag: 1.1.0

A plugin to authenticate users migrated from Joomla/Mambo to Wordpress.

## Installation
1.  extract plugin zip file and load up to your wp-content/plugin directory
2.  Activate Plugin in the Admin => Plugins Menu

## Usage
Joomla encrypted passwords should be stored in `wp_usermeta` key `joomlapass` for this to work. You can import users and populate this field automatically with [this tool](https://github.com/asmartin/Joomla-To-Wordpress).

When the user logs in the first time after migration, his/her password
is hashed using the Joomla method (either md5:salt or [PHPass](http://www.openwall.com/phpass))
and compared with value in `joomlapass` meta key. If the password is correct, the Wordpress user is updated and the password encrypted to the Wordpress password format and
stored in the `user_pass` field. For all subsequent logins, the user will now be authenticated via the standard Wordpress authentication plugin. At this time, the `joomlapass` meta key is renamed to `joomlapassbak` to avoid repeatedly performing this conversion.

## License
plugin is free for any purpose...

## Changelog
19.3.2011 - 1.0.0 - first release
27.3.2011 - 1.0.1 - links correction
01.3.2017 - 1.1.0 - added support for PHPass, tested with Joomla 2.5.x and Wordpress 4.7.x
