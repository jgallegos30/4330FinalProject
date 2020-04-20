<?php
    require_once 'connect.php';
    
    $description = $_REQUEST['description'];
    $salary = $_REQUEST['salary'];
    $date = $_REQUEST['date'];
    if($date <= date("Y-m-d")){
        $status = "Closed";
    }
    else{
        $status = "Open";
    }
    $company = $_REQUEST['comp_id'];
    
    $sql = "INSERT INTO `Job Opening` (`opening_id`, `description`, `date`, `status`, `salary`, `comp_id`) VALUES ";
    $sql .= "(NULL, '" . $description . "', ";
    $sql .= "'" . $date . "', ";
    $sql .= "'" . $status . "', ";
    $sql .= "'" . $salary . "', ";
    $sql .= "'" . $company . "')";
    
    //print $sql
    if(mysqli_query($link, $sql)){
        print("Stored");
        print($sql);
    }
    else{
        print("Failed");
        print($sql);
    }
    
    echo "<script>location.href='jobManagement.php'</script>";
?>