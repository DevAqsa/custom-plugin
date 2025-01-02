<?php
$message = "";
$status = "";
$action = "";
$empId = "";
$employee_model = new Employee();

// Find request for View and Edit
if(isset($_GET['action']) && isset($_GET['empId'])) {
    $empId = $_GET['empId'];
    
    // Action: Edit or View
    $action = $_GET['action'];
    
    // Single employee information
    $employee = $employee_model->get_by_id($empId);
}

// Save Form data
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["btn_submit"])) {
    $data = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phoneNo' => $_POST['phoneNo'],
        'gender' => $_POST['gender'],
        'designation' => $_POST['designation']
    );
    
    // Action type
    if(isset($_GET['action']) && $_GET['action'] == "edit") {
        $result = $employee_model->update($data, $_GET['empId']);
        $message = "Employee updated successfully";
        $status = 1;
    } else {
        $result = $employee_model->create($data);
        
        if($result) {
            $message = "Employee saved successfully";
            $status = 1;
        } else {
            $message = "Failed to save an employee";
            $status = 0;
        }
    }
}

// Rest of your HTML code remains the same
?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h2>
                <?php 
                if($action == "view"){
                    echo "View Employee";
                }elseif($action == "edit"){
                    echo "Update Employee";
                }else{
                    echo "Add Employee";
                }
            ?>

            </h2>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?php 
                if($action == "view"){
                    echo "View Employee";
                }elseif($action == "edit"){
                    echo "Update Employee";
                }else{
                    echo "Add Employee";
                }
            ?>
                </div>
                <div class="panel-body">

                    <?php 
                        if(!empty($message)) {

                            if($status == 1){

                                ?>
                    <div class="alert alert-success">
                        <?php echo $message; ?>
                    </div>
                    <?php
                            }else{

                                ?>
                    <div class="alert alert-danger">
                        <?php echo $message; ?>
                    </div>
                    <?php
                            }
                        }
                    ?>

                    <form action='<?php if($action == "edit"){
                        echo "admin.php?page=employee-system&action=edit&empId=".$empId;
                    }else{
                        echo "admin.php?page=employee-system";
                    } ?>' method="post" id="ems-frm-add-employee">

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text"
                                value="<?php if($action == 'view' || $action == 'edit'){ echo $employee['name']; } ?>"
                                required <?php if($action == "view"){ echo "readonly='readonly'"; } ?>
                                class="form-control" id="name" placeholder="Enter name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email"
                                value="<?php if($action == 'view' || $action == 'edit'){ echo $employee['email']; } ?>"
                                required class="form-control"
                                <?php if($action == "view"){ echo "readonly='readonly'"; } ?> id="email"
                                placeholder="Enter email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="phoneNo">Phone No:</label>
                            <input type="text"
                                value="<?php if($action == 'view' || $action == 'edit'){ echo $employee['phoneNo']; } ?>"
                                class="form-control" id="phoneNo"
                                <?php if($action == "view"){ echo "readonly='readonly'"; } ?>
                                placeholder="Enter phone number" name="phoneNo">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select <?php if($action == "view") {echo "disabled";} ?> name="gender" id="gender"
                                class="form-control">
                                <option value="">Select gender</option>
                                <option value="male"
                                    <?php if(($action == "view" || $action == "edit") && $employee['gender'] == "male"){ echo "selected"; } ?>>
                                    Male</option>
                                <option
                                    <?php if(($action == "view" || $action == "edit") && $employee['gender'] == "female"){ echo "selected"; } ?>
                                    value="female">Female</option>
                                <option
                                    <?php if(($action == "view" || $action == "edit") && $employee['gender'] == "other"){ echo "selected"; } ?>
                                    value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation:</label>
                            <input type="text" required
                                value="<?php if($action == 'view' || $action == 'edit'){ echo $employee['designation']; } ?>"
                                class="form-control" id="designation"
                                <?php if($action == "view"){ echo "readonly='readonly'"; } ?>
                                placeholder="Enter designation" name="designation">
                        </div>

                        <?php 
                        if($action == "view"){

                            // no button
                            
                        }elseif($action == "edit"){
                            ?>
                        <button type="submit" class="btn btn-success" name="btn_submit">Update</button>
                        <?php
                        }else{
                            ?>
                        <button type="submit" class="btn btn-success" name="btn_submit">Submit</button>
                        <?php
                        }
                        ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>