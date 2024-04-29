<?php 

session_start();

include_once "inc/config.php"; 

if(!isset($_SESSION['unique_id']))
{
    header("location:login.php");
}
include_once "header.php" 

?>

<div class="wrapper">
    <section class="users">
        <header>
            <div class="content">
            <?php 
                $sql = mysqli_query($connect, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0)
                {
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>
                <img src="inc/images/<?= $row['image']; ?>" alt="img">
                <div class="details">
                    <span><?= $row['fname']." ".$row['lname']; ?></span>
                    <p><?= $row['status']; ?></p>
                </div>
            </div>
            <a href="inc/logout.php?logout_id=<?= $row['unique_id']; ?>" class="logout">Logout</a>
        </header>
        <div class="search">
            <span class="text">Select user and start chat</span>
            <input type="text" placeholder="Search name..">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list"></div>
    </section>
</div>


<script src="js/users.js"></script>
</body>
</html>