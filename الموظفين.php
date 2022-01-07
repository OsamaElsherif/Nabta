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
     <title>الموظفين </title>
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
                    $create_navbar = $navbar->CreateNavbar('employee');
                    print($create_navbar);
                 ?>
                 <div class="out">
                    <i class="material-icons"><a href="HOME_PAGE1.html">home</a></i>
                    <a href="php\logout.php"> 
                    <button class="outnavbut"> خروج</button> </a>
                </div>

            </div>
            <div class="content">
                <span class="tableName">عرض سجل الموظفين</span>
                <div class="table">
                    <?php
                        $req = new Request();
                        $apilink = "$link/select/*/Employee/where/specialty/=/none";
                        $create = $req->Create($apilink);
                        $rows = count(json_decode($create[1], true)['ID']);
                        if ($create[0]) {
                            $json_data = $create[1];
                            $json_data = json_decode($json_data, true);
                            $args = aMake('ID', 'Name', 'gender', 'employee_birthdate', 'phone_namber', 'Address', 'department_id');
                            $table = new Table($args, $json_data);
                            $headers = aMake('id',"الاسم", "النوع", "تاريخ الميلاد", "رقم المحمول", "العنوان", "القسم");
                            $create_table = $table->CreateTable($rows, $headers, $json_data);
                            print($create_table);
                        } else {
                            die ("ERR, $create[1]");
                        }
                    ?>
                    <!-- <table dir="rtl">
                        <thead>
                            <tr>
                                <td class="id">id</td>
                                <td> الاسم</td>
                                <td> النوع</td>
                                <td> تاريخ الميلاد</td>
                                <td> رقم المحمول</td>
                                <td> العنوان</td>
                                <td> القسم</td>
                            </tr>
                        </thead>
                        <tbody>
                            
                                // $request = new Request();
                                // $api_link = "$link/select/*/Employee/where/specialty/=/none";
                                // $create = $request->Create($api_link);
                                // if (!$create[0]) {
                                //     die("ERR in API Request");
                                // }
                                // $users = json_decode($create[1], true);
                                // $patients = count($users['employee_ID']);
                                // for ($i=0; $i < $patients; $i++) { 
                                //     echo "<tr>";
                                //     echo "<td class='id'>";
                                //     echo $users['employee_ID'][$i];
                                //     echo "</td>";
                                //     echo "<td>";
                                //     echo $users['Name'][$i];
                                //     echo "</td>";
                                //     echo "<td>";
                                //     if ( $users['gender'][$i] == 1) {
                                //         echo "أنثى";
                                //     } else {
                                //         echo "ذكر";
                                //     }
                                //     echo "</td>";
                                //     echo "<td>";
                                //     echo $users['employee_birthdate'][$i];
                                //     echo "</td>";
                                //     echo "<td>";
                                //     echo $users['phone_namber'][$i];
                                //     echo "</td>";
                                //     echo "<td>";
                                //     echo $users['Address'][$i];
                                //     echo "</td>";
                                //     echo "<td>";
                                //     // create reltation
                                //     echo $users['department_ID'][$i];
                                //     echo "</td>";
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
                            </tr>
                            
                        </tbody>
                    </table> -->
                </div>
                <div class="button btn" dir="rtl">
                       <a href="تعديل بيانات موظف.php">
                        <button class="edietDe"> تعديل بيانات</button> 
                    </a>
                    <a href="أختر قسم الموظفين.html">
                        <button class="showDe"> عرض حسب القسم </button> 
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
