<?php
include('API.php');  
if ($_SESSION['LOGIN']) {
    header('Location: dashboard.php');
}
if(isset($_POST['login'])) {
    // variables from the form
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // select user id
    $request = new Request();
    $api_link = "$link/select/*/User/where/E_mail/=/$email";
    $create = $request->Create($api_link);
    if (!$create[0]) {
        die("ERR in API Request");
    }
    $user = json_decode($create[1], true);
    if (count($user['E_mail']) == 0) {
        die("Email isn't exist");
    }
    $user_password = $user['password'][0];
    if($password != $user_password) {
        die("password is wrong");
    }
    session_start();
    $_SESSION['USER'] = $user;
    $_SESSION['LOGIN'] = TRUE;
    header('Location: ../php/check.php');
}
?>
