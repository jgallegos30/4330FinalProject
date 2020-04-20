<!DOCTYPE html>

<?php
    require_once 'connect.php';
    
    $id = $_GET['id'];
    
    $sql = "DELETE FROM `Job Opening` WHERE opening_id='";
    $sql .= $id . "'";
    
    if(mysqli_query($link, $sql)){
        print("Successfully deleted");
        echo "<script>location.href='jobManagement.php'</script>";
    }
    else{
        print("Failed");
        print(mysqli_error($link));
        echo "<script>location.href='failedToDelete.php?error=" . mysqli_error($link) . "'</script>";
    }
?>