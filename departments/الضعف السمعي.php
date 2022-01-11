<?php
include('../php/sessions.php');
include('../php/accessdenied.php');
include('../php/API.php');
include('../php/objects.php');
$type = $_GET['type'];
$did = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="rlt">
    <head>
     <meta charset="utf-8"/>
     <meta http-equiv="X-UA-Compatible" content="device-width"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>أخصائيين قسم التوحد </title>
     <link rel="stylesheet" href="../tempstyle.css">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body>
        <div class="container">
            <div class="navbar" dir="rtl">
                <div class="logo">
                    <img src="logo2.png" alt="logo"  class="nabta">
                 </div>
                 <?php
                    $routes = json_decode($routes, true);
                    $navbar = new Navbar($routes);
                    $create_navbar = $navbar->CreateNavbar("$type");
                    print($create_navbar);
                 ?>
                 <div class="out">
                    <i class="material-icons"><a href="../HOME_PAGE1.html">home</a></i>
                    <a href="../php/logout.php"> 
                    <button class="outnavbut"> خروج</button> </a>
                </div>

            </div>
            <div class="content">
                <span class="tableName">قسم الضعف السمعي</span>
                <div class="table">
                <?php
                        $req = new Request();
                        if ($type == 'spicialest') {
                            $apilink = "$link/select/*/employee/where/department_id/=/$did/and/specialty/!=/none";
                        } elseif ($type == 'employee') {
                            $apilink = "$link/select/*/$type/where/department_id/=/$did/and/specialty/=/none";
                        } else {
                            $apilink = "$link/select/*/$type/where/department_id/=/$did";
                        }
                        $create = $req->Create($apilink);
                        $rows = count(json_decode($create[1], true)['ID']);
                        if ($create[0]) {
                            $json_data = $create[1];
                            $json_data = json_decode($json_data, true);
                            // print_r($json_data);
                            if ($type == 'Patient') {
                                $args = aMake('ID', 'fullname', 'nid', 'gender', 'patient_birthdate', 'phonenumber', 'address', 'delete');
                                $table = new Table($args, $json_data);
                                $headers = aMake('id',"الاسم", "الرقم القومي", "النوع", "تاريخ الميلاد", "رقم المحمول", "العنوان", "الحذف");
                                $create_table = $table->CreateTable($rows, $headers, 'Patient');
                                print($create_table);
                            } elseif ($type == 'supplies') {
                                $args = aMake('ID', 'name', 'price', 'quantity', 'delete');
                                $table = new Table($args, $json_data);
                                $headers = aMake('id', "الاسم", "السعر", "الكمية", "الحذف");
                                $create_table = $table->CreateTable($rows, $headers, 'supplies');
                                print($create_table);
                            } else {
                                $args = aMake('ID', 'Name', 'gender', 'employee_birthdate', 'phone_number', 'Address', 'delete');
                                $table = new Table($args, $json_data);
                                $headers = aMake('id',"الاسم", "النوع", "تاريخ الميلاد", "رقم المحمول", "العنوان", "الحذف");
                                $create_table = $table->CreateTable($rows, $headers, 'Employee');
                                print($create_table);
                            }
                        } else {
                            die ("ERR, $create[1]");
                        }
                    ?>
                </div>
                <div class="buttonPage btn" dir="rtl">
                    <a href="التوحد.php?type=<?php echo $type;?>&id=1">
                        <button title="التوحد" class="page"> 1 </button>
                    </a>
                    <a href="بطء التعلم.php?type=<?php echo $type;?>&id=2">
                        <button  title="بطء التعلم" class="page"> 2</button>
                    </a>
                    <a href="التأخر الذهني.php?type=<?php echo $type;?>&id=3">
                        <button title="التأخر الذهني" class="page" >3 </button>
                    </a>
                    <a href="صعوبات التعلم.php?type=<?php echo $type;?>&id=4">
                        <button title="صعوبات التعلم" class="page" >4 </button>
                    </a>
                    <a href="التأخر الدراسي.php?type=<?php echo $type;?>&id=13">
                        <button title="التأخر الدراسي" class="page" > 5</button>
                    </a>
                    <a href="الشلل الدماغي.php?type=<?php echo $type;?>&id=7">
                        <button title="الشلل الدماغي" class="page" >6 </button>
                    </a>
                    <a href="الضعف السمعي.php?type=<?php echo $type;?>&id=8">
                        <button title="الضعف السمعي" id='seven' class="page" > 7</button>
                    </a>
                    <a href="المتلازمات.php?type=<?php echo $type;?>&id=9">
                        <button title="المتلازمات" class="page" > 8</button>
                    </a>
                    <a href="امراض التكلم.php?type=<?php echo $type;?>&id=10">
                        <button title="أمراض الكلام" class="page" >9 </button>
                    </a>
                    <a href="امراض اللغة.php?type=<?php echo $type;?>&id=11">
                        <button  title="أمراض اللغة" class="page" > 10</button>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>