<?php

$message = "";
$status = "";

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["btn_submit"])){

  //FORM submitted

  global $wpdb;

  $name = sanitize_text_field($_POST['name']);
  $email = sanitize_text_field($_POST['email']);
  $phoneno = sanitize_text_field($_POST['phoneno']);
  $gender = sanitize_text_field($_POST['gender']);
  $Designation = sanitize_text_field($_POST['Designation']);

//insert data

$wpdb->insert("{$wpdb->prefix}ems_form_data", array(
  'name' => $name,
  'email' => $email,
  'phoneno' => $phoneno,
  'gender' => $gender,
  'Designation' => $Designation
));

$last_inserted_id = $wpdb->insert_id;

if($last_inserted_id > 0){
  $message = "Data of employee inserted successfully";
  $status = 1;
}else{
  $message = "Failed to inserting employee data";
  $status = 0;
}}
?>
 
<div class="container">
<h2>Add Employee</h2>

<!-- <img src="<?php echo EMS_PLUGIN_URL ?>images/laptop.jpg" style="width:80px"/> -->

  <div class="panel panel-primary">
  
    <div class="panel-heading">Add Employee</div>
    <div class="panel-body">

<?php

if(!empty($message)){
 
  if($status == 1){
    echo '<div class="alert alert-success">'.$message.'</div>';
  }else{
    echo '<div class="alert alert-danger">'.$message.'</div>';
  }
}

?>

    <form action="<?php echo $_SERVER['PHP_SELF'];?>?page=employee-system" method="post" id="ems-frm-add-employee" >
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text"  required class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="phoneno">Phone no:</label>
      <input type="text" class="form-control" id="phone no" placeholder="Enter phone no" name="phoneno">
    </div>
    <div class="form-group">
      <label for="gender">Gender:</label>
      <select name="gender" id="gender" class="form control">
      <option value="">Select Gender</option>
      <option value="Male">Male</option>
      <option value="FeMale">FeMale</option>
      <option value="other">other</option>
      </select>
    </div>
    <div class="form-group">
      <label for="designation">Designation:</label>
      <input type="text" class="form-control" id="Designation" placeholder="Enter Designation" name="Designation">
    </div>
    <button type="submit" class="btn btn-success" name="btn_submit" >Submit</button>
  </form>
    </div>
  </div>
</div>


