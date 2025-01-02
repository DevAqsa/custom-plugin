<?php
/*
* Plugin Name: Employee Management System
* Description: This is CRUD Employee Management System
* Plugin URI: https://www.example.com/custom-plugin
* Author: Aqsa Mumtaz
* Author URI: https://www.example.com
* Version: 1.0
* Requires at least: 6.4.2
* Requires PHP: 7.5
*/

// Main plugin class
class EmployeeManagementSystem {
    private static $instance = null;
    private $wpdb;
    
    private function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        
        $this->define_constants();
        $this->init_hooks();
    }
    
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new EmployeeManagementSystem();
        }
        return self::$instance;
    }
    
    private function define_constants() {
        define("EMS_PLUGIN_PATH", plugin_dir_path(__FILE__));
        define("EMS_PLUGIN_URL", plugin_dir_url(__FILE__));
    }
    
    private function init_hooks() {
        add_action("admin_menu", array($this, 'add_admin_menu'));
        add_action("admin_enqueue_scripts", array($this, 'add_plugin_assets'));
        register_activation_hook(__FILE__, array($this, 'create_table'));
        register_deactivation_hook(__FILE__, array($this, 'drop_table'));
    }
    
    public function add_admin_menu() {
        add_menu_page(
            "Employee System | Employee Management System",
            "Employee System",
            "manage_options",
            "employee-system",
            array($this, 'crud_system'),
            "dashicons-groups",
            23
        );
        
        add_submenu_page(
            "employee-system",
            "Add Employee",
            "Add Employee",
            "manage_options",
            "employee-system",
            array($this, 'crud_system')
        );
        
        add_submenu_page(
            "employee-system",
            "List Employee",
            "List Employee",
            "manage_options",
            "list-employee",
            array($this, 'list_employee')
        );
    }
    
    public function crud_system() {
        include_once(EMS_PLUGIN_PATH . "pages/add-employee.php");
    }
    
    public function list_employee() {
        include_once(EMS_PLUGIN_PATH . "pages/list-employee.php");
    }
    
    public function create_table() {
        $table_prefix = $this->wpdb->prefix;
        $sql = "CREATE TABLE {$table_prefix}ems_form_data (
            `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `name` varchar(120) NULL,
            `email` varchar(80) NULL,
            `phoneNo` varchar(50) NULL,
            `gender` enum('Male','Female','Other') NULL,
            `designation` varchar(50) NULL
        )";
        
        require_once(ABSPATH . "wp-admin/includes/upgrade.php");
        dbDelta($sql);
    }
    
    public function drop_table() {
        $table_prefix = $this->wpdb->prefix;
        $sql = "DROP TABLE IF EXISTS {$table_prefix}ems_form_data";
        $this->wpdb->query($sql);
    }
    
    public function add_plugin_assets() {
        // CSS
        wp_enqueue_style("ems-bootstrap-css", EMS_PLUGIN_URL . "css/bootstrap.min.css", array(), "1.0.0", "all");
        wp_enqueue_style("ems-custom-css", EMS_PLUGIN_URL . "css/custom.css", array(), "1.0.0", "all");
        wp_enqueue_style("ems-datatable-bootstrap", EMS_PLUGIN_URL . "css/dataTables.dataTables.min.css", array(), "1.0.0", "all");
        
        // JavaScript
        wp_enqueue_script("ems-bootstrap-js", EMS_PLUGIN_URL . "js/bootstrap.min.js", array("jquery"), "1.0.0");
        wp_enqueue_script("ems-datatable-js", EMS_PLUGIN_URL . "js/dataTables.min.js", array("jquery"), "1.0.0");
        wp_enqueue_script("ems-custom-js", EMS_PLUGIN_URL . "js/custom.js", array("jquery"), "1.0.0");
        wp_enqueue_script("ems-validate-js", EMS_PLUGIN_URL . "js/jquery.validate.min.js", array("jquery"), "1.0.0");
    }
}

// Employee Model Class
class Employee {
    private $wpdb;
    private $table;
    
    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table = $this->wpdb->prefix . 'ems_form_data';
    }
    
    public function create($data) {
        return $this->wpdb->insert($this->table, array(
            "name" => sanitize_text_field($data['name']),
            "email" => sanitize_text_field($data['email']),
            "phoneNo" => sanitize_text_field($data['phoneNo']),
            "gender" => sanitize_text_field($data['gender']),
            "designation" => sanitize_text_field($data['designation'])
        ));
    }
    
    public function update($data, $id) {
        return $this->wpdb->update($this->table, array(
            "name" => sanitize_text_field($data['name']),
            "email" => sanitize_text_field($data['email']),
            "phoneNo" => sanitize_text_field($data['phoneNo']),
            "gender" => sanitize_text_field($data['gender']),
            "designation" => sanitize_text_field($data['designation'])
        ), array("id" => $id));
    }
    
    public function delete($id) {
        return $this->wpdb->delete($this->table, array("id" => $id));
    }
    
    public function get_all() {
        return $this->wpdb->get_results("SELECT * FROM {$this->table}", ARRAY_A);
    }
    
    public function get_by_id($id) {
        return $this->wpdb->get_row(
            $this->wpdb->prepare("SELECT * FROM {$this->table} WHERE id = %d", $id),
            ARRAY_A
        );
    }
}

// Initialize the plugin
function init_employee_management_system() {
    return EmployeeManagementSystem::getInstance();
}

// Start the plugin
init_employee_management_system();