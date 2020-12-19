<?php 

$title = 'Registration';
$page = 'reg';

require_once 'includes/header.php'; 
require_once 'db/conn.php';

    $services = $crud->getServices();
    $parishes = $crud->getParish();
    $gender = $crud->getGender();


?>
<!--
        -First Name
        -Last Name
        -Email Address
        -Address
        -Contact Number

    -->
<h1 class="text-center">Membership Registration</h1>

<form method="post" action="success.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input  required type="text" class="form-control" id="firstname" name="firstname" >
    </div>

    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input  required type="text" class="form-control" id="lastname" name="lastname" >
    </div>
    <div class="form-group">
        <label for="dob">Date Of Birth</label>
        <input type="text" class="form-control" id="dob" name="dob" >
    </div>
    <div class="form-group">
        <label for="address1">Address</label>
        <input type="text" class="form-control" id="address1"  name="address1" placeholder="1234 Main St">
    </div>
    <div class="form-group">
        <label for="address2">Address 2</label>
        <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment, studio, or floor">
    </div>
  
    <div class="form-group">
        <label for="gender">Choose Your Gender</label>
        <select class="form-control"  id="gender" name="gender" >
            <?php while($g = $gender->fetch(PDO::FETCH_ASSOC)) {?>
            <option value="<?php echo $g['gen_id'] ?>"><?php echo $g['name'];?></option>
            <?php } ?>
    </select>
    </div>
    
    <div class="form-group">
        <label for="parish">Choose Your Parish</label>
        <select class="form-control"  id="parish" name="parish" >
            <?php while($p = $parishes->fetch(PDO::FETCH_ASSOC)) {?>
            <option value="<?php echo $p['par_id'] ?>"><?php echo $p['name'];?></option>
            <?php } ?>
    </select>
    </div>
    
    
    <div class="form-group">
        <label for="services">Choice of Service</label>
        <select class="form-control"  id="services" name="services" >
            <?php while($s = $services->fetch(PDO::FETCH_ASSOC)) {?>
            <option value="<?php echo $s['service_id'] ?>"><?php echo $s['name'];?></option>
            <?php } ?>
    </select>
    </div>
    <div class="form-group">
        <label for="phone">Contact Number</label>
        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
        <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
    </div>
    
    <div class="form-group">
        <label for="email">Email Address</label>
        <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="custom-file">
        <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar" >
        <label class="custom-file-label" for="avatar">Choose File</label>
        <small id="avatar" class="form-text text-danger">File Upload is Optional</small>
        
    </div>
    
    <br/>
    <br/>
    <br/>
    <button type="submit" class="btn btn-info btn-lg" name="submit">Submit</button>
</form>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<br/>


    <?php require_once 'includes/footer.php'; ?>   