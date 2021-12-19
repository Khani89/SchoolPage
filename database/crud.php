<?php
    class crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }
    
    
        public function insert($fname, $lname, $age, $gender, $dob, $studentgrade, $parentsemail, $parentscontact){

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

    }


?>


    