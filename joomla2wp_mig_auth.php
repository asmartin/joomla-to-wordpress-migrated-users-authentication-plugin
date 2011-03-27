<?php
/*
Plugin Name: Joomla2WP Migrated Users Authentication Plugin
Description: Authenticate users migrated from Joomla and update their WP passwords
Version: 1.0.1
Author: lucky62
*/

// plugin must run before any other authentication plugins -
add_filter('authenticate', 'joomla_mig_auth', 1, 3);


// function provides user authentication against joomla encrypted password
// encrypted joomla password should be stored to user meta key "joomlapass" during migration
// when user are trying to log in to WP site first time after migration
// password provides by user is checked against joomla hash
// and if is correct WP password of user is udated.

function joomla_mig_auth( $user, $username, $password ) {

   if ( is_a($user, 'WP_User') ) { return $user; }

   // check existence of required parameters
	if ( empty($username) || empty($password) ) return $user;
	
	// retrieve user data
	$userdata = get_user_by('login', $username);
	if ( !$userdata ) return $user;
   if ( !$userdata->joomlapass ) return $user;

   // authenticate against stored joomla password
   if ( auth_joomla( $username, $password, $userdata->joomlapass ) ) {

      // update WP user password
      $user_id = $userdata->ID;
      wp_update_user( array ('ID' => $user_id, 'user_pass' => $password) ) ;

      // rename joomlapass to joomlapassbak to avoid rewrite WP password hash repeatedly
      update_user_meta( $user_id, 'joomlapassbak', $userdata->joomlapass );
      delete_user_meta( $user_id, 'joomlapass' );

   }
   
   return $user;

}


// this function should be changed if passwords are encrypted by non default Joomla encryption method
// default method is md5 hash of password + salt
// $joomlapass contains md5 hash and salt separated by colon ':'
// for other methods of joomla encryption methods refer to Joomla JUserHelper class

function auth_joomla( $username, $password, $joomlapass ) {

	$parts	= explode( ':', $joomlapass );
	$joomlahash	= $parts[0];
	$joomlasalt	= $parts[1];
	
	$passwhash = ($joomlasalt) ? md5($password.$joomlasalt) : md5($password);
	
   if ( $joomlahash == $passwhash ) {
      return true;
   } else {
      return false;
   }
   
}


