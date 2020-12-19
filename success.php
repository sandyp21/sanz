<?php 

    $title = 'Success';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    require_once 'sendemail.php';


    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $gender = $_POST['gender'];
        $parish = $_POST['parish'];
        $services = $_POST['services'];
        $contact = $_POST['phone'];
        $email = $_POST['email'];

        $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$contact.$ext";
        move_uploaded_file($orig_file,$destination);
    
        
        //Call function to insert and track if successful or not
        $isSuccess = $crud->insertMember($fname, $lname, $dob, $address1, $address2, $gender, $parish, $services, $contact,$email,$destination);
        $serviceName = $crud->getServicesById($services);
        $parishName = $crud->getParishById($parish);
        $genderName = $crud->getGenderById($gender);


        
        if($isSuccess){
            SendEmail::SendMail($email,'Welcome to Sanz Soul Therapy', 'You have successfully registered for your membership. We have a beautiful line up for you.');
           include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        
        }
    }
    
?>
<!--
    <h1 class="text-center text-success">You Have Been Successfully Registered!</h1>
 get method
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php //echo $_GET['firstname'] .' '. $_GET['lastname']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $_GET['services']; ?></h6>
            <p class="card-text">
            Date Of Birth: <?php //echo $_GET['dob']; ?>
            </p>

            <p class="card-text">
            Email Address: <?php //echo $_GET['email']; ?>
            </p>

            <p class="card-text">
            Contact Number: <?php //echo $_GET['phone']; ?>
            </p>

        </div>
    </div>
 -->
 <img src="<?php echo $destination; ?>" onerror="this.src='uploads/blank.png'" class="rounded-circle" style="width: 20%; height: 20%" />
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_POST['firstname'] .' '. $_POST['lastname']; ?></h5>
            
            <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $serviceName['name']; ?></h6>
            
            <p class="card-text">
            Date Of Birth: <?php echo $_POST['dob']; ?>
            </p>
            <p class="card-text">
            Address: <?php echo $_POST['address1']; ?>
            </p>
            
            <p class="card-text">
            Address: <?php echo $_POST['address2']; ?>
            </p>

            <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $genderName['name']; ?></h6>
            <p class="card-text">

            <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $parishName['name']; ?></h6>
            <p class="card-text">
            
            <p class="card-text">
            Contact Number: <?php echo $_POST['phone']; ?>
            </p>

            <p class="card-text">
            Email Address: <?php echo $_POST['email']; ?>
            </p>
        </div>
    </div>
<!--
    <?php 
        echo $_POST['firstname']; 
        echo $_POST['lastname'];
        echo $_POST['dob'];
        echo $_POST['address1'];
        echo $_POST['address2'];
        echo $_POST['gender'];
        echo $_POST['parish'];
        echo $_POST['services'];
        echo $_POST['phone'];
        echo $_POST['email'];
    ?>
-->


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<br/>


    <?php require_once 'includes/footer.php'; ?> 