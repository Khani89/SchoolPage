<?php
    $title = 'Registered Students'; 

    require_once 'includes/header.php';
    require_once 'database/conn.php'; 

    $results = $crud->getStudent();      
?>

    <table class="table">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Student Grade</th>
            <th>Parents Email Address</th>
            <th>Parents Contact Number</th>

        </tr>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['register_id'] ?></td>
                <td><?php echo $r['firstname'] ?></td>
                <td><?php echo $r['lastname'] ?></td>
                <td><?php echo $r['age'] ?></td>
                <td><?php echo $r['gender'] ?></td>
                <td><?php echo $r['dateofbirth'] ?></td>
                <td><?php echo $r['studentgrade_id'] ?></td>
                <td><?php echo $r['parentsemailaddress'] ?></td>
                <td><?php echo $r['parentscontactnumber'] ?></td>
            </tr>
        <?php }?>
    </table>

<br/>
<br/>
<br/>
<?php require_once 'includes/footer.php'; ?>


