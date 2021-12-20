<?php
        $title = 'index'; 
        require_once 'includes/header.php';
        require_once 'database/conn.php'; 
 
        $results = $crud->getStudentsgrade();

    ?>
        <!--
        - First Name
        - Last Name
        - Age
        - Date of Birth (Use DatePicker)
        - Student Grade(Grade 1, Grade 2, Grade 3, Grade 4, Grade 5, Grade 6)
        - Parents Email Address
        - Parents Contact Number
        -->

    <h1 class="text-center">Registration for Students</h1>

    <form method="post" action="success.php">
    <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname"> 
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname"> 
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" class="form-control" id="age" name="age"> 
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option>Male</option>
                <option>Female</option>                
            </select>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" id="dob" name="dob"> 
        </div>
        <div class="form-group">
            <label for="studentgrade">Student Grade</label>
            <select class="form-control" id="studentgrade" name="studentgrade">
            <?php while($r= $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['studentgrade_id'] ?>"><?php echo $r['name']; ?></option>
                <?php }?>  
            </select>
        </div>
        <div class="form-group">
            <label for="parentsemail">Parents Email address</label>
            <input type="email" class="form-control" id="parentsemail" name="parentsemail"
            aria-describedby="parentsemailHelp" >
            <small id="parentsemailHelp" class="form-text text-muted">
            We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phone">Parents Contact Number</label>
            <input type="text" class="form-control" id="phone" name="phone"
            aria-describedby="phoneHelp" >
            <small id="phoneHelp" class="form-text text-muted">
            We'll never share your number with anyone else.</small>
        </div>
        
        <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
    </form>
    <br/>
    <br/>
    <br/>
    <br/>
    <?php require_once 'includes/footer.php'; ?>
