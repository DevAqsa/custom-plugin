<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Employee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
</head>
<body>
 
<div class="container">
<h2>Add Employee</h2>
  <div class="panel panel-primary">
  
    <div class="panel-heading">Add Employee</div>
    <div class="panel-body">
    <form action="/action_page.php">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
