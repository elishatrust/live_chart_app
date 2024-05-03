
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
            <div class="field input">
                <label for="">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" placeholder="Enter email address" required>
            </div>
            <div class="field input">
                <label for="">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" id="password" placeholder="Enter password" required>
                <i class="fas fa-eye"></i>
            </div>
            <div class="field button">
                <input type="submit" name="submit" id="submit" value="Continue to Chat">
            </div>
        </form>

        <div class="link">
            <p>Don't have an account? <a href="index.php">Create account</a></p>
        </div>
    </section>
</div>    
    

<script src="js/pass-show-hide.js"></script>
<script src="js/login.js"></script>
</body>
</html>