<?php
    $title = 'success'; 

    require_once 'includes/header.php'; 
    require_once 'database/conn.php';
    require_once 'sendemail.php';

    if(isset($_POST['submit'])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $studentgrade = $_POST['studentgrade'];
        $parentsemail = $_POST['parentsemail'];
        $parentscontact = $_POST['phone'];

        $isSuccess = $crud->insertstudent($fname, $lname, $age, $gender, $dob, $studentgrade, $parentsemail, $parentscontact);
        $specialtyName = $crud->getStudentById($studentgrade); 

        if($isSuccess){
            sendemail::SendMail($email, 'Welcome to All for Learninig Primary', 'Your child has been registered successfully to our School');
            include 'includes/successmessage.php';

        }
        else{
            include 'includes/errormessage.php';
        }

    }

    
?>


        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title">
                    Name: <?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?> 
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    Age: <?php echo $_POST['age']; ?> 
                </h6>
                <p class="card-text">
                    Gender: <?php echo $_POST['gender']; ?> 
                </p>
                <p class="card-text">
                    Date of Birth: <?php echo $_POST['dob']; ?> 
                </p>
                <p class="card-text">
                    Grade: <?php echo $specialtyName['name']; ?> 
                </p>
                <p class="card-text">
                    Parents Email Address: <?php echo $_POST['parentsemail']; ?> 
                </p>
                <p class="card-text">
                    Parents Contact Number: <?php echo $_POST['phone']; ?> 
                </p>

                
            </div>
        </div>
    


<br/>
<br/>
<br/>
<br/>
<?php require_once 'includes/footer.php'; ?>