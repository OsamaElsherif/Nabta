<?php
include('php/sessions.php');
include('php/accessdenied.php');
include('php/API.php');
include('php/objects.php');
?>
<!DOCTYPE html>
<html lang="rlt">
    <head>
     <meta charset="utf-8"/>
     <meta http-equiv="X-UA-Compatible" content="device-width"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>المرضى </title>
     <link rel="stylesheet" href="tempstyle.css">
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
                    $create_navbar = $navbar->CreateNavbar('Patient');
                    print($create_navbar);
                 ?>
                 <div class="out">
                 <i class="material-icons"><a href="dashboard.php">home</a></i>
                    <a href="php/logout.php"> 
                    <button class="outnavbut"> خروج</button> </a>
                </div>

            </div>
            <div class="content">
                <span class="tableName">عرض سجل المرضى</span>
                <div class="table">
                    <!-- <table dir="rtl"> -->
                        <?php
                        $req = new Request();
                        $apilink = "$link/select/*/Patient/";
                        $create = $req->Create($apilink);
                        $rows = count(json_decode($create[1], true)['ID']);
                        if ($create[0]) {
                            $json_data = $create[1];
                            $json_data = json_decode($json_data, true);
                            $args = aMake('ID', 'fullname', 'nid', 'gender', 'patient_birthdate', 'phonenumber', 'address', 'department_name', 'delete');
                            $table = new Table($args, $json_data);
                            $headers = aMake('id',"الاسم", "الرقم القومي", "النوع", "تاريخ الميلاد", "رقم المحمول", "العنوان", "القسم", "الحذف");
                            $create_table = $table->CreateTable($rows, $headers, 'Patient');
                            print($create_table);
                        } else {
                            die ("ERR, $create[1]");
                        }
                        ?>
                        <!-- <thead>
                            <tr>
                                <td class="id">id</td>
                                <td> الاسم</td>
                                <td> الرقم القومي</td>
                                <td> النوع</td>
                                <td> تاريخ الميلاد</td>
                                <td> رقم المحمول</td>
                                <td> العنوان</td>
                                <td> القسم</td>
                                <td> الأداة</td>
                            </tr>
                            </thead>
                            <tbody>
                            
                                // $request = new Request();
                                // $api_link = "$link/select/*/Patient/";
                                // $create = $request->Create($api_link);
                                // if (!$create[0]) {
                                //     die("ERR in API Request");
                                // }
                                // $users = json_decode($create[1], true);
                                // $patients = count($users['patient_id']);
                                // for ($i=0; $i < $patients; $i++) { 
                                //     echo "<tr>";
                                //     echo "<td class='id'>";
                                //     echo $users['patient_id'][$i];
                                //     echo "</td>";
                                //     echo "<td>";
                                //     echo $users['fullname'][$i];
                                //     echo "</td>";
                                //     echo "<td>";
                                //     echo $users['nid'][$i];
                                //     echo "</td>";
                                //     echo "<td>";
                                //     if ( $users['gender'][$i] == 1) {
                                //         echo "أنثى";
                                //     } else {
                                //         echo "ذكر";
                                //     }
                                //     echo "</td>";
                                //     echo "<td>";
                                //     echo $users['patient_birthdate'][$i];
                                //     echo "</td>";
                                //     echo "<td>";
                                //     echo $users['phonenumber'][$i];
                                //     echo "</td>";
                                //     echo "<td>";
                                //     echo $users['address'][$i];
                                //     echo "</td>";
                                //     echo "<td>";
                                //     if ($users['department_id'][$i]) {
                                //         echo $users['department_id'][$i];
                                //     } else {
                                //         echo "لم يتم التحويل";
                                //     }
                                //     echo "</td>";
                                //     echo "<td> الأداة</td>";
                                //     echo "</tr>";
                                // }
                                // foreach ($users as $key => $value) {
                                //     print($key);
                                //     print_r($value);
                                // }
                                // die($user);
                            
                            <tr>
                                <td class="id"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="id"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="id"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="id"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="id"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="id"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="id"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            
                        </tbody>
                    </table> -->
                </div>
                <div class="button btn" dir="rtl">
                       <a href="تعديل بيانات مريض.php">
                        <button class="edietDe"> تعديل بيانات</button> 
                    </a>
                    <a href="أختر قسم المرضى.html">
                        <button class="showDe"> عرض حسب القسم </button> 
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
