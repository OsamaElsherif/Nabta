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
     <title>طلب أداة </title>
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
                    <i class="material-icons"><a href="HOME_PAGE1.html">home</a></i>
                    <a href="php/logout.php"> 
                    <button class="outnavbut"> خروج</button> </a>
                </div>

            </div>
            <div class="content">
                <span class="pageName">طلب أداة </span>
                <div class="edpage" dir="rtl">
                    <?php
                        if (isset($_POST['order'])) {
                            $name = $_POST['name'];
                            // add it to the database
                            $description = $_POST['desc'];
                            $price = $_POST['price'];
                            $quantity = $_POST['qant'];
                            $patient_id = $_POST['pid'];
                            $department = $_POST['d'];
                            $request = new Request();
                            $api_link = "$link/insert/supplies/values/'$name',$patient_id,$department,$quantity,$price";
                            $create = $request->Create($api_link);
                        }
                    ?>
                    <form class="addform" action="طلب اداة.php" method='post'>
                       <div class="pUserDetails">
                           <div>
                                <div class="input-box">
                                    <span class="details">الاسم</span>
                                    <input name='name' type="text" placeholder=" أدخل اسم الأداة"  required>
                                </div>
                                <div class="input-box">
                                    <span class="details">الوصف</span>
                                    <input name='desc' type="text" placeholder="الوصف" required >
                                </div>
                                <div class="input-box">
                                    <span class="details">السعر</span>
                                    <input name='price' type="text" placeholder="السعر"  maxlength="4" minlength="1"  required >
                                </div>
                                <div class="input-box">
                                    <span class="details">الكمية</span>
                                    <input name='qant' type="text" placeholder="الكمية" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">ID المريض</span>
                                    <input name='pid' type="text" placeholder="ID المريض"  maxlength="7" minlength="1" pattern="[0-9-٠-٩]{1}}" required>
                                </div>
                           </div>
                            <div>
                                <div class="input-box" id="eddep">
                                    <div>
                                        <span class="details">القسم</span>
                                    </div>
                                   <div id="check" class="other">
                                        <div>
                                            <input type="checkbox" name='d' value='1' id="1" <?php if($department_id==1) { echo 'checked';  } ?> >
                                            <label for="1">التوحد</label>
                                            <input type="checkbox" name='d' value='2' id="2"  <?php if($department_id==2) { echo 'checked';  } ?> >
                                            <label for="2">بطء التعلم</label>
                                            <input type="checkbox" name='d' value='3' id="3" <?php if($department_id==3) { echo 'checked';  } ?> >
                                            <label for="3">التأخر الذهني</label>
                                            <input type="checkbox" name='d' value='4' id="4" <?php if($department_id==4) { echo 'checked';  } ?> >
                                            <label for="4">صعوبات التعلم</label>
                                            <input type="checkbox" name='d' value='13' id="13" <?php if($department_id==13) { echo 'checked';  } ?> >
                                            <label for="13">التأخر الدراسي</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name='d' value='7' id="7" <?php if($department_id==7) { echo 'checked';  } ?> >
                                            <label for="7">الشلل الدماغي</label>
                                            <input type="checkbox" name='d' value='8' id="8" <?php if($department_id==8) { echo 'checked';  } ?> >
                                            <label for="8">الضعف السمعي</label>
                                            <input type="checkbox" name='d' value='9' id="9" <?php if($department_id==9) { echo 'checked';  } ?> >
                                            <label for="9">المتلازمات</label>
                                            <input type="checkbox" name='d' value='10' id="10" <?php if($department_id==10) { echo 'checked';  } ?> >
                                            <label for="10">أمراض الكلام</label>
                                            <input type="checkbox" name='d' value='11' id="11" <?php if($department_id==11) { echo 'checked';  } ?> >
                                            <label for="11">أمراض اللغة</label>
                                        </div>
                                   </div>
                                </div>
                            </div>
                       </div>
                       <div class="button" dir="rtl">
                        <button type="submit" name='order' class="subedietDe">طلب اداة</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
