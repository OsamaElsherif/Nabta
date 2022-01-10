<?php
error_reporting(0);
session_start();
$login = $_SESSION['LOGIN'];
$user = $_SESSION['USER'];
$user_type = $_SESSION['type'];
if ($login) {
    if ($user_type == 'patient') {
        header('Location: /nabta/Nabta/واجهة مريض.php');
    } else {
        header('Location: /nabta/Nabta/dashboard.php');
    }
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="device-width"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In </title>
    <link rel="stylesheet" href="style.css">
    <body> 
        <div class="container" >
         <div class="childImg"> </div>
            <div class="content">
             <div class="logo main">
                <img src="Logo@2x.png" alt="logo"  class="nabta">
             </div>
             <div dir="rtl" class="loginlable">
                <div class="textlable">  تسجيل الدخول </div>
                <form  action="php/login.php" method="post">
                    <div class="userDetails2">
                        <div class="input-box">
                            <span class="details" >البريد الإلكتروني</span>
                            <input type="email" name='email' placeholder="البريد الإلكتروني" required>
                        </div>
                        <div class="input-box">
                            <span  class="details"> كلمة السر </span>
                            <input type="password" name='password' placeholder="كلمة السر" required>
                        </div>
                    </div>
                    <div>
                        <input class="submit" name='login' type="submit" value="تسجيل الدخول">
                    </div>
                    <p class="already">ليس لديك حساب ؟ <a  href="./SIGN_UP.php">سجل حساب جديد</a></p>
                </form>
            </div>
            
           </div>
             </div>
            </div>
        </div>


    </body>
</head>
</html>
