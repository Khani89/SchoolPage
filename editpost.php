<?php 
    require_once 'database/conn.php'; 

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $studentgrade = $_POST['studentgrade'];
        $parentsemail = $_POST['parentsemail'];
        $parentscontact = $_POST['phone'];

        $result = $crud->editStudent($id,$fname, $lname, $age, $gender, $dob, $studentgrade, $parentsemail, $parentscontact);
        if($result){
            header("Location: registeredstudents.php");
        }
        else{
            echo 'includes/errormessage.php';
        }
        
    }

?>