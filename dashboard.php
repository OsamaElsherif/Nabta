<?php
include('php/accessdenied.php');
?>
<!DOCTYPE html>
<html lang="rlt">
    <head>
     <meta charset="utf-8"/>
     <meta http-equiv="X-UA-Compatible" content="device-width"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>الصفحة الرئيسية</title>
     <link rel="stylesheet" href="tempstyle.css">
    </head>
    <body>
        <div class="container">
            <div class="navbar" dir="rtl">
                <div class="logo">
                    <img src="logo2.png" alt="logo"  class="nabta">
                 </div>
                <ul class="links">
                    <li class="Patient"><a href="المرضى.php"> المرضى
                    </a></li>
                    <li class="employee"><a href="الموظفين.php"> الموظفين 
                    </a></li>
                    <li class="spicialest"><a href="الأخصائيين.php"> الأخصائيين 
                    </a></li>
                    <li class="supplies"><a href="الأدوات.php">الأدوات 
                    </a></li>
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
