<?php
    class crud{
        private $db;

        function __construct($conn){  
            $this->db = $conn;
        }
    
    
        public function insertstudent($fname, $lname, $age, $gender, $dob, $studentgrade, $parentsemail, $parentscontact,$avatar_path){

            try{
                $sql = "INSERT INTO registration (firstname, lastname, age, gender, dateofbirth, 
                studentgrade_id, parentsemailaddress, parentscontactnumber,avatar_path) 
                VALUES(:fname,:lname,:age,:gender,:dob,:studentgrade,:parentsemail,:parentscontact,:avatar_path) ";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam('lname',$lname);
                $stmt->bindparam(':age',$age);
                $stmt->bindparam(':gender',$gender);
                $stmt->bindparam(':dob',$dob);                    
                $stmt->bindparam(':studentgrade',$studentgrade);
                $stmt->bindparam(':parentsemail',$parentsemail);
                $stmt->bindparam(':parentscontact',$parentscontact);
                $stmt->bindparam(':avatar_path',$avatar_path);

                $stmt->execute();
                return true;

                }  catch(PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }        


            }

            public function editStudent($id,$fname, $lname, $age, $gender, $dob, $studentgrade, $parentsemail, $parentscontact){
                try{
                    $sql = "UPDATE `registration` SET `firstname`=:fname,`lastname`=:lname,`age`=:age,`gender`=:gender,`dateofbirth`=:dob,
                    `studentgrade_id`=:studentgrade, `parentsemailaddress`=:parentsemail,`parentscontactnumber`=:parentscontact WHERE register_id =
                    :id ";
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindparam(':id',$id);
                     $stmt->bindparam(':fname',$fname);
                     $stmt->bindparam('lname',$lname);
                     $stmt->bindparam(':age',$age);
                     $stmt->bindparam(':gender',$gender);
                     $stmt->bindparam(':dob',$dob);
                     $stmt->bindparam(':studentgrade',$studentgrade);
                     $stmt->bindparam(':parentsemail',$parentsemail);
                     $stmt->bindparam(':parentscontact',$parentscontact);
                     
                     $stmt->execute();
                     return true;
    
                }catch(PDOException $e) {
                    echo $e->getMessage();
                    return false;
    
                }
            }    

            public function getStudent(){
                try{
                    $sql = "SELECT * FROM `registration`a inner join studentsgrade s on a.studentgrade_id = s.studentgrade_id ";
                    $result = $this->db->query($sql);
                    return $result;
                }catch(PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
     
            }

             public function getStudentsgrade(){
                try{
                    $sql = "SELECT * FROM `studentsgrade`;";
                    $result = $this->db->query($sql);
                    return $result;
                }catch(PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }

             public function getStudentDetails($id){
                 try{
                    $sql = "select * from registration a inner join studentsgrade s on a.studentgrade_id =s.studentgrade_id
                    where register_id = :id";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':id', $id);
                    $stmt->execute();
                    $result = $stmt->fetch();
                    return $result;
                 }catch(PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
                   
            }

            public function deleteStudent($id){
                try{
                      $sql = "Delete from registration where register_id = :id";
                      $stmt = $this->db->prepare($sql);
                      $stmt->bindparam(':id', $id);
                      $stmt->execute();
                      return true;
                }catch (PDOException $e) {
                     echo $e->getMessage();
                     return false;
                }
     
            }

            public function getStudentById($id){
                try{
                    $sql = "SELECT * FROM `studentsgrade` where studentgrade_id = :id";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(":id", $id);
                    $stmt->execute();
                    $result = $stmt->fetch();
                    return $result;
                }catch(PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }
            
            
    }


?>


    