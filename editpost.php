<?php 
    // Get values from post operation 
    if(isset($_POST['submit'])){
        //extract values from _POST array 
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $speciality = $_POST['speciality'];
        //call crud function 
        $result= $crud->editAttendee($id,$fname,$lname,$dob,$email,$contact,$speciality);
        //Redirect to the index page 
        if($result){
            header("Location:viewrecords.php");
        }else{
            echo 'error';
        }
    }else {
        echo 'error';
    }




?>