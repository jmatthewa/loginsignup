<?php
    include_once 'header.php';
?>

<section class="main-container">
    <div class="main-wrapper">
        <h2>SIGNUP</h2>
        <form class="signup-form" action="includes/signup.php" method="POST">
            <input type="text" name="firstName" placeholder="First Name"></br>
            <input type="text" name="lastName" placeholder="Last Name"></br>
            <input type="text" name="email" placeholder="E-mail"></br>
            <input type="text" name="userName" placeholder="Username"></br>
            <input type="password" name="pass" placeholder="Password"></br>
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </div>
</section>

<?php
    include_once 'footer.php';
?>
