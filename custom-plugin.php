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

//action hook to add menu
add_action("admin_menu", "cp_add_admin_menu");

//add menu
function cp_add_admin_menu(){
add_menu_page("Employee System | Employee Management System", "Employee System", "manage_options", "employee-system",
 "ems_crud_system", "dashicons-groups", 23);


//sub-menu
add_submenu_page("employee-system", "Add Employee", "Add Employee" , "manage_options", "ems_add_employee", "ems_crud_system" );

add_submenu_page("employee-system", "List Employee", "List Employee", "manage_options" , "list-employee", "ems_list_employee");
}


//menu handle callback
function ems_crud_system(){

    echo "<h2>Well Come to my Employee Management System</h2>";
}

//submenu call back function
function ems_list_employee(){
    echo "<h2>Well Come to the List of Employee</h2>";
}

?>