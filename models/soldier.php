<?php

require_once('utils/database.php');

class Soldier
{
    public $soldierId, $firstName, $lastName, $rank, $dob, $age, $department;
    public function __construct($soldierId, $firstName, $lastName, $rank, $dob, $age, $department)
    {
        $this->soldierId = $soldierId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->rank = $rank;
        $this->dob = $dob;
        $this->age = $age;
        $this->department = $department;
    }

    public static function get($id)
    {
        $sql = "SELECT soldierId,firstName,lastName,rank,dob,FLOOR(DATEDIFF(CURDATE(), dob) / 365) AS age,department FROM Soldier
                    WHERE soldierId = '$id'";
        $result = Database::query($sql);
        $my_row = $result->fetch_assoc();
        $a = $my_row['soldierId'];
        $b = $my_row['firstName'];
        $c = $my_row['lastName'];
        $d = $my_row['rank'];
        $f = $my_row['dob'];
        $g = $my_row['age'];
        $h = $my_row['department'];
        return new soldier($a, $b, $c, $d, $f, $g, $h);
    }

    public static function getAll()
    {
        $soldierList = [];
        $sql = "select soldier_id,first_name,last_name,rank,dob,FLOOR(DATEDIFF(CURDATE(), dob) / 365) AS age,department FROM soldier";
        $result = Database::query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $a = $my_row['soldier_id'];
            $b = $my_row['first_name'];
            $c = $my_row['last_name'];
            $d = $my_row['rank'];
            $f = $my_row['dob'];
            $g = $my_row['age'];
            $h = $my_row['department'];
            $soldierList[] = new soldier($a, $b, $c, $d, $f, $g, $h);
        }
        return $soldierList;
    }

    /*
    public static function search($key){
        require("connection_connect.php");
        $sql="select * from students inner join teachers on advisorId = teacherId
               where (studentId like '$key' or studentName like '$key')";
        $result = $conn->query($sql);
        while($my_row = $result->fetch_assoc()){
            $id = $my_row['studentId'];
            $name = $my_row['studentName'];
            $teacherId = $my_row['advisorId'];
            $teacherName = $my_row['teacherName'];
            $studentList[]=new Student($id,$name,$teacherId,$teacherName);
        }
        require("connection_close.php");
        return $studentList;
    }*/

    public static function post($soldierId, $city, $firstName, $lastName, $rank, $dob, $department)
    {
        $a = 1;
        switch ($department) {
            case "navy":
                $a = 2;
                break;
            case "air":
                $a = 3;
                break;
            case "coast":
                $a = 4;
                break;
            default:
                $a = 1;
        }
        $dep = $department;
        switch ($department) {
            case "air":
                $dep = "air force";
                break;
            case "coast":
                $dep = "coast guard";
                break;
            default:
                $dep = $department;
        }
        $b = ((int) date("Y") + 543) % 100;
        $total = $a . $b . $city . $soldierId;
        $sql = "insert into Soldier(soldierId,firstName,lastName,rank,dob,department)
            values('$total','$firstName','$lastName','$rank','$dob','$dep')";
        $result = Database::query($sql);
        return "Add soldier success $result!!!";
    }

    public static function update($soldierId, $firstName, $lastName, $rank, $dob, $department)
    {
        $dep = $department;
        switch ($department) {
            case "air":
                $dep = "air force";
                break;
            case "coast":
                $dep = "coast guard";
                break;
            default:
                $dep = $department;
        }

        $sql = "update soldierId 
                    set firstName = '$firstName', 
                    set lastName = '$lastName',
                    set rank = '$rank',
                    set dob = '$dob',
                    set department = '$dep',
                    where soldierId='$soldierId'";
        $result = Database::query($sql);
        return "update success $result row";
    }

    public static function delete($id)
    {
        $sql = "delete from Soldier WHERE soldierId = '$id'";
        $result = Database::query($sql);
        return "delete success $result row";
    }

    /*
    public static function enum($it) {
        // Ensure the connection is set properly
        require("connection_connect.php");
    
        // Prepare and execute the query

        $query = 'DESCRIBE Soldier';
        //$query = "SHOW COLUMNS FROM Soldier
        //            WHERE FIELD LIKE '$it'";
    
        $result = $conn->query($query);
        
        return $result;
        // Check if the query returned a valid result
        if ($result && $row = $result->fetch_assoc()) {
            $type = $row['Type']; // Should contain the ENUM definition
            // Use regex to extract the values from enum('value1','value2',...)
            if (preg_match("/^enum\((.*)\)$/", $type, $matches)) {
                // Explode the string into an array, removing any quotes
                $enumValues = explode(",", str_replace("'", "", $matches[1]));

            } else {
                $enumValues = []; // Fallback in case no match is found
            }
        } else {
            $enumValues = []; // Fallback in case the query fails
        }
    
        // Closing the connection
        require("connection_close.php");
    
        return $enumValues; // Return the array of enum values
    }
    public static function enum($it){
        require("connection_connect.php");
        $query = "SHOW COLUMNS FROM soldier LIKE '$it'";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $type = $row['Type']; // Output example: enum('navy','air force','coast guard')
        preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches); // Extracting values between enum('')
        $enumValues = explode("','", $matches[1]);
        require("connection_close.php");

        return $enumValues;
    }*/
}