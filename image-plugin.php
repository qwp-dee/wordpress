<?php
/*
Plugin Name: Deepak shukla
Plugin URI: https://deepakshukla.com/
Description: Hy this is my <strong> CUSTOM META FILED PUGING </strong> <i> And Wp-,media button </i>. 
Version: 1.0
Author: Shukla Deepak
License: GPLv2 or later
Text Domain: Custom meta fileds , Custom WP-Media Query  
*/


function myshortcode(){

	return strtoupper('<h1>Hello this is  my shortcode </h1>');;
	
}

add_shortcode('display','myshortcode');



// Image upload custom meta box


function add_my_custom_menu(){
    add_menu_page(
            "customplugin", // page title 
            "Custom Plugin", // menu title
            "manage_options", // admin level 
            "custom-plugin", // page slug ~!prant sulg
            "add_new_function", // callback function 
            "dashicons-chart-bar", //icon url
            6 ); // postion 

    }
add_action("admin_menu","add_my_custom_menu");

function add_new_function(){

    include_once( __DIR__ . '/View/add-new.php');
 
}













?>