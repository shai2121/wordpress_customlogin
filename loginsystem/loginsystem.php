<?php
/*
Plugin Name: login system  plugin
Plugin URI: https://www.zehntech.com/
Description: This is an simple short code for login system.
Version: 1.0.1
Author: Shailendra singh panwar

*/
define("loginsystem1" ,plugin_dir_path(__FILE__) );

add_shortcode("signup", "loginsystem_signup");
function loginsystem_signup(){
include_once loginsystem1 .'/view/signup.php';
}

// short code for login page
add_shortcode("login",  'loginsystem_login');
function loginsystem_login(){
    include_once loginsystem1 .'/view/login.php';

}


//  shortcode for change password page
add_shortcode("cpassword", "loginsystem_cpassword");
function loginsystem_cpassword(){
include_once loginsystem1 .'/view/changepass.php';
}

add_shortcode("fpassword", "loginsystem_fpassword");
function loginsystem_fpassword(){
include_once loginsystem1 .'/view/forgetpassword.php';
}
add_shortcode("profile", "loginsystem_profile");
function loginsystem_profile(){
include_once loginsystem1 .'/view/profile.php';
}

add_shortcode("update", "loginsystem_update");
function loginsystem_update(){
include_once loginsystem1 .'/view/update.php';
}

add_shortcode("uppass", "loginsystem_uppass");
function loginsystem_uppass(){
include_once loginsystem1 .'/view/updatepass.php';
}





?>