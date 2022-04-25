
    
    <?php
        $title = 'Edit Record' ;
        require_once 'includes/header.php';
        require_once 'db/conn.php';
        $results=$crud->getSpecialities();

        if(!isset($_GET['id'])){
            //echo 'There is an error';
            include 'includes/errormessage.php';
            header("location: viewrecords.php");
        }else {
            $id=$_GET['id'];
            $edit = $crud->getAttendeeDetails($id);
       
        
    ?>

        <h1 class="text-center">Edit Record</h1>
        <form method="post" action="success.php">
            <input type="hidden" name="id" value="<?php echo $edit['attendance_id'] ?>">
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" value="<?php echo $edit['firstname'] ?>" name="firstname" placeholder="Enter your first name" >
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" value="<?php echo $edit['lastname'] ?>" name="lastname" placeholder="Enter your last name" >
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Birthday Date</label>
                <input type="date" class="form-control" id="dob" value="<?php echo $edit['dateofbirth'] ?>" name="dob" placeholder="Enter your birthday date" >
            </div>
            <div class="mb-3">
                <label for="speciality" class="form-label">Area Of Expertise</label>
                <select class="form-control" id="speciality" name="speciality" >
                    <?php  while($r=$results->fetch(PDO::FETCH_ASSOC)){ ?>
                        <option selected value="<?php  echo $r['speciality_id']?>" <?php if($r['speciality_id']==$edit['speciality_id']) echo 'selected'?> >
                            <?php echo $r['name'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" value="<?php echo $edit['emailadress'] ?>" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="phone" value="<?php echo $edit['contactnumber'] ?>" name="phone" aria-describedby="PhoneHelp" >
                <div id="PhoneHelp" class="form-text">We'll never share your number with anyone else.</div>
            </div>
           
            <button type="submit" name="submit" class="btn btn-warning btn-block">Save Changes</button>
        </form>

        <?php }?>
    <?php 
        require_once 'includes/footer.php';
    
    ?>
