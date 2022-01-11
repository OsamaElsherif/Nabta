<?php
error_reporting(0);
// include('php/adminAccessdenied.php');
include('php/sessions.php');
include('php/API.php');


$id = $user_json['ID'][0];
$request = new Request();
$apilink = "$link/select/*/Patient/where/user_id/=/$id/false";
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
        <title>عرض البيانات  </title>
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
                <span class="pageName">عرض البيانات</span>
                <div class="edpage" dir="rtl">
                    <form class="edform" action="#">
                       <div class="pUserDetails">
                           <div>
                           <div class="input-box">
                                <span class="details">الاسم</span>
                                <input type="text" value="<?php echo $user['fullname'][0]; ?>" placeholder=" أدخل اسم المريض"  disabled>
                            </div>
                            <div class="input-box">
                                <span class="details">الرقم القومي</span>
                                <input maxlength="14" minlength="7" value="<?php echo $user['nid'][0]; ?>"  type="text" placeholder=" الرقم القومي" pattern="[0-9-٠-٩]{14}" disabled>
                            </div>
                            <div class="input-box">
                                <span class="details">العنوان</span>
                                <input type="text" value="<?php echo $user['address'][0]; ?>" placeholder="العنوان" disabled >
                            </div>
                            <div class="input-box">
                                <span class="details">رقم الهاتف المحمول</span>
                                <input type="text" value="<?php echo $user['phonenumber'][0]; ?>" placeholder="رقم الهاتف المحمول"  maxlength="11" minlength="10"  pattern="[0-9-٠-٩]{11}" disabled >
                            </div>
                            <div class="input-box" id="dego">
                                <span class="details">الحالة المرضية</span>
                                <input type="text" value="<?php echo $user_json['user_type'][0]; ?>" placeholder="الحالة المرضية" disabled>
                            </div>
                           </div>
                            <div>
                                <div class="input-box" >
                                    <span class="details" >تاريخ الميلاد</span>
                                    <input id="history" value="<?php echo date($user['patient_birthdate'][0]); ?>" type="date" disabled >
                                </div>
                                <div class="input-box" id="eddep">
                                    <div>
                                        <span class="details">القسم</span>
                                    </div>
                                   <div id="check">
                                   <div>
                                            <input type="checkbox" name='d' value='1' id="1" <?php if($user['department_id'][0]==1) { echo 'checked';  } ?>  disabled>
                                            <label for="1">التوحد</label>
                                            <input type="checkbox" name='d' value='2' id="2"  <?php if($user['department_id'][0]==2) { echo 'checked';  } ?>  disabled>
                                            <label for="2">بطء التعلم</label>
                                            <input type="checkbox" name='d' value='3' id="3" <?php if($user['department_id'][0]==3) { echo 'checked';  } ?>  disabled>
                                            <label for="3">التأخر الذهني</label>
                                            <input type="checkbox" name='d' value='4' id="4" <?php if($user['department_id'][0]==4) { echo 'checked';  } ?>  disabled>
                                            <label for="4">صعوبات التعلم</label>
                                            <input type="checkbox" name='d' value='13' id="13" <?php if($user['department_id'][0]==13) { echo 'checked';  } ?> disabled>
                                            <label for="13">التأخر الدراسي</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name='d' value='7' id="7" <?php if($user['department_id'][0]==7) { echo 'checked';  } ?>  disabled>
                                            <label for="7">الشلل الدماغي</label>
                                            <input type="checkbox" name='d' value='8' id="8" <?php if($user['department_id'][0]==8) { echo 'checked';  } ?>  disabled>
                                            <label for="8">الضعف السمعي</label>
                                            <input type="checkbox" name='d' value='9' id="9" <?php if($user['department_id'][0]==9) { echo 'checked';  } ?>  disabled>
                                            <label for="9">المتلازمات</label>
                                            <input type="checkbox" name='d' value='10' id="10" <?php if($user['department_id'][0]==10) { echo 'checked';  } ?> disabled>
                                            <label for="10">أمراض الكلام</label>
                                            <input type="checkbox" name='d' value='11' id="11" <?php if($user['department_id'][0]==11) { echo 'checked';  } ?> disabled>
                                            <label for="11">أمراض اللغة</label>
                                        </div>
                                   </div>
                                </div>
                            </div>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>