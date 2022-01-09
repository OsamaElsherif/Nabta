<?php
error_reporting(0);
// include('php/adminAccessdenied.php');
include('php/sessions.php');
include('php/API.php');

$id = $user_json['ID'][0];
$request = new Request();
$apilink = "$link/select/*/Patient/where/user_id/=/$id";
$create = $request->Create($apilink);
$patient_data = $create[1];
$patient_data = json_decode($patient_data, true);
$apilink = "$link/select/*/User/where/ID/=/$id";
$create = $request->Create($apilink);
$user = $create[1];
$user = json_decode($user, true);
?>
<!DOCTYPE html>
<html lang="rlt">
    <head>
     <meta charset="utf-8"/>
     <meta http-equiv="X-UA-Compatible" content="device-width"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>تعديل البيانات  </title>
     <link rel="stylesheet" href="tempstyle.css">
     <link rel="stylesheet" href="pationtstyle.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                    <i class="material-icons"><a href="واجهة مريض.php">home</a></i>
                    <a href="php/logout.php"> 
                    <button class="outnavbut"> خروج</button> </a>
                </div>
            </div>
            <div class="content">
                <span class="pageName">تعديل البيانات</span>
                <div class="edpage" dir="rtl">
                    <?php 
                        if (isset($_POST['update'])) {
                            $name = $_POST['name'];
                            $nid = $_POST['nid'];
                            $address = $_POST['address'];
                            $mobnum = $_POST['mobnum'];
                            $desc = $_POST['desc'];
                            $date = $_POST['date'];
                            $password = $_POST['password'];
                            $confirmPassword = $_POST['confirmPassword'];
                            $email = $_POST['email'];
                            if ($password != $confirmPassword) {
                                die("password doesn't match");
                            }
                            $apilink = "$link/update/Patient/set/fullname/$name/where/user_id/=/$id";
                            $create = $request->Create($apilink);
                            $apilink = "$link/update/Patient/set/nid/$nid/where/user_id/=/$id";
                            $create = $request->Create($apilink);
                            $apilink = "$link/update/Patient/set/address/$address/where/user_id/=/$id";
                            $create = $request->Create($apilink);
                            $apilink = "$link/update/Patient/set/phonenumber/$mobnum/where/user_id/=/$id";
                            $create = $request->Create($apilink);
                            $apilink = "$link/update/Patient/set/patient_birthdate/$date/where/user_id/=/$id";
                            $create = $request->Create($apilink);
                            $apilink = "$link/update/Patient/set/E_mail/$email/where/user_id/=/$id";
                            $create = $request->Create($apilink);
                            $apilink = "$link/update/User/set/E_mail/$email/where/ID/=/$id";
                            $create = $request->Create($apilink);
                            $apilink = "$link/update/User/set/password/$password/where/ID/=/$id";
                            $create = $request->Create($apilink);
                            header('Location: تعديل المريض للبيانات.php');
                        }
                    ?>
                    <form class="edform" action="تعديل المريض للبيانات.php" method="post">
                       <div class="pUserDetails">
                           <div>
                            <div class="input-box">
                                <span class="details">الاسم</span>
                                <input type="text" name='name' value="<?php echo $patient_data['fullname'][0]; ?>" placeholder=" أدخل اسم المريض"  required>
                            </div>
                            <div class="input-box">
                                <span class="details">الرقم القومي</span>
                                <input maxlength="14" name='nid' minlength="7" value="<?php echo $patient_data['nid'][0]; ?>"  type="text" placeholder=" الرقم القومي" pattern="[0-9-٠-٩]{14}" required>
                            </div>
                            <div class="input-box">
                                <span class="details">العنوان</span>
                                <input type="text" name='address' value="<?php echo $patient_data['address'][0]; ?>" placeholder="العنوان" required >
                            </div>
                            <div class="input-box">
                                <span class="details">رقم الهاتف المحمول</span>
                                <input type="text" name='mobnum' value="<?php echo $patient_data['phonenumber'][0]; ?>" placeholder="رقم الهاتف المحمول"  maxlength="11" minlength="10"  pattern="[0-9-٠-٩]{11}" required >
                            </div>
                            <!-- its suppose to have a database field for this textbox -->
                            <div class="input-box" id="dego">
                                <span class="details">الحالة المرضية</span>
                                <input type="text" name='desc' value="<?php echo $user_json['user_type'][0]; ?>" placeholder="الحالة المرضية" required>
                            </div>
                           </div>
                            <div>
                                <div class="input-box" >
                                    <span class="details" >تاريخ الميلاد</span>
                                    <input id="history" name='date' value="<?php echo date($patient_data['patient_birthdate'][0]); ?>" type="date" required >
                                </div>
                                <div class="input-box">
                                    <span class="details">كلمة المرور</span>
                                    <input type="text" name='password' value="<?php echo $user['password'][0]; ?>" placeholder=" كلمة المرور" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">تأكيد كلمة المرور </span>
                                    <input type="password" name='confirmPassword' placeholder="تأكيد كلمة المرور " required>
                                </div>
                                <div class="input-box">
                                    <span class="details" >البريد الإلكتروني</span>
                                    <input type="email" name='email' value="<?php echo $patient_data['E_mail'][0]; ?>" placeholder="البريد الإلكتروني" required>
                                </div>
                            </div>
                       </div>
                       <div class="button" dir="rtl">
                        <button type="submit" name='update' class="subedietDe"> تعديل البيانات</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>