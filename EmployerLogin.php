<?php
/*Set up a database connection*/
require_once "connect.php";
session_unset();
session_destroy();

if(isset($_POST['admnlogin'])) {
    /*Create connection object*/


    /*Creates variables for the values input in the form in Login.html*/
    $username = $_REQUEST['user_id'];
    $password = $_REQUEST['user_pass'];

    /*Checks if either field is empty*/
    if(empty($username) || empty($password)){
        header("Location: /EmployerLogin.html?error=EmptyFields");
        exit();
    }
    else{
        /*Checks if $username exists either as an ID Number or Email*/
        $result_count = mysqli_query($link,"SELECT COUNT(*) As total FROM `Search Committee` WHERE sc_email='$username' AND sc_password='$password'");
        $total = mysqli_fetch_array($result_count);
        $total = $total['total'];
        if($total==0){
                header("Location: /EmployerLogin.html?error=InvalidUserNameOrPassword");
                exit();
        }
        else{
                /*Starts session and creates session variables for the user to use while logged into the website*/
                session_start();
                $_SESSION["ID_Number"]=$username;
                header("Location: /employerWelcome.php");
            }
        }
    }

else{
    header("Location: /EmployerLogin.html");
    exit();
}
?>