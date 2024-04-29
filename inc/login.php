<?php

session_start();

include_once "config.php";

$email = mysqli_real_escape_string($connect, $_POST['email']);
$password = mysqli_real_escape_string($connect, $_POST['password']);

if(!empty($email) && !empty($password))
{
    $sql = mysqli_query($connect, "SELECT * FROM users WHERE email = '{$email}' ");
    if(mysqli_num_rows($sql) > 0)
    {
        $row = mysqli_fetch_assoc($sql);
        $user_pwd = md5($password);
        $encrypted_pwd = $row['password'];

        if($user_pwd === $encrypted_pwd)
        {
            $status = "Online";
            $sql2 = mysqli_query($connect, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if($sql2)
            {
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "success";
            }else{
                echo "incorrect email or password";
            }
        }else{
            echo "incorrect email or password";
        }
    }else{        
        echo $email." - This email already exist!";
    }

}else{
    echo "All input fields are required";
}