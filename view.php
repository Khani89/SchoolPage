<?php
    $title = 'View Record'; 

    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'database/conn.php'; 

    if(!isset($_GET['id'])){
        echo "<h1 class='text-danger'>Please check details and try again</h1>";
       
    } else{
        $id = $_GET['id'];
        $result = $crud->getStudentDetails($id);

?>
<div class="card" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title">
                    Name: <?php echo $result['firstname'] . ' ' . $result['lastname']; ?> 
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    Age: <?php echo $result['age']; ?> 
                </h6>
                <p class="card-text">
                    Gender: <?php echo $result['gender']; ?> 
                </p>
                <p class="card-text">
                    Date of Birth: <?php echo $result['dateofbirth']; ?> 
                </p>
                <p class="card-text">
                    Grade: <?php echo $result['name']; ?> 
                </p>
                <p class="card-text">
                    Parents Email Address: <?php echo $result['parentsemailaddress']; ?> 
                </p>
                <p class="card-text">
                    Parents Contact Number: <?php echo $result['parentscontactnumber']; ?> 
                </p>    
            </div>
        </div>
        <br/>
                    <a href="registeredstudents.php" class="btn btn-info">Back To List</a>
                    <a href="edit.php?id=<?php echo $result['register_id'] ?>" class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this record?');" 
                    href="delete.php?id=<?php echo $result['register_id'] ?>" class="btn btn-danger">Delete</a>

    <?php } ?>





<br/>
<br/>
<br/>
<?php require_once 'includes/footer.php'; ?>