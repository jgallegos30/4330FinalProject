<?php
    require_once 'connect.php';
    
    $name = $_REQUEST['company_name'];
    $description = $_REQUEST['company_description'];
    $address = $_REQUEST['company_address'];
    $association = $_REQUEST['association_id'];
    
    $sql = "INSERT INTO `Company` (`company_id`, `company_name`, `company_description`, `company_address`, `association_id`) VALUES ";
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