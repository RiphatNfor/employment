<?php

require_once "./functions.php";
require_once "./db.php";

$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$password = $_POST['password1'];
$password_repeat = $_POST['password2'];
$address = $_POST['address'];
$username = $_POST['username'];
$email = $_POST['email'];
$role = $_POST['role'];
$pob = $_POST['pob'];
$dob = $_POST['dob'];
// $department_id = $_POST['selected_department'];
$department_id = 1;
$is_admin = False;
$phone = '234242353';


if(emptyInputRegister($first_name, $last_name, $password, $password_repeat, $address, $username, $email, $role, $pob, $dob, $department_id)) {
    // header("location: ../pages/registration.html?error=emptyinput");
    // exit();
    echo 'first name<br> ';
    echo $first_name;  
    echo '<br>lastname';
    echo $last_name;
    echo '<br>password';
    echo $password; 
    echo '<br>passs2';
    echo $password_repeat;
    echo '<br>address';
    echo $address;
    echo '<br>username';
    echo $username;
    echo '<br>email';
    echo $email; 
    echo '<br>role';
    echo $role; 
    echo '<br>pob';
    echo $pob; 
    echo '<br>dob';
    echo $dob; 
    echo '<br>dep';
    echo $department_id;
}else {
    if(checkPasswordMatch($password, $password_repeat) === True) {
        $result = createUser($conn, $first_name, $last_name, $username, $phone, $email, $role, $address, $pob, $dob, $password, $is_admin, $department_id);

        header("location: ../pages/employee-page.php");
    }else {
        header("Location: ../pages/registration.html?error=passwordmismatch");
    }

    
}