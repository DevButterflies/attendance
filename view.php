<?php
    $title = 'View Record' ;
    require_once 'includes/header.php';
    require_once 'db/conn.php'; 
    // get attendee by id 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
    }else {
        echo "<h1>Please check details and try again</h1>";
    }
?>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php  echo $result["firstname"] . ' ' . $result["lastname"]  ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $result["name"] ?></h6>
            <p class="card-text">Date Of Birth : <?php echo $result["dateofbirth"] ?></p>
            <p class="card-text">Email Adress : <?php echo $result["emailadress"] ?></p>
            <p class="card-text">Contact Number : <?php echo $result["contactnumber"] ?></p>
        </div>
    </div>
    <td>
        <a href="viewrecords.php" class="btn btn-info">Back To list</a>
        <a href="edit.php?id=<?php echo $result['attendance_id'] ?>" class="btn btn-warning">Edit</a>
        <a onclick="return confirm ('Are you sure you want to delete this statement?')" href="delete.php?id=<?php echo $result['attendance_id'] ?>" class="btn btn-danger">Delete</a>
    </td>





<?php require_once 'includes/footer.php';?>