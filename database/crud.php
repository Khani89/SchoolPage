<?php
    class crud{
        private $db;

        function __construct($conn){  
            $this->db = $conn;
        }
    
    
        public function insertstudent($fname, $lname, $age, $gender, $dob, $studentgrade, $parentsemail, $parentscontact){

            try{
                $sql = "INSERT INTO registration (firstname, lastname, age, gender, dateofbirth, 
                studentgrade_id, parentsemailaddress, parentscontactnumber) 
                VALUES(:fname,:lname,:age,:gender,:dob,:studentgrade,:parentsemail,:parentscontact) ";
                $stmt = $this->db->prepare($sql);
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

                }  catch(PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }        


            }

            public function getStudent(){
                 $sql = "SELECT * FROM `registration`a inner join studentsgrade s on a.studentgrade_id = s.studentgrade_id ";
                 $result = $this->db->query($sql);
                 return $result;
     
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
                    $sql = "select * from registration a inner join studentsgrade s on a.studentgrade_id =s.studentgrade_id
                    where register_id = :id";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':id', $id);
                    $stmt->execute();
                    $result = $stmt->fetch();
                    return $result;
                }
    
            
    
    }


?>


    