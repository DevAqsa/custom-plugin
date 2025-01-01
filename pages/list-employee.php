<?php

global $wpdb;

$employees = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}ems_form_data", ARRAY_A);


?>




<div class="container">
  <h2>List Employee</h2>  
  
  <div class="panel panel-primary">
  <div class="panel-heading">List Employee</div>
  <div class="panel-body">
  <table class="table" id="tbl-employee">
    <thead>
      <tr>
        <th>#ID</th>
        <th>#Name</th>
        <th>#Email</th>
        <th>#Gender</th>
        <th>#Designation</th>
        <th>#Action</th>

      </tr>
    </thead>
    <tbody>

<?php

if(count($employees) > 0){
  foreach ($employees as $employee) {
      ?>
<tr>
        <td> <?php echo $employee['id'] ?></td>
        <td><?php echo $employee['name'] ?></td>
        <td><?php echo $employee['email'] ?></td>
        <td><?php echo $employee['gender'] ?></td>
        <td><?php echo $employee['designation'] ?></td>
        <td>
            <a href="admin.php?page=employee-system&action=edit&empId=<?php echo $employee['id'] ?>" type="button" class="btn btn-warning">Edit</a>
            <a href="admin.php?page=employee-system&action=edit&empId=<?php echo $employee['id'] ?>" type="button" class="btn btn-success">Update</a>

            <a href="admin.php?page=list-employee&action=delete&empId=<?php echo $employee['id'] ?>" type="button" class="btn btn-danger"  type="button" class="btn btn-danger">Delete</a>
            <a href="admin.php?page=employee-system&action=view&empId=<?php echo $employee['id'] ?>" type="button" class="btn btn-primary" type="button" class="btn btn-primary">View</a>

        </td>

      </tr>

      <?php
 } 
}
else{
  echo "No employee found";
}
?>
     
    </tbody>
  </table>

  </div>
</div>
</div>