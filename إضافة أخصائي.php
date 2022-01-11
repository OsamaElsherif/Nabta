<?php
include('php/API.php');  
if(isset($_POST['add'])) {
    // variables from the form
    $PName = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $address = $_POST['address'];
    $mobnum = $_POST['number'];
    $password = $_POST['password'];
    $national_id = $_POST['NID'];
    $gender = $_POST['gender'];
    $department_ID = $_POST['d'];
    
    // insert user
    $api_link = "$link/insert/User/values/NULL,'$email','$PName','$password','Employee'";
    $request = new Request();
    $create = $request->Create($api_link);
    // print($create);
    if (!$create[0]) {
        die("ERR in API aa Request");
    }
    // select user id
    $api_link = "$link/select/*/User/where/E_mail/=/$email/false";
    $create = $request->Create($api_link);
    if (!$create[0]) {
        die("ERR in API Request");
    }
    $user = json_decode($create[1], true);
    $user_id = $user['ID'][0];

    // insert a employee
    $api_link = "$link/insert/Employee/values/'$PName', $gender, '$mobnum','$address','$date', $department_ID,'doctor', '$email', $user_id, '$national_id'";
    $create = $request->Create($api_link);
    if (!$create[0]) {
        die("ERR in API Request");
    }
    header('Location: الأخصائيين.php');
}
?>
<!DOCTYPE html>
<html lang="rlt">
    <head>
     <meta charset="utf-8"/>
     <meta http-equiv="X-UA-Compatible" content="device-width"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>إضافة أخصائي </title>
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
                <ul class="links">
                    <li class="pationt"  ><a href="المرضى.php"> المرضى
                    </a></li>
                    <li class="employee" id="employee" ><a href="الموظفين.php"> الموظفين 
                    </a></li>
                    <li class="spicialest" ><a href="./الأخصائيين.php"> الأخصائيين 
                    </a></li>
                    <li class="tools"><a href="الأدوات.php">الأدوات 
                    </a></li>
                  </ul>
                 <div class="out">
                    <i class="material-icons"><a href="dashboard.php">home</a></i>
                    <a href="./index.html"> 
                    <button class="outnavbut"> خروج</button> </a>
                </div>

            </div>
            <div class="content">
                <span class="pageName">إضافة البيانات</span>
                <div class="edpage" dir="rtl">
                    <form class="edform" action="إضافة أخصائي.php" method="POST">
                       <div class="pUserDetails">
                           <div>
                                <div class="input-box">
                                    <span class="details">الاسم</span>
                                    <input type="text" name='name' placeholder=" أدخل الاسم "  required>
                                </div>
                                <div class="input-box" >
                                    <span class="details" >تاريخ الميلاد</span>
                                    <input id="history" name='date' type="date" required >
                                </div>
                                <div class="input-box">
                                    <span class="details">العنوان</span>
                                    <input type="text" name='address' placeholder="العنوان" required >
                                </div>
                                <div class="input-box">
                                    <span class="details">رقم الهاتف المحمول</span>
                                    <input type="text" name='number' placeholder="رقم الهاتف المحمول"  maxlength="11" minlength="10"  pattern="[0-9-٠-٩]{11}" required >
                                </div>
                                <div class="input-box">
                                    <span class="details" >البريد الإلكتروني</span>
                                    <input type="email"  name="email" placeholder="البريد الإلكتروني" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">كلمة المرور</span>
                                    <input type="password" name="password" placeholder=" كلمة المرور" required>
                                </div>
                           </div>
                            <div>
                                <div class="input-box">
                                    <span class="details">الرقم القومي</span>
                                    <input maxlength="14" name="NID" minlength="7"  type="text" placeholder=" الرقم القومي" pattern="[0-9-٠-٩]{14}" required>
                                </div>
                                <div class="gender-details"  >
                                    <input type="radio" value='0' name="gender" id="dot-1" required>
                                    <input type="radio" value='1' name="gender" id="dot-2" required>
                                    <span class="gender-title">النوع</span>
                                    <div class="category">
                                        <label for="dot-1">
                                            <span class="dot one"></span>
                                            <span class="gender">ذكر</span>
                                        </label>
                                        <label for="dot-2">
                                            <span class="dot two"></span>
                                            <span class="gender">أنثى</span>
                                        </label>
                                    </div>
                                    <div class="input-box" id="edcheck">
                                    <div>
                                        <span class="details">القسم</span>
                                    </div>
                                    <div id="check" >
                                        <div>
                                            <input type="checkbox" name='d' value='1' id="1">
                                            <label for="1">التوحد</label>
                                            <input type="checkbox" name='d' value='2' id="2"  >
                                            <label for="2">بطء التعلم</label>
                                            <input type="checkbox" name='d' value='3' id="3" >
                                            <label for="3">التأخر الذهني</label>
                                            <input type="checkbox" name='d' value='4' id="4" >
                                            <label for="4">صعوبات التعلم</label>
                                            <input type="checkbox" name='d' value='13' id="13" >
                                            <label for="13">التأخر الدراسي</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name='d' value='7' id="7" >
                                            <label for="7">الشلل الدماغي</label>
                                            <input type="checkbox" name='d' value='8' id="8" >
                                            <label for="8">الضعف السمعي</label>
                                            <input type="checkbox" name='d' value='9' id="9" >
                                            <label for="9">المتلازمات</label>
                                            <input type="checkbox" name='d' value='10' id="10" >
                                            <label for="10">أمراض الكلام</label>
                                            <input type="checkbox" name='d' value='11' id="11" >
                                            <label for="11">أمراض اللغة</label>
                                        </div>
                                   </div>
                                </div>
                            </div>
                       </div>
                       <div class="button" dir="rtl">
                        <button type="submit" name='add' class="subedietDe"> إضافة البيانات</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>