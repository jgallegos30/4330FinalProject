<!DOCTYPE html>

<?php
    require_once 'connect.php';
    
    $id = $_GET['id'];
    
    $sql = "DELETE FROM Association WHERE association_id='";
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