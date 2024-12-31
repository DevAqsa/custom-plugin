<?php

/*
*plugin Name: Custom Plugin
*Description: This is my first plugin for learning
*Plugin URI: https://www.example.com/custom-plugin
*Author: Aqsa Mumtaz
*Author URI: https://www.example.com
*Version: 1.0
*Requires at least: 6.4.2
*Requires PHP: 7.5

*/

add_action("admin_menu", "cp_add_admin_menu");


function cp_add_admin_menu(){

add_menu_page("Custom Plugin Menu", "Custom Plugin", "manage_options", "cp-plugin" , "cp_handle_admin_menu", );

}

?>