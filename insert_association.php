<?php
    require_once 'connect.php';
    
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];
    $address = $_REQUEST['address'];
    
    $sql = "INSERT INTO `Association` (`association_id`, `name`, `description`, `address`) VALUES ";
    $sql .= "(NULL, '" . $name . "', ";
    $sql .= "'" . $description . "', ";
    $sql .= "'" . $address . "')";
    
    //print $sql
    if(mysqli_query($link, $sql)){
        print("Stored");
        print($sql);
    }
    else{
        print("Failed");
        print($sql);
    }
    
    echo "<script>location.href='associationManagement.php'</script>";
?>