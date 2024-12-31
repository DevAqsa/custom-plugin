<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <link rel ="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">


</head>
<body>

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
      <tr>
        <td>1</td>
        <td>Aqsa</td>
        <td>abc@example.com</td>
        <td>FeMale</td>
        <td>PHP developer</td>
        <td>
            <button type="button" class="btn btn-warning">Edit</button>
            <button type="button" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-danger">Delete</button>

        </td>

      </tr>
     
    </tbody>
  </table>

  </div>
</div>


 
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

<script>

    $(function(){

        //list employee data table
        new DataTable('#tbl-employee');
    });
</script>

</body>
</html>
