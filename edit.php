<?php
        $title = 'Edit Record'; 

        require_once 'includes/header.php';
        require_once 'database/conn.php'; 
 
        $results = $crud->getStudentsgrade();

        if(!isset($_GET['id']))
    {
        include 'includes/errormessage.php';
        header("Location: registeredstudents.php");
    }
    else{
        $id = $_GET['id'];
        $student = $crud->getStudentDetails($id);
    

    ?>
       

    <h1 class="text-center">Edit Record</h1>

    <form method="post" action="editpost.php">
    <input type= "hidden" name="id" value="<?php echo $student['register_id'] ?>" />
    <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" value="<?php echo $student['firstname'] ?>" id="firstname" name="firstname"> 
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $student['lastname'] ?>" id="lastname" name="lastname"> 
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" class="form-control" value="<?php echo $student['age'] ?>" id="age" name="age"> 
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" value="<?php echo $student['gender'] ?>" id="gender" name="gender">
                <option>Male</option>
                <option>Female</option>                
            </select>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $student['dateofbirth'] ?>" id="dob" name="dob"> 
        </div>
        <div class="form-group">
            <label for="studentgrade">Student Grade</label>
            <select class="form-control" id="studentgrade" name="studentgrade">
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['studentgrade_id'] ?>"<?php if($r['studentgrade_id'] ==
                    $student['studentgrade_id']) echo 'selected'?>>
                        <?php echo $r['name']; ?>
                    </option>
                <?php }?>    
            </select>
        </div>
        <div class="form-group">
            <label for="parentsemail">Parents Email address</label>
            <input type="email" class="form-control" value="<?php echo $student['parentsemailaddress'] ?>" id="parentsemail" name="parentsemail"
            aria-describedby="parentsemailHelp" >
            <small id="parentsemailHelp" class="form-text text-muted">
            We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phone">Parents Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $student['parentscontactnumber'] ?>" id="phone" name="phone"
            aria-describedby="phoneHelp" >
            <small id="phoneHelp" class="form-text text-muted">
            We'll never share your number with anyone else.</small>
        </div>
        
        <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
    </form>

<?php } ?>

    <br/>
    <br/>
    <br/>
    <br/>
    <?php require_once 'includes/footer.php'; ?>
