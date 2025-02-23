
<?php

session_start();

if(isset($_SESSION['unique_id']))
{
    header("location: users.php");
}

include_once "header.php" 

?>

<div class="wrapper">
    <section class="form signup">
        <header>Realtime Chat App</header>
        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="name-details">
                <div class="field input">
                    <label for="">First name <span class="text-danger">*</span></label>
                    <input type="text" name="fname" id="fname" placeholder="Enter first name">
                </div>
                <div class="field input">
                    <label for="">Last name <span class="text-danger">*</span></label>
                    <input type="text" name="lname" id="lname" placeholder="Enter last name">
                </div>
            </div>
            <div class="field input">
                <label for="">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" placeholder="Enter email address">
            </div>
            <div class="field input">
                <label for="">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" id="password" placeholder="Enter password">
                <i class="fas fa-eye"></i>
            </div>
            <div class="field image">
                <label for="">Profile picture <span class="text-danger">*</span></label>
                <input type="file" name="image" id="image" accept="png,gif,jpeg,jpg">
            </div>
            <div class="field button">
                <input type="submit" name="submit" id="submit" value="Continue to Chat">
            </div>
        </form>

        <div class="link">
            <p>Already have an account? <a href="login.php">Login now</a></p>
        </div>
    </section>
</div>
    

<script src="js/pass-show-hide.js"></script>
<script src="js/signup.js"></script>
</body>
</html>