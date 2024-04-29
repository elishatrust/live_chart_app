<?php

session_start();

include_once "config.php";

$fname = mysqli_real_escape_string($connect, $_POST['fname']);
$lname = mysqli_real_escape_string($connect, $_POST['lname']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$password = mysqli_real_escape_string($connect, $_POST['password']);

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password))
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $sql = mysqli_query($connect, "SELECT * FROM users WHERE email = '{$email}' ");
        if(mysqli_num_rows($sql) > 0)
        {
            echo $email." - This email already exist!";
        }
        else{
            if(isset($_FILES['image']))
            {
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $img_explode = explode('.',$img_name);
                $img_ext = end($img_explode);
                $extensions = ["jpg", "png", "jpeg"];

                if(in_array($img_ext, $extensions) === true)
                {
                    $type = ["image/jpeg", "image/jpg", "image/png"];  
                    if(in_array($img_type, $type) === true)
                    {
                        $time = time();
                        $new_img_name = $time.$img_name;

                        if(move_uploaded_file($tmp_name, "images/".$new_img_name))
                        {
                            $rand_id = rand(time(), 10000);
                            $status = "Online";
                            $encrypt_pwd = md5($password);

                            $insert_data = mysqli_query($connect, "INSERT INTO users (unique_id,fname,lname,email,password,image,status) VALUE ({$rand_id}, '{$fname}', '{$lname}', '{$email}', '{$encrypt_pwd}', '{$new_img_name}', '{$status}')");
                            if($insert_data)
                            {
                                $select_sql2 = mysqli_query($connect, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($select_sql2) > 0)
                                {
                                    $result = mysqli_fetch_assoc($select_sql2);
                                    $_SESSION['unique_id'] = $result['unique_id'];
                                    echo "success";

                                }else{
                                    echo "This email address not exist!";
                                }
                            }

                        }else{
                            echo "Something went wrong. Please try again!";
                        }
                    }
                }
                else{
                    echo "Please upload an image file (jpeg, jpg, png)";
                }
            }
        }
    }
    else{
        echo $email." is not a valid email!";
    }
}
else{
    echo "All input fields are required";
}