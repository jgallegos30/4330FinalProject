<?php
require "connect.php";

if(isset($_POST['user_id']) and isset($_POST[user_pass])){

    $username = $_REQUEST['user_id'];
    $password = $_REQUEST['user_pass'];

    $query = "SELECT * FROM Applicants WHERE Username='$username' and Password='$password'";

    $result = mysqli_query($list, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    if ($count == 1){

        //echo "Login Credentials verified";
        echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";

    }else{
        echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
        //echo "Invalid Login Credentials";
    }
}
?>