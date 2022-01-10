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
     <title>الأدوات </title>
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
                    $create_navbar = $navbar->CreateNavbar('supplies');
                    print($create_navbar);
                 ?>
                 <div class="out">
                 <i class="material-icons"><a href="dashboard.php">home</a></i>
                    <a href="php\logout.php"> 
                    <button class="outnavbut"> خروج</button> </a>
                </div>
            </div>
            <div class="content">
                <span class="tableName">عرض سجل الأدوات</span>
                <div class="table">
                    <?php
                        $req = new Request();
                        $apilink = "$link/select/*/supplies/";
                        $create = $req->Create($apilink);
                        $rows = count(json_decode($create[1], true)['ID']);
                        if ($create[0]) {
                            $json_data = $create[1];
                            $json_data = json_decode($json_data, true);
                            $args = aMake('ID', 'name', 'price', 'quantity', 'department_id', 'delete');
                            $table = new Table($args, $json_data);
                            $headers = aMake('id', "الاسم", "السعر", "الكمية", "القسم", 'الحذف');
                            $create_table = $table->CreateTable($rows, $headers, 'supplies');
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
                                <td> السعر</td>
                                <td> الكمية</td>
                                <td> القسم</td>
                            </tr>
                        </thead>
                        <tbody>
                                // $request = new Request();
                                // $api_link = "$link/select/*/supplies/";
                                // $create = $request->Create($api_link);
                                // if (!$create[0]) {
                                //     die("ERR in API Request");
                                // }
                                // $supplies = json_decode($create[1], true);
                                // $supplies_num = count($supplies['supplies_ID']);
                                // for ($i=0; $i < $supplies_num; $i++) { 
                                //     echo "<tr>";
                                //     echo "<td class='id'>";
                                //     echo $supplies['supplies_ID'][$i];
                                //     echo "</td>";
                                //     echo "<td>";
                                //     echo $supplies['name'][$i];
                                //     echo "</td>";
                                //     echo "<td>";
                                //     echo $supplies['price'][$i];
                                //     echo "</td>";
                                //     echo "<td>";
                                //     echo $supplies['quantity'][$i];
                                //     echo "</td>";
                                //     echo "<td>";
                                //     echo $supplies['department_id'][$i];
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
                            </tr>
                            <tr>
                                <td class="id"></td>
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
                            </tr>
                            <tr>
                                <td class="id"></td>
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
                            </tr>
                            <tr>
                                <td class="id"></td>
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
                    <a href="طلب اداة.php">
                        <button class="addDeT"> طلب أدوات</button>
                    </a>
                    <a href="اختر قسم الأدوات.html">
                        <button class="showDe"> عرض حسب القسم </button> 
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
