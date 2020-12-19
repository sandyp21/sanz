
<?php 

$title = 'Edit Record';

require_once 'includes/header.php'; 
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

$services = $crud->getServices();
$parishes = $crud->getParish();
$gender = $crud->getGender();



if(!isset($_GET['id']))
{
    //echo 'error';
    include 'includes/errormessage.php';
    header("Location: viewrecords.php");
}
else{
    $id = $_GET['id'];
    $member = $crud->getMemberDetails($id);
?>



<h1 class="text-center">Edit Record</h1>

<form method="post" action="editpost.php">
<input type="hidden"  name = "id" value="<?php echo $member['mem_id'] ?>" />
<div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" value="<?php echo $member['firstname'] ?>" id="firstname" name="firstname" >
</div>

<div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control"  value="<?php echo $member['lastname'] ?>"id="lastname" name="lastname" >
</div>

<div class="form-group">
    <label for="dob">Date Of Birth</label>
    <input type="text" class="form-control"  value="<?php echo $member['dateofbirth'] ?>"id="dob" name="dob" >
</div>
<div class="form-group">
    <label for="address1">Address</label>
    <input type="text" class="form-control"  value="<?php echo $member['address1'] ?>"id="address1" name="address1" >
</div>
<div class="form-group">
    <label for="address2">Address</label>
    <input type="text" class="form-control"  value="<?php echo $member['address2'] ?>"id="address2" name="address2" >
</div>

<div class="form-group">
    <label for="gender">Choose Your Gender</label>
    <select class="form-control"    id="gender" name="gender" >
        <?php while($g = $gender->fetch(PDO::FETCH_ASSOC)) {?>
        <option value="<?php echo $g['gen_id'] ?>" <?php if($g['gen_id'] == 
        $member['gen_id']) echo 'selected'?>>
                <?php echo $g['name'];?>
        </option>

        <?php } ?>
</select>
</div>

<div class="form-group">
    <label for="parish">Choose Your Parish</label>
    <select class="form-control"    id="parish" name="parish" >
        <?php while($p = $parishes->fetch(PDO::FETCH_ASSOC)) {?>
        <option value="<?php echo $p['par_id'] ?>" <?php if($p['par_id'] == 
        $member['par_id']) echo 'selected'?>>
                <?php echo $p['name'];?>
        </option>

        <?php } ?>
</select>
</div>

<div class="form-group">
    <label for="services">Your Choice of Service</label>
    <select class="form-control"    id="services" name="services" >
        <?php while($s = $services->fetch(PDO::FETCH_ASSOC)) {?>
        <option value="<?php echo $s['service_id'] ?>" <?php if($s['service_id'] == 
        $member['service_id']) echo 'selected'?>>
                <?php echo $s['name'];?>
        </option>

        <?php } ?>
</select>
</div>

<div class="form-group">
    <label for="phone">Contact Number</label>
    <input type="text" class="form-control"  value="<?php echo $member['contactnum'] ?>" id="phone" name="phone" aria-describedby="phoneHelp">
    <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
</div>

<div class="form-group">
    <label for="email">Email address</label>
    <input readonly type="email" class="form-control"  value="<?php echo $member['email'] ?>" id="email" name="email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>



<a href="viewrecords.php" class="btn btn-light btn-lg btn-outline-primary">Back To List</a>
<button type="submit" class="btn btn-light btn-lg btn-outline-success" name="submit">Save Changes</button>


</form>

        <?php } ?>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<br/>


<?php require_once 'includes/footer.php'; ?>   