<?php
include('sessions.php');
if ($user_type == 'Patient') {
    header('Location: /nabta/Nabta/واجهة مريض.php');
}
?>