<?php
session_start();
if(isset($_POST['submit'])){

    include 'dbconnect.php';

    $userName = mysqli_real_escape_string($conn, $_POST['userName']);
    $pass = mysqli_real_escape_string($conn ,$_POST['pass']);

    if(empty($userName) || empty($pass)){
        header("Location: ../index.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE userName = '$userName' OR userEmail ='$userName'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck < 1){
            header("Location: ../index.php?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                $hashedPassCheck = password_verify($pass, $row['pass']);
                if($hashedPassCheck == false){
                    header("Location: ../index.php?login=error");
                    exit();
                }elseif($hashedPassCheck == true) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['firstName'] = $row['firstName'];
                    $_SESSION['lastName'] = $row['lastName'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['userName'] = $row['userName'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
            }
        }
    }
}else {
    header("Location: ../index.php?login=error");
    exit();
}