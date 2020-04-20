<?php
/*Set up a database connection*/
require_once "connect.php";
/*Ensures signup button was pressed*/
if(isset($_POST['signupbtn'])) {
    
    /*Convert all information in the form in Signup.html to variables*/
    $name = $_REQUEST['name'];
    $last_name = $_REQUEST['last_name'];
    $resume = $_REQUEST['resume'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $confirm_password = $_REQUEST['cnfrmPass'];
    /*Checks if any fields are left empty*/
    if(empty($name) || empty($last_name) || empty($resume) || empty($email) || empty($password) || empty($confirm_password)) {
        header("Location: ../signup.html?error=EmptyFields&fName=".$name."&lName=".$last_name."&resume=".$resume);
        exit();
    }
    /*Checks if password and repeated password match*/
    else if($password !== $confirm_password) {
        header("Location: ../signup.html?error=EmptyFields&email=".$email."&fName=".$first_name."&lName=".$last_name);
        exit();
    }
    else {
        $result_count = mysqli_query($link,"SELECT COUNT(*) As total FROM `Applicants` WHERE email='$email'");
            $total = mysqli_fetch_array($result_count);
            $total = $total['total'];
            if($total > 0) {
                header("Location: ../signup.html?error=usernametaken&email=".$email."&fName=".$first_name."&lName=".$last_name);
                exit();
            }
            else {
                $sql = "INSERT INTO `Applicants` (`applicants_id`, `name`, `last_name`, `resume`, `email`, `password`) VALUES ";
                $sql .= "(NULL, '" . $name . "', ";
                $sql .= "'" . $last_name . "', ";
                $sql .= "'" . $resume . "', ";
                $sql .= "'" . $email . "', ";
                $sql .= "'" . $password . "')";
                
                //print $sql
                if(mysqli_query($link, $sql)){
                    print("Stored");
                    print($sql);
                }
                else{
                    print("Failed");
                    print($sql);
                }
                header("Location: ../index.html?sql=".$sql);
                
            }
    }
}
else {
    header("Location: ../Signup.html");
    exit();
}
?>