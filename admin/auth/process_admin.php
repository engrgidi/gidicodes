<?php
include_once('db_connect.php');
session_start();

$admin_name = $admin_email = $password  = $category = $error = $type = $msg = $image = "";
$emailErr  = $passwordErr = $failed = "";



if (isset($_POST['login_admin'])) {
    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
    }
    if (empty($_POST['password'])) {
        $passwordErr = "Password is required";
    }

    if ($emailErr == "" && $passwordErr == "") {
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $pass = md5($password);
        // $pass = password_hash("$password", PASSWORD_BCRYPT);

        $sql = "SELECT * FROM admin WHERE admin_email = '$email' AND password = '$pass'";
        $result = $conn->query($sql);

        $count = $result->num_rows;
        if ($count == 1) {
            $row = $result->fetch_array();
            $_SESSION['admin'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            header('location: ../admin/index.php');
        } else {
            $error ="<div class='alert alert-danger'>Invalid Email/Password</div>";
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
