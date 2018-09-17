<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type-"text/css" href="style.css">
</head>
<body>
<header>
    <nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">HOME</a></li>
            </ul>
            <div class="nav-login">
                <?php
                    if(isset($_SESSION['id'])){
                       echo "<form action='includes/logout.php' method='POST'>
                        <label>Hi,".$_SESSION['firstName']." ".$_SESSION['lastName']."</label>
                        <button type='submit' name'submit'>LOGOUT</button>
                        </form>";
                    } else {
                        echo "<form action='includes/login.php' method='POST'>
                        <input type='text' name='userName' placeholder='Username/Email'>
                        <input type='password' name='pass' placeholder='Password'>
                        <button type='submi' name='submit'>LOGIN</button>
                        </form>
                        <a href='signup.php'>SIGN UP</a>";
                    }
                ?>
                
                
            </div>
        </div>
    </nav>
</header>