<?php 

    $title = 'View Records';

    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    //get all members
    $results = $crud->getMember();
    

?>

<h1 class="text-center">Member Record</h1>
<br>
<br>
<table class = 'table'>
    

    <tr>
    <th>#</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Address</th>
    <th>Address</th>
    <th>Services</th>
    <th>Contact Number</th>
    <th>Actions</th>

    </tr>

    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
      <tr>
      <td><?php echo $r['mem_id'] ?></td>
      <td><?php echo $r['firstname'] ?></td>
      <td><?php echo $r['lastname'] ?></td>
      <td><?php echo $r['address1'] ?></td>
      <td><?php echo $r['address2'] ?></td>
      <td><?php echo $r['name'] ?></td>
      <td><?php echo $r['contactnum'] ?></td>


      <td>
        <a href="view.php?id=<?php echo $r['mem_id'] ?>" class="btn btn-primary">View</a>
        <a href="edit.php?id=<?php echo $r['mem_id'] ?>" class="btn btn-warning">Edit</a>
        <a  onclick= "return confirm('Are you sure you want to delete this record?');"
         href="delete.php?id=<?php echo $r['mem_id'] ?>" class="btn btn-danger">Delete</a>

      </td>

    </tr> 
    <?php } ?>
</table>



<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<br/>


    <?php require_once 'includes/footer.php'; ?>   