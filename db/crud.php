<?php
class crud{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }
    // function to insert new records in the database
    public function insertAttendees($fname,$lname,$dob,$email,$contact,$specialty,$avatar){
        try {
            $sql = "INSERT INTO attendee(firstname,lastname,dateofbirth,emailaddress,contact,specialty_id,avatar_path)
             VALUES(:fname,:lname,:dob,:email,:contact,:specialty,:avatar)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':dob',$dob);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':contact',$contact);
            $stmt->bindparam(':specialty',$specialty);
            $stmt->bindparam(':avatar',$avatar);



            $stmt->execute();
            return true;
            //code...
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            
        }

    }
    public function editAttendee($id,$fname,$lname,$dob,$email,$contact,$specialty){
        try{
            $sql ="UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,
            `emailaddress`=:email,`contact`=:contact,`specialty_id`=:specialty WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':dob',$dob);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':contact',$contact);
            $stmt->bindparam(':specialty',$specialty);
    
    
    
            $stmt->execute();
            return true;

        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            
        }

       

    }
    public function getAttendees(){
        try {
            $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id;";
            $result = $this->db->query($sql);
            return $result;
        }  
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            
        }
    }
    public function getAttendeeDetails($id){
        try{
            $sql = "SELECT * FROM attendee a inner join specialties s on a.specialty_id = s.specialty_id WHERE  attendee_id = :id;";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $results = $stmt->fetch();
            return $results;

        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            
        }
        

    }
    public function deleteAttendee($id){
        try{
            $sql ="delete from attendee where attendee_id= :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            return true;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            
        }

    }
    public function getSpecialties(){
        try{
            $sql = "SELECT * FROM `specialties`;";
            $result = $this->db->query($sql);
            return $result;

        }

         catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            
        }

    }
    
}
?>