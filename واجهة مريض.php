<?php
error_reporting(0);
include('php/sessions.php');
include('php/adminAccessdenied.php');
?>
<!DOCTYPE html>
<html lang="rlt">
    <head>
     <meta charset="utf-8"/>
     <meta http-equiv="X-UA-Compatible" content="device-width"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>الصفحة الرئيسية</title>
     <link rel="stylesheet" href="tempstyle.css">
     <link rel="stylesheet" href="pationtstyle.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            <div class="navbar" dir="rtl">
                <div class="logo">
                    <img src="logo2.png" alt="logo"  class="nabta">
                 </div>
                <ul class="links">
                    <li>
                        <a href="#" class="fa fa-facebook" title="facebook page"></a>
                        <a href="#" class="fa fa-google" title="gmail"></a>
                    </li>
                    <li>
                        <a href="تعديل المريض للبيانات.php" class="edite">تعديل البيانات</a>
                    </li>
                    <li>
                        <a href="عرض البيانات.php" class="edite"> عرض البيانات</a>
                    </li>
                    <li>
                        <a href="#" class="fa fa-instagram" title="instagram page"></a>
                        <a href="#" class="fa fa-whatsapp" title="whatsapp number "></a>
                    </li>
                  </ul>

                 <div class="out">
                    <a href="php/logout.php"> 
                    <button class="outnavbut"> خروج</button> </a>
                </div>

            </div>
            <div id="background">
                <!--- هنا احنا حاطين الباك جراوند بتاعة الجزء اللي تحت -->
            </div>
        </div>
    </body>
</html>