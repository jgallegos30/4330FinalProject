<!DOCTYPE html>

<?php
    require_once 'connect.php';
    
    $id = $_GET['id'];
    $userId = $_SESSION['ID_Number'];
    


    $sql = "ALTER TABLE `JobList` WHERE $list ADD `job_id`.$id INT NOT NULL AFTER `list_id`, ADD INDEX `job_id` (`job_id`);";
    $sql .= $id . "'";
    
    if(mysqli_query($link, $sql)){
        print("Successfully deleted");
        echo "<script>location.href='associationManagement.php'</script>";
    }
    else{
        print("Failed");
        print(mysqli_error($link));
        echo "<script>location.href='failedToDeleteAssociation.php?error=" . mysqli_error($link) . "'</script>";
    }
?>