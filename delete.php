<?php 
    require_once 'db/conn.php';
    if(!isset($_GET['id'])){
        echo 'error';
    }else {
        //Get id values 
        $id = $_GET['id'];

        //call delete function 
        $result=$crud->deleteAttendee($id);
        //Redirect to list 
        if ($result) {
            header("location: viewrecords.php");
        }else {
           // echo 'error';
           include 'includes/errormessage.php';
        }
    }

?>