<?php 
    class crud {

    
        //private database object
        private $db;

        //constructor to initialize private variable to the database
        function __construct($conn){
            $this->db = $conn;
        }
        //function to insert a new record into the sanz database
        public function insertMember($fname, $lname, $dob, $address1, $address2, $gender, $parish, $services, $contact, $email, $avatar_path){
            try {
                //define sql statement to be executed
                $sql = "INSERT INTO member (firstname,lastname,dateofbirth,address1,address2,gen_id,par_id,service_id,contactnum,email,avatar_path) 
                VALUES (:fname, :lname, :dob, :address1, :address2, :gender, :parish, :services, :contact, :email, :avatar_path)";

                 //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                
                //bind all placeholders to the actual value
                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':address1', $address1);
                $stmt->bindparam(':address2', $address2);
                $stmt->bindparam(':gender', $gender);
                $stmt->bindparam(':parish', $parish);
                $stmt->bindparam(':services', $services);
                $stmt->bindparam(':contact', $contact);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':avatar_path', $avatar_path);


                // execute statement
                $stmt->execute();
                return true;
                

            } catch (PDOException $e) {
                //throw $th;
                echo $e->getMessage();
                return false;
            }

        }

        public function editMember($id, $fname, $lname, $dob, $address1, $address2, $gender, $parish, $services, $contact, $email){
        try{ 
            $sql = "UPDATE `member` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`address1`=:address1,
            `address2`=:address2, gen_id=:gender, par_id=:parish, service_id=:services,`contactnum`=:contact,`email`=:email WHERE 
            mem_id = :id ";


                $stmt = $this->db->prepare($sql);
                                
                //bind all placeholders to the actual value
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':address1', $address1);
                $stmt->bindparam(':address2', $address2);
                $stmt->bindparam(':gender', $gender);
                $stmt->bindparam(':parish', $parish);
                $stmt->bindparam(':services', $services);
                $stmt->bindparam(':contact', $contact);
                $stmt->bindparam(':email', $email);

                // execute statement
                $stmt->execute();
                return true;
            }
        catch (PDOException $e) {
                //throw $th;
                echo $e->getMessage();
                return false;
        }

            
        }

        public function getMember(){
            try{
                $sql = "SELECT * FROM `member` a inner join services s on a.service_id = s.service_id";
            $result = $this->db->query($sql);
            return $result;

            }catch (PDOException $e) {
                //throw $th;
                echo $e->getMessage();
                return false;
            
        }
    }

        public function getMemberDetails($id){
            try{
                $sql = "select * from member a inner join services s on a.service_id = s.service_id where mem_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
            }catch (PDOException $e) {
                //throw $th;
                echo $e->getMessage();
                return false;
            
        }
            
        }

        public function deleteMember($id){
           try{
            $sql = "delete from member where mem_id = :id ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
           }
           catch (PDOException $e) {
                //throw $th;
                echo $e->getMessage();
                return false;
           }
        }

        public function getServices(){
            try{
                $sql = "SELECT * FROM `services`";
            $services = $this->db->query($sql);
            return $services;
            }
            
        
        catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
            return false;
       }

    }

    public function getServicesById($id){
        try{
            $sql = "SELECT * FROM `services` where service_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $services = $stmt->fetch();
            return $services;
           }
           catch (PDOException $e) {
                //throw $th;
                echo $e->getMessage();
                return false;
           }
    }
    public function getParish(){
        try{
            $sql = "SELECT * FROM `parish`";
        $parishes = $this->db->query($sql);
        return $parishes;
        }
        
    
    catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
        return false;
   }

}
    public function getParishById($id){
        try{
            $sql = "SELECT * FROM `parish` where par_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $parishes = $stmt->fetch();
            return $parishes;
           }
           catch (PDOException $e) {
                //throw $th;
                echo $e->getMessage();
                return false;
           }
    }

    public function getGender(){
        try{
            $sql = "SELECT * FROM `gender`";
        $gender = $this->db->query($sql);
        return $gender;
        }
        
    
    catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
        return false;
   }

}
    public function getGenderById($id){
        try{
            $sql = "SELECT * FROM `gender` where gen_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $gender = $stmt->fetch();
            return $gender;
           }
           catch (PDOException $e) {
                //throw $th;
                echo $e->getMessage();
                return false;
           }
    }



    
}  





?>