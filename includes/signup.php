<?php

if (isset($_POST['submit'])) {
    
    include_once 'dbconnect.php';

    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName =  mysqli_real_escape_string($conn, $_POST['lastName']);
    $email =  mysqli_real_escape_string($conn, $_POST['email']);
    $userName = mysqli_real_escape_string($conn, $_POST['userName']);
    $pass =  mysqli_real_escape_string($conn, $_POST['pass']);

    if (empty($firstName) || empty($lastName) || empty($email) || empty($userName) || empty($pass)){
        header("Location: ../signup.php?signup=empty");
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z]*$/", $firstName) || 
        !preg_match("/^[a-zA-Z]*$/", $lastName)) {
            header("Location: ../signup.php?signup=invalid");
        exit();
        }else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php?signup=email");
                exit();
            }else {
                $sql = "SELECT * FROM user WHERE userName='$userName'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck > 0){
                    header("Location: ../signup.php?signup=usertaken");
                    exit();
                }else {
                    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO user (firstName,lastName,userEmail,userName,Pass) 
                        VALUES ('$firstName','$lastName','$email','$userName','$hashedPass')";
                    mysqli_query($conn, $sql);
                    header("Location: ../signup.php?signup=success");
                    exit();

                }
            }
        }
    }

} else {
    header("Location: ../signup.php");
    exit();
}