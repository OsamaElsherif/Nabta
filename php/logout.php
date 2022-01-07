<?php
session_start();
$_SESSION['LOGIN'] = FALSE;
$_SESSION['USER'] = 'guest';
session_destroy();
header('Location: ../LOG_IN.php');
?>
