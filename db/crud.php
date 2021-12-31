<?php
    class crud{
        //private database object\
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;

        }
        // function to insert a new record into the fan club database
        public function insertFans($fname, $lname, $sex, $yard,$dob, $email, $contact, $tof, $avatar){
            try {
                //define sql statement to be executed
                $sql = "INSERT INTO fan (firstname,lastname,sex,yard,dateofbirth,emailaddress,contactnumber,tof_id, imgpath)
                 VALUES (:fname, :lname, :sex, :yard, :doa, :email, :contact, :tof :avatar)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                //bind all placeholders to the actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':sex',$sex);
                $stmt->bindparam(':yard',$yard);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':tof',$tof);
                $stmt->bindparam(':imgpath',$avatar);

                //execute statement
                $stmt->execute();
                return  true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                
            }
        }

        public function editFan($id, $fname, $lname, $sex, $yard,$dob, $email, $contact, $tof){
            try{
                $sql = "UPDATE `fan` SET `firstname`=:fname,`lastname`=:lname,`sex`=:sex,`dateofbirth`=:doa,`yard`=:yard,`emailaddress`=:email,`contactnumber`=:contact,`tof_id`=:tof WHERE fan_id =:id";

                $stmt = $this->db->prepare($sql);
                    //bind all placeholders to the actual values
                    $stmt->bindparam(':id',$id);
                    $stmt->bindparam(':fname',$fname);
                    $stmt->bindparam(':lname',$lname);
                    $stmt->bindparam(':sex',$sex);
                    $stmt->bindparam(':yard',$yard);
                    $stmt->bindparam(':dob',$dob);
                    $stmt->bindparam(':email',$email);
                    $stmt->bindparam(':contact',$contact);
                    $stmt->bindparam(':tof',$tof);
                    //execute statement
                    $stmt->execute();
                    return  true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
                
        public function getFans(){
            try{
                $sql = "SELECT * FROM `fan` a inner join tofs s on a.tof_id = s.tof_id";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getFanDetails($id){
            try{
                $sql = "select * from fan a inner join tofs s on a.tof_id = s.tof_id where fab_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;     
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        
        public function deleteFan($id){
            try{
                $sql = "delete from fan where fan_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getTofs(){
            try{
                $sql = "SELECT * FROM `tofs`;";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                }
            }
           
            public function getTofById($id){
                try{
                    $sql = "SELECT * FROM `tofs` where tof_id = :id;";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':id', $id);
                    $stmt->execute();
                    $result = $stmt->fetch();
                    return $result;
                }catch(PDOException $e){
                    echo $e->getMessage() ;
                    return false;
                }    
        }

    }
?>