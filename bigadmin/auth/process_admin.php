<?php
include_once('db_connect.php');
session_start();

$usernamename = $admin_email = $password = $id = $category = $error = $type = $msg = $image = "";
$usernameErr = $emailErr = $passwordErr = $password_confirmationErr = $failed = "";

if (isset($_POST['reg_admin'])) {
    // sanitize our strings from the form
    if (empty($_POST['username'])) {
        $usernameErr = "Username is required";
    }
  
    if (empty($_POST['admin_email'])) {
        $emailErr = "Email is required";
    }
   
    if (empty($_POST['password'])) {
        $passwordErr = "Password is required";
    }
  
   

    if (empty($_POST['password_confirmation'])) {
        $password_confirmationErr = "Password is required";
    }


    if ($usernameErr == "" && $emailErr == "" && $passwordErr == "" && $password_confirmationErr == "") {
        $username = test_input($_POST['username']);
        $email = test_input($_POST['admin_email']);
       $password = test_input($_POST['password']);
        $pass = md5($password);
        // $pass = password_hash("$password", PASSWORD_BCRYPT);
        $password_confirmation = test_input($_POST['password_confirmation']);
        if ($password != $password_confirmation) {
            $passwordErr = "Password does not match";
            $password_confirmationErr = "Password does not match";
        } else {
            $sql = "SELECT * FROM admin WHERE admin_email = '$email'";
            $sql = "SELECT * FROM admin WHERE username = '$username'";
            $result = $conn->query($sql);
            $count = $result->num_rows;
            

            if ($count > 0) {
                $emailErr = "Email already exists";
                $usernameErr = "username already exists";
            

            }

           
            $sql = "INSERT INTO admin (username, admin_email, password) VALUES ('$username', '$email', '$pass')";
            $result = $conn->query($sql);
         
            if ($result === TRUE) {
                
                $msg = " <div class='alert alert-success'>👍🏻 Registration Completed, Please Login...</div> ";
               
            } else {
                die(mysqli_error($conn));
                $error = "<p class='text-danger'> Registration failed </p>";
            }
        }
    }
    
}

if (isset($_POST['login_admin'])) {
    if (empty($_POST['username'])) {
        $usernameErr = "Username is required";
    }
    if (empty($_POST['password'])) {
        $passwordErr = "Password is required";
    }

    if ($usernameErr == "" && $passwordErr == "") {
        $username = test_input($_POST['username']);
        $password = test_input($_POST['password']);
        $pass = md5($password);
        // $pass = password_hash("$password", PASSWORD_BCRYPT);

        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$pass'";
        $result = $conn->query($sql);

        $count = $result->num_rows;
        if ($count == 1) {
            $row = $result->fetch_array();
            $_SESSION['bigadmin'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            header('location: ../bigadmin/index.php');
        } else {
            $error ="<div class='alert alert-danger'>Invalid Email/Password,Try Again 🤪</div>";
        }
    }
}

if (isset($_POST['logout'])) {
    session_unset();
    header('location: ../login.php');
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function get_safe_value($conn,$str){
    if ($str!=''){
    return mysqli_real_escape_string($conn,$str);
    }
}

?>
