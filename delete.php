<?php 
    require_once 'database/conn.php'; 

    if(!$_GET['id']){
        include 'includes/errormessage.php';
        header("Location: registeredstudents.php");
    }else{
        $id =$_GET['id'];

        $result = $crud->deleteStudent($id);

        if($result){
            header("Location: registeredstudents.php");
        }
        else{
            echo '';
        }
    }
   


?>