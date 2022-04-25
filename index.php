
    
    <?php
        $title = 'Index' ;
        require_once 'includes/header.php';
        require_once 'db/conn.php';
        $results=$crud->getSpecialities();
    ?>
        <!-- 
            - first name 
            -last name 
            -date of birth (date picker)
            -speciality (database admin ,software developper ,web administrator , other) 
            -email adress 
            -contact number 
        -->
        <h1 class="text-center">Registration For IT Conferences</h1>
        <form method="post" action="success.php">
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input required type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your first name" >
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input required type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last name" >
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Birthday Date</label>
                <input required type="date" class="form-control" id="dob" name="dob" placeholder="Enter your birthday date" >
            </div>
            <div class="mb-3">
                <label for="speciality" class="form-label">Area Of Expertise</label>
                <select class="form-control" id="speciality" name="speciality" >
                    <?php  while($r=$results->fetch(PDO::FETCH_ASSOC)){ ?>
                        <option value="<?php  echo $r['speciality_id']?>"><?php echo $r['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Contact Number</label>
                <input required type="text" class="form-control" id="phone" name="phone" aria-describedby="PhoneHelp" >
                <div id="PhoneHelp" class="form-text">We'll never share your number with anyone else.</div>
            </div>
           
            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    <?php 
        require_once 'includes/footer.php';
    
    ?>

   