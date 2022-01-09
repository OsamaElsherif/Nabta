<?php
include('sessions.php');
if ($user_type == 'patient') {
    header('Location: /nabta/Nabta/واجهة مريض.php');
} else {
    session_start();
    $_SESSION['ROUTES'] = '
    {
        "Patient" : {
            "route" : "/nabta/Nabta/المرضى.php",
            "name" : "المرضى"
        },
        "employee" : {
            "route" : "/nabta/Nabta/الموظفين.php",
            "name" : "الموظفيين"
        },
        "spicialest": {
            "route" : "/nabta/Nabta/الأخصائيين.php",
            "name" : "الأخصائيين"
        },
        "supplies": {
            "route" : "/nabta/Nabta/الأدوات.php",
            "name" : "الأدوات"
        }
    }
    ';
    header('Location: /nabta/Nabta/dashboard.php');
}
?>
