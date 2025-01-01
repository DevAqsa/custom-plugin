<?php

/*
*plugin Name: Employee Management system
*Description: This is CRUD Employee Management system
*Plugin URI: https://www.example.com/custom-plugin
*Author: Aqsa Mumtaz
*Author URI: https://www.example.com
*Version: 1.0
*Requires at least: 6.4.2
*Requires PHP: 7.5

*/

define("EMS_PLUGIN_PATH", plugin_dir_path(__FILE__) );

define("EMS_PLUGIN_URL", plugin_dir_url(__FILE__) );


//action hook to add menu
add_action("admin_menu", "cp_add_admin_menu");

//add menu
function cp_add_admin_menu(){
add_menu_page("Employee System | Employee Management System", "Employee System", "manage_options", "employee-system",
 "ems_crud_system", "dashicons-groups", 23);


//sub-menu
add_submenu_page("employee-system", "Add Employee", "Add Employee" , "manage_options", "employee-system", "ems_crud_system" );

add_submenu_page("employee-system", "List Employee", "List Employee", "manage_options" , "list-employee", "ems_list_employee");
}


//menu handle callback
function ems_crud_system(){
 
    include_once(EMS_PLUGIN_PATH. "pages/add-employee.php");

}

//submenu call back function
function ems_list_employee(){
    include_once(EMS_PLUGIN_PATH. "pages/list-employee.php");

}


register_activation_hook(__FILE__, "ems_create_table");

function ems_create_table(){

    global $wpdb;
    $table_prefix = $wpdb->prefix; //wp_

    $sql = 
    "CREATE TABLE {$table_prefix}ems_form_data (
        `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `name` varchar(120) NULL,
        `email` varchar(80) NULL,
        `phoneNo` varchar(50) NULL,
        `gender` enum('Male','Female','Other') NULL,
        `designation` varchar(50) NULL
      )";

      include_once ABSPATH. "wp-admin/includes/upgrade.php";

dbdelta($sql);
}

//Plugin deactivation Hook

register_Deactivation_hook(__FILE__, "ems_drop_table");

function ems_drop_table(){

    global $wpdb;

    $table_prefix = $wpdb->prefix;

    $sql = "DROP TABLE IF EXISTS {$table_prefix}ems_form_data"; //{$table_prefix}ems_form_data

    $wpdb->query($sql);
}

//add CSS / JS to plugin

add_action("admin_enqueue_scripts", "ems_add_plugin_assets");

function ems_add_plugin_assets(){

    //add CSS
    wp_enqueue_style("ems-bootstrap-css", EMS_PLUGIN_URL."css/bootstrap.min.css",  array(), "1.0.0", "all");

    wp_enqueue_style("ems-custom-css", EMS_PLUGIN_URL."css/custom.css",  array(), "1.0.0", "all");


    wp_enqueue_style("ems-datatable-bootstrap", EMS_PLUGIN_URL."css/dataTables.dataTables.min.css",  array(), "1.0.0", "all");

    //add js plugin files

    wp_enqueue_script("ems-bootstrap-js", EMS_PLUGIN_URL."js/bootstrap.min.js", array("jquery"), "1.0.0");

    wp_enqueue_script("ems-datatable-js", EMS_PLUGIN_URL."js/dataTables.min.js", array("jquery"), "1.0.0");

    wp_enqueue_script("ems-custom-js", EMS_PLUGIN_URL."js/custom.js", array("jquery"), "1.0.0");

    wp_enqueue_script("ems-validate-js", EMS_PLUGIN_URL."js/jquery.validate.min.js", array("jquery"), "1.0.0");



}

?>