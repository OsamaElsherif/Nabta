<?php
session_start();
$user = $_SESSION['USER'];
$login = $_SESSION['LOGIN'];
$routes = $_SESSION['ROUTES'];
if (!$login) {
    header('Location: /nabta/Nabta/index.html');
}
$user_json = json_encode($user, true);
$user_json = json_decode($user_json, true);
$user_type = $user_json["user_type"][0];
$_SESSION['type'] = $user_type;
// die($user_type);
// print_r($user_json);
?>