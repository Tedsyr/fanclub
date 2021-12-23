<?php
require_once 'db/conn.php';    
//Get values fro, post operation
if (isset($_POST['submit'])){
    //Extract Values from the $_POST Array
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $sex = $_POST['sex'];
    $yard = $_POST['yard'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $tof = $_POST['tof'];

    //Call Crud function
    $result = $crud->editFan($id, $fname, $lname, $sex, $yard,$dob, $email, $contact, $tof);

    //Redirect to viewrecords.php
    if($result){
        header("Location: viewrecords.php");
    }

        else{                                                                                                                            
            //echo 'error';
            include 'includes/errormessage.php';
        }
    }
    else{
        echo 'error';
    }    


?>