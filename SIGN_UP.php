<?php
error_reporting(0);
session_start();
$login = $_SESSION['LOGIN'];
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
<html lang="rlt">
<head>
    <script src="https://kit.fontawesome.com/c592b252fa.js" crossorigin="anonymous"></script>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="device-width"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <body> 
        <div class="container" >
         <div class="childImg"> </div>
            <div class="content">
             <div class="logo main">
                <img src="Logo@2x.png" alt="logo" class="nabta">
             </div>
             <div dir="rtl" class="signUpLabel">
                <div class="textlable">إنشاء حساب</div>
                <form action="php/signup.php" method="post">
                    <div class="userDetails">
                        <div class="input-box">
                            <span class="details">الاسم</span>
                            <input type="text" name='PName' placeholder=" أدخل اسم المريض"  required>
                        </div>
                        <div class="input-box">
                            <span class="details">الرقم القومي</span>
                            <input maxlength="14" name="NID" minlength="7"  type="text" placeholder=" الرقم القومي" pattern="[0-9-٠-٩]{14}" required>
                        </div>
                        <div class="input-box">
                            <span class="details" >البريد الإلكتروني</span>
                            <input type="email" name="email" placeholder="البريد الإلكتروني" required>
                        </div>
                        <div class="input-box">
                            <span class="details" >تاريخ الميلاد</span>
                            <input id="history" name="date" type="date" required >
                        </div>
                        <div class="input-box">
                            <span class="details">العنوان</span>
                            <input type="text" name="address" placeholder="العنوان" required >
                        </div>
                        <div class="input-box">
                            <span class="details">رقم الهاتف المحمول</span>
                            <input type="text" name="mobnum" placeholder="رقم الهاتف المحمول"  maxlength="11" minlength="10"  pattern="[0-9-٠-٩]{11}" required >
                        </div>
                        <div class="input-box">
                            <span class="details">الحالة المرضية</span>
                            <input type="text" name="desc" placeholder="الحالة المرضية" required>
                        </div>
                        <div class="input-box">
                            <span class="details">كلمة المرور</span>
                            <input type="password" name="password" placeholder=" كلمة المرور" required>
                        </div>
                        <div class="input-box">
                            <span class="details">تأكيد كلمة المرور </span>
                            <input type="password" name="confirm_password" placeholder="تأكيد كلمة المرور " required>
                        </div>
                        <div class="gender-details"  >
                            <input type="radio" name="gender" value="0" id="dot-1" required>
                            <input type="radio" name="gender" value="1" id="dot-2" required>
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
                     </div>
                    </div> 
                    <div>
                        <input class="submit" name="signup" type="submit" value="إنشاء حساب">
                    </div>
                    <p class="already">لديك حساب بالفعل؟ <a  href="./LOG_IN.php">سجل دخولك</a></p>
                </form>
             </div>
           
            </div>
        </div>


    </body>
</head>
</html>
