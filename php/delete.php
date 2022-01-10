<?php
include ('API.php');
$table = $_GET['table'];
if (isset($_POST['delete'])) {
    $req = new Request();
    $id = $_POST['id'];
    $apilink = "$link/delete/$table/where/ID/=/$id";
    $req->Create($apilink);
    if ($table == 'Patient') {
        header('Location: ../المرضى.php');
    } elseif ($table == 'Employee') {
        header('Location: ../الموظفين.php');
    } elseif ($table == 'supplies') {
        header('Location: ../الأدوات.php');
    }
}
?>