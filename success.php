<?php
    $title = 'Success' ;
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        // extract values from $_POSt array 
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $speciality = $_POST['speciality'];
        //call function to insert and track if success or not 
        $isSuccess = $crud->insert($fname, $lname,$dob,$email,$contact,$speciality);

        if($isSuccess){
            include 'includes/successmessage.php';
        }
        else {
            //echo '<h1 class="text-center text-success">There was been an error in processing</h1>'; 
            include 'includes/errormessage.php';
        }
        
    }
?>

    <h1 class="text-center text-success">You Have Been Registered!</h1>
    <!-- The get Method 
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php // echo $_GET["firstname"] . ' ' . $_GET["lastname"]  ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php // echo $_GET["speciality"] ?></h6>
            <p class="card-text">Date Of Birth : <?php //echo $_GET["dob"] ?></p>
            <p class="card-text">Email Adress : <?php //echo $_GET["email"] ?></p>
            <p class="card-text">Contact Number : <?php //echo $_GET["phone"] ?></p>
        </div>
    </div>
-->
    <?php  
        //echo $_GET["firstname"];
        //echo $_GET["lastname"];
        //echo $_GET["dob"];
        //echo $_GET["speciality"];
        //echo $_GET["email"];
        //echo $_GET["phone"];
    ?>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php  echo $_POST["firstname"] . ' ' . $_POST["lastname"]  ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST["speciality"] ?></h6>
            <p class="card-text">Date Of Birth : <?php echo $_POST["dob"] ?></p>
            <p class="card-text">Email Adress : <?php echo $_POST["email"] ?></p>
            <p class="card-text">Contact Number : <?php echo $_POST["phone"] ?></p>
        </div>
    </div>
    <?php  
        echo $_POST["firstname"];
        echo $_POST["lastname"];
        echo $_POST["dob"];
        echo $_POST["speciality"];
        echo $_POST["email"];
        echo $_POST["phone"];
    ?>





<?php require_once 'includes/footer.php';?>