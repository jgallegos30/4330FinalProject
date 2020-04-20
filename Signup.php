<?php
/*Set up a database connection*/
require_once "connect.php";
/*Ensures signup button was pressed*/
if(isset($_POST['signupbtn'])) {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    /*Convert all information in the form in Signup.html to variables*/
    $email = $_POST['email'];
    $first_name = $_POST['fName'];
    $last_name = $_POST['lName'];
    $password = $_POST['userPass'];
    $confirm_password = $_POST['cnfrmPass'];

    /*Checks if any fields are left empty*/
    if(empty($email) || empty($first_name) || empty($last_name) || empty($password) || empty($confirm_password)) {
        header("Location: ../signup.html?error=EmptyFields&fName=".$first_name."&lName=".$last_name."&email=".$email);
        exit();
    }
    /*Checks if email is valid using filter method FILTER_VALIDATE_EMAIL*/
    else if(!filter_val($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.html?error=InvalidEmail");
        exit();
    }
    /*Checks if password and repeated password match*/
    else if($password !== $confirm_password) {
        header("Location: ../signup.html?error=EmptyFields&email=".$email."&fName=".$first_name."&lName=".$last_name);
        exit();
    }
    else {
        $sql = "SELECT username FROM Applicantw WHERE username=? AND password=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.html?error=sqlerr");
            exit();
        }
        else {
            /*Checks if there is already a person registered with the given information*/
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_num_rows($stmt);
            if($result > 0) {
                header("Location: ../signup.html?error=usernametaken&email=".$email."&fName=".$first_name."&lName=".$last_name);
                exit();
            }
            else {
                /*Saves the combination if not already taken*/
                $sql = "INSERT INTO Applicants (email, password, name, last_name) VALUES (?, ?, ?, ?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.html?error=sqlerr");
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt,"ssss", $email, $password, $first_name, $last_name);
                    mysqli_stmt_execute($stmt);
                    header("Locaton: ../Signup.html?signupsuccesfull=true");
                    exit();
                }
            }
        }

    }
    /*Closes sql connections and operations to save operation power of the system*/
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../Signup.html");
    exit();
}
?>