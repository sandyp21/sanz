<?php 

require_once 'db/conn.php';
//Get values from post operation
if(isset($_POST['submit'])){
    //extract values from the $_POST array
    $id = $_POST['id'];
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

//Call crud function
$result = $crud->editMember($id, $fname, $lname, $dob, $address1, $address2, $gender, $parish, $services, $contact, $email);


//Redirect to index.php
if($result){
    header("Location: viewrecords.php");
}
else{
    //echo 'error';
    include 'includes/errormessage.php';
}
}


else{
    //echo 'error';
    include 'includes/errormessage.php';
}




?>