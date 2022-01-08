<?php
include('sessions.php');  
include('API.php');  
if(isset($_POST['signup'])) {
    // variables from the form
    $PName = $_POST['PName'];
    $NID = $_POST['NID'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $address = $_POST['address'];
    $mobnum = $_POST['mobnum'];
    $desc = $_POST['desc'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $gender = $_POST['gender'];

    if ($password != $confirm_password) {
        die("Passwords doesn't match");
    }
    
    // insert user
    $api_link = "$link/insert/User/values/NULL,'$email','$PName','$password','patient'";
    $request = new Request();
    $create = $request->Create($api_link);
    // print($create);
    if (!$create[0]) {
        die("ERR in API aa Request");
    }
    // select user id
    $api_link = "$link/select/*/User/where/E_mail/=/$email";
    $create = $request->Create($api_link);
    if (!$create[0]) {
        die("ERR in API Request");
    }
    $user = json_decode($create[1], true);
    $user_id = $user['ID'][0];
    // insert a patient
    $api_link = "$link/insert/Patient/values/'$NID','$PName','$mobnum','$address','$date',NULL,'$email', $user_id, $gender";
    $create = $request->Create($api_link);
    if (!$create[0]) {
        die("ERR in API Request");
    }

    $_SESSION['USER'] = $user;
    $_SESSION['LOGIN'] = TRUE;
    header('Location: ../واجهة مريض.php');
}
?>
