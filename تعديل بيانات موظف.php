<?php
include('php/sessions.php');
include('php/accessdenied.php');
include('php/API.php');
// error_reporting(0);
?>
<!DOCTYPE html>
<html lang="rlt">
    <head>
     <meta charset="utf-8"/>
     <meta http-equiv="X-UA-Compatible" content="device-width"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>تعديل بيانات موظف </title>
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
                    <li class="employee" id="employee"><a href="الموظفين.php"> الموظفين 
                    </a></li>
                    <li class="spicialest"><a href="الأخصائيين.php"> الأخصائيين 
                    </a></li>
                    <li class="tools"><a href="الأدوات.php">الأدوات 
                    </a></li>
                  </ul>
                 <div class="out">
                 <i class="material-icons"><a href="dashboard.php">home</a></i>
                    <a href="HOME_PAGE.html"> 
                    <button class="outnavbut"> خروج</button> </a>
                </div>

            </div>
            <div class="content">
                <span class="pageName">تعديل البيانات</span>
                <div class="edpage" dir="rtl">
                    <form id="search" method='post' action="تعديل بيانات موظف.php">
                        <div class="input-box">
                            <input type="search" name='id' placeholder=" أدخل id المريض للبحث" maxlength="7" minlength="1" pattern="[0-9-٠-٩]{1}}" required>
                            <button type="submit" name='search' class="searchbu">
                                <i class="material-icons" id="search-icons">search</i>
                            </button>
                        </div>
                    </form>
                    </form>
                    <form class="edform" action="تعديل بيانات موظف.php" method='post'>
                    <?php
                            $nid = '';
                            $name = '';
                            $phone = '';
                            $address = '';
                            $email = '';
                        if (isset($_POST['search'])) {
                                $fid = $_POST['id'];
                                $request = new Request();
                                $api_link = "$link/select/*/Employee/where/ID/=/$fid";
                                $create = $request->Create($api_link);
                                if (!$create[0]) {
                                    die("ERR in API Request");
                                }
                                $users = json_decode($create[1], true);
                                $id = $users['employee_ID'][0];
                                $nid = $users['nid'][0];
                                $name = $users['Name'][0];
                                $phone = $users['phone_namber'][0];
                                $address = $users['Address'][0];
                                $email = $users['E_mail'][0];
                                $department_id = $users['department_ID'][0];
                                $date = $users['employee_birthdate'][0];
                        }
                        if (isset($_POST['update'])) {
                            $fid = $_POST['id'];
                            $name = $_POST['pname'];
                            $nid = $_POST['nid'];
                            $date = $_POST['date'];
                            $address = $_POST['address'];
                            $mobnum = $_POST['mobnum'];
                            $email = $_POST['email'];
                            $department = $_POST['d'];
                            $request = new Request();
                            $api_link = "$link/update/Employee/set/Name/$name/where/employee_ID/=/$fid";
                            $create = $request->Create($api_link);
                            $api_link = "$link/update/Employee/set/nid/$nid/where/employee_ID/=/$fid";
                            $create = $request->Create($api_link);
                            $api_link = "$link/update/Employee/set/employee_birthdate/$date/where/employee_ID/=/$fid";
                            $create = $request->Create($api_link);
                            $api_link = "$link/update/Employee/set/Address/$address/where/employee_ID/=/$fid";
                            $create = $request->Create($api_link);
                            $api_link = "$link/update/Employee/set/phone_namber/$mobnum/where/employee_ID/=/$fid";
                            $create = $request->Create($api_link);
                            $api_link = "$link/update/Employee/set/E_mail/$email/where/employee_ID/=/$fid";
                            $create = $request->Create($api_link);
                            $api_link = "$link/update/Employee/set/department_ID/$department/where/employee_ID/=/$fid";
                            $create = $request->Create($api_link);
                        }
                    ?>
                       <div class="pUserDetails">
                           <input type="hidden" name="id" value='<?php echo $fid;?>'>
                           <div>
                                <div class="input-box">
                                    <span class="details">الاسم</span>
                                    <input type="text" name='pname' id='name' value='<?php echo $name; ?>' placeholder=" أدخل اسم المريض"  required>
                                </div>
                                <div class="input-box">
                                    <span class="details">الرقم القومي</span>
                                    <input maxlength="14" name='nid' id='nid' value="<?php echo $nid; ?>" minlength="7"  type="text" placeholder=" الرقم القومي" pattern="[0-9-٠-٩]{14}" required>
                                </div>
                                <div class="input-box" >
                                    <span class="details" >تاريخ الميلاد</span>
                                    <input id="history" name='date' id='birth_date' type="date" value="<?php echo date($date); ?>" required >
                                </div>
                                <div class="input-box">
                                    <span class="details">العنوان</span>
                                    <input type="text" name='address' value='<?php echo $address; ?>' id='address' placeholder="العنوان" required >
                                </div>
                                <div class="input-box">
                                    <span class="details">رقم الهاتف المحمول</span>
                                    <input type="text" name='mobnum' id='mobile_number' value='<?php echo $phone; ?>' placeholder="رقم الهاتف المحمول"  maxlength="11" minlength="10"  pattern="[0-9-٠-٩]{11}" required >
                                </div>
                           </div>
                            <div>
                                <div class="input-box">
                                    <span class="details" >البريد الإلكتروني</span>
                                    <input type="email" name='email' value="<?php echo $email; ?>" placeholder="البريد الإلكتروني" required>
                                </div>
                                <div class="input-box" id="eddep">
                                    <div>
                                        <span class="details">القسم</span>
                                    </div>
                                   <div id="check" >
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
                        <button type="submit" name='update' class="subedietDe"> تعديل البيانات</button> 
                        <a href="./إضافة موظف.php" name='add' class="subedietDe"> إضافة موظف </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>