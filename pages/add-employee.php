
 
<div class="container">
<h2>Add Employee</h2>

<!-- <img src="<?php echo EMS_PLUGIN_URL ?>images/laptop.jpg" style="width:80px"/> -->

  <div class="panel panel-primary">
  
    <div class="panel-heading">Add Employee</div>
    <div class="panel-body">
    <form action="/javascript:void(0)" method="post" id="ems-frm-add-employee" >
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
      <input type="text" class="form-control" id="phoneno" placeholder="Enter phone no" name="phone no">
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


    
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
    </div>
  </div>
</div>


