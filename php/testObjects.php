<?php
include ('API.php');
include ('objects.php');

$req = new Request();
$apilink = "$link/select/*/User";
$create = $req->Create($apilink);
if ($create[0]) {
    $json_data = $create[1];
    $json_data = json_decode($json_data, true);
    $args = aMake('user_id', 'E_mail', 'User_Name', 'department_id');
    $table = new Table($args, $json_data);
    $headers = amake('id', 'email', 'الإسم', 'القسم');
    $create_table = $table->CreateTable(10, $headers, $json_data);
    print($create_table);
} else {
    die ("ERR, $create[1]");
}
?>
