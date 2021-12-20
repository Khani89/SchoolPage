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
            <th>Student Grade</th>
            <th>Actions</th>


        </tr>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['register_id'] ?></td>
                <td><?php echo $r['firstname'] ?></td>
                <td><?php echo $r['lastname'] ?></td>
                <td><?php echo $r['name'] ?></td>
                <td>
                    <a href="view.php?id=<?php echo $r['register_id'] ?>" class="btn btn-primary">View</a>
                    <a href="edit.php?id=<?php echo $r['register_id'] ?>" class="btn  btn-warning">Edit</a>
                </td>
            </tr>
        <?php }?>
    </table>

<br/>
<br/>
<br/>
<?php require_once 'includes/footer.php'; ?>


