 
<?php 
    $title = 'view records';

    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

   $results = $crud->getFans();
    ?>

<table  class="table">
<tr>

        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th> 
        <th>Type Of Fan</th> 
        <th>Actions</th>

</tr>
<?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>

    <tr>
             <td><?php echo $r['fan_id'] ?></td>
            <td><?php echo $r['firstname'] ?></td>
            <td><?php echo $r['lastname'] ?></td>
            <td><?php echo $r['tof'] ?></td>
        <td>
        <td><a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a></td>
        <td><a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a></td>
        <td><a onclick="return confirm('Are you sure you want to delete this record');" href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger">Delete</a></td>
        </td>
    </tr>

    <?php } ?>

</table>

        <br>
      <br>
      <br>
    <?php require_once 'includes/footer.php'; ?>
