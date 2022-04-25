<?php

use LDAP\Result;

    class crud{
        //private database object
        private $db ;

        //constructor to initialize private to the database connection
        function __construct($conn){
            $this->db = $conn ;
        }

        //function to insert a new recort into the attendance database 
        public function insert($fname,$lname,$dob,$email,$contact,$speciality){
            try {
                // define sql statement to be excuted 
                $sql = "INSERT INTO attendance (firstname,lastname,dateofbirth,emailadress,contactnumber,speciality_id) VALUES (:fname,:lname,:dob,:email,:contact,:speciality)";
                // prepare the sql statement for execution 
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values 
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':speciality',$speciality);
                // excute statements 
                $stmt->execute();
                return true ;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }


        }

        public function editAttendee($id,$fname,$lname,$dob,$email,$contact,$speciality){
            try {
                $sql = "UPDATE `attendance` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`emailadress`=:email,`contactnumber`=:contact,`speciality_id`=:speciality WHERE attendance_id=:id";
                // prepare the sql statement for execution 
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values 
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':speciality',$speciality);
                // excute statements 
                $stmt->execute();
                return true ;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendee(){
            try{
                $sql = "SELECT * FROM `attendance` a inner join specialities s on a.speciality_id = s.speciality_id" ;
                $result=$this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendeeDetails($id){
            try {
                $sql = "Select * from attendance a inner join specialities s on a.speciality_id = s.speciality_id where attendance_id = :id ";
                $stmt = $this ->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result ;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        
        public function deleteAttendee($id){
            try {
                $sql = "delete from attendance where attendance_id = :id";
                $stmt = $this ->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();   
                return true ;   
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function getSpecialities(){
            try {
                $sql = "SELECT * FROM `specialities`" ;
                $result=$this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }




?>