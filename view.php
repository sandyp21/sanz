<?php 

    $title = 'View Record';

    require_once 'includes/header.php';
    require_once 'includes/auth_check.php'; 
    require_once 'db/conn.php';

    //get an member by id
    if(!isset($_GET['id'])){ include 'includes/errormessage.php';
        
    }
    else{
        $id = $_GET['id'];
        $result = $crud->getMemberDetails($id);
   
    
    ?>
 <img src="<?php echo empty($result['avatar_path']) ? "uploads/blank.png" : $result['avatar_path'] ; ?>
 " class="rounded-circle" style="width: 20%; height: 20%" />

<div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
            <?php echo $result['firstname'] .' '. $result['lastname']; ?></h5>

            <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $result['name']; ?></h6>

            <p class="card-text">
            Date Of Birth: <?php echo $result['dateofbirth']; ?>
            </p>

            <p class="card-text">
            Address: <?php echo $result['address1']; ?>
            </p>

            <p class="card-text">
            Address: <?php echo $result['address2']; ?>
            </p>

            <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $result['name']; ?></h6>

            <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $result['name']; ?></h6>

            <p class="card-text">
            Contact Number: <?php echo $result['contactnum']; ?>
            </p>

            <p class="card-text">
            Email Address: <?php echo $result['email']; ?>
            </p>
        </div>
    </div>
    <br/>

            <a href="viewrecords.php" class="btn btn-primary">Back To List</a>
            <a href="edit.php?id=<?php echo $result['mem_id'] ?>" class="btn btn-warning">Edit</a>
            <a  onclick= "return confirm('Are you sure you want to delete this record?');"
            href="delete.php?id=<?php echo $result['mem_id'] ?>" class="btn btn-danger">Delete</a>

<?php  } ?>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<br/>


    <?php require_once 'includes/footer.php'; ?>   