<?php
/*Set up a database connection*/
require_once "connect.php";
session_unset();
session_destroy();

if(isset($_POST['login'])) {
    /*Create connection object*/


    /*Creates variables for the values input in the form in Login.html*/
    $username = $_REQUEST['user_id'];
    $password = $_REQUEST['user_num'];

    /*Checks if either field is empty*/
    if(empty($username) || empty($password)){
        header("Location: /index.html?error=EmptyFields");
        exit();
    }
    else{
        /*Checks if $username exists either as an ID Number or Email*/
        $result_count = mysqli_query($link,"SELECT COUNT(*) As total FROM `Applicants` WHERE email='$username' AND password='$password'");
        $total = mysqli_fetch_array($result_count);
        $total = $total['total'];
        if($total==0){
            $result_count = mysqli_query($link,"SELECT COUNT(*) As total FROM `Employee` WHERE emp_email='$username' AND emp_password='$password'");
            $total = mysqli_fetch_array($result_count);
            $total = $total['total'];
            if($total==0){
                header("Location: /index.html?error=InvalidUserNameOrPassword");
                exit();
            }
            else{
                /*Starts session and creates session variables for the user to use while logged into the website*/
                session_start();
                $_SESSION["ID_Number"]=$username;
                header("Location: /applicantWelcome.php");
                }
        }
        else{
            /*Starts session and creates session variables for the user to use while logged into the website*/
            session_start();
            $_SESSION["ID_Number"]=$username;
            header("Location: /applicantWelcome.php");
            }
            
        }
    }

else{
    header("Location: /index.html");
    exit();
}
?>