<?php
    require_once 'connect.php';
    
    $name = $_REQUEST['name'];
    $last_name = $_REQUEST['last_name'];
    $resume = $_REQUEST['resume'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $status = $_REQUEST['status'];
    $photo = $_REQUEST['photo'];
    $skills = $_REQUEST['skills'];
    
    $sql = "INSERT INTO `Company` (`name`, `company_name`, `company_description`, `company_address`, `association_id`) VALUES ";
    $sql .= "(NULL, '" . $name . "', ";
    $sql .= "'" . $description . "', ";
    $sql .= "'" . $address . "', ";
    $sql .= "'" . $association . "')";
    
    //print $sql
    if(mysqli_query($link, $sql)){
        print("Stored");
        print($sql);
    }
    else{
        print("Failed");
        print($sql);
    }
    
    echo "<script>location.href='companyManagement.php'</script>";
?>