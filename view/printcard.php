<?php

require_once("_config.php");

if( empty($_POST['chackbox_select']) || count($_POST['chackbox_select']) <=  0 ){
    echo '<h1> لطفا یک شاگرد راه انتخاب کنید  </h1>';
    exit();
}



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> کارت کانکور</title>


    <link rel="shortcut icon" href="img/dorsa.png" />
    <link rel="stylesheet" type="text/css" href="../assets/dist/bootstrap/dist/bootstrap.min.css">

    <link type="text/css" rel="stylesheet" href="../assets/dist/fonts/font.css" />

    <link type="text/css" rel="stylesheet" href="../assets/dist/font-awesome/css/all.css" />
    <link type="text/css" rel="stylesheet" href="../assets/dist/fonts/clip-font.min.css" />

    <link rel="stylesheet" type="text/css" href="stylecard.css">
    <link rel="stylesheet" type="text/css" href="../assets/sfont/font-sans.css">
    <link rel="stylesheet" type="text/css" href="../assets/bfont/font-bttr.css">
    <style type="text/css">
        @media print {
            footer {page-break-after: always !important;}
        }
    </style>
</head>
<body class="bg-pic">
<<<<<<< HEAD:view/printcard.php
  <br>

  
<div class="row">
<div class="col-md-2"></div>
<div class="col-xs-12 col-sm-12 col-sm-12 col-md-12 col-lg-7" style="padding: -20px;margin:-25px 0px ">
 <div class="image-flip">
      <div class="mainflip">
          <div class="frontside">
            <div class="card" style="">
               <table dir="rtl" style="border-collapse:unset; border-left: 1px solid #d6d6d6;border-top: 1px solid #d6d6d6;" >
                 
                 <tr style="text-align:center;">
                    <td colspan="1"><img src="../assets/img/logo_faculty.jpg" style="width:103px;"></td>

                    <td colspan="3" style="font-size: 18px" align="center" class="bfont"> 

                    <span style="margin-bottom:10px;font-size:16px;" class="bfont">وزارت تحصیلات عالی</span>
                    <br>
                    <span style="margin-bottom:10px;font-size:14px;" class="bfont">ریاست پوهنتون هرات</span>
                    <div style="font-size: 12px;line-height:30px" class="bfont">مدیریت تدریسی</div>
                    <span style="margin-bottom:10px;font-size:14px;" class="bfont">کارت کتابخانه - پوهنحی ژورنالیزم </span>
                  </td>
                    </span>
                    <td colspan="2"><img src="../img/download.png" style="width:103px;"></td>
                  </tr>
                 
                  <tr style="text-align:center;">
                    <td rowspan="4" style="width:150px"><img src="../img/ali.JPG" class="img-thumbnail"></td>
                    <td class="bfont color">نام  و تخلص</td>
                    <td class="cfont">علی احمد بختیاری</td>
                    <td class=" bfont color" >مکتب</td>
                    <td class="cfont ">هیواد</td>
                  </tr>
                  <tr style="text-align:center;">
                    <td class="width color bfont">نام پدر</td>
                    <td class="width cfont">عبدالقدیر</td>
                    <td class="width color bfont">آی دی </td>
                    <td class="width cfont" align="center" style="vertical-align: bottom; min-width:145"><span class="cfont">96334</span></td>
                  </tr>
                  <tr style="text-align:center;">
                    <td class="width color bfont">نام پدر</td>
                    <td class="width cfont">عبدالقدیر</td>
                    <td class="width color bfont">آی دی </td>
                    <td class="width cfont" align="center" style="vertical-align: bottom; min-width:145"><span class="cfont">96334</span></td>
                  </tr>
                  <tr style="text-align:center;">
                    <td class="width color bfont">نام پدر</td>
                    <td class="width cfont">عبدالقدیر</td>
                    <td class="width color bfont">آی دی </td>
                    <td class="width cfont" align="center" style="vertical-align: bottom; min-width:145"><span class="cfont">96334</span></td>
                  </tr>
                  
                
                  
                </table> 
=======
<br>


<?php
>>>>>>> cae0e241775e0ab868c52302c2e7669840051083:view/k-card.php

if(!empty($_POST['chackbox_select'])){
    foreach ($_POST['chackbox_select'] as $row ){
        $student_data = selectOne('students',base64_decode($row));

        echo '
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-xs-12 col-sm-12 col-sm-12 col-md-12 col-lg-7" style="padding: -20px;margin:-25px 0px ">
                <div class="image-flip">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card" style="">
                                <table dir="rtl" style="border-collapse:unset; border-left: 1px solid #d6d6d6;border-top: 1px solid #d6d6d6;" >
                                    <tr style="text-align:center;">
                                        <td colspan="1"><img src="../img/down.png" style="width:103px;"></td>
                                        <td colspan="3" style="font-size: 18px" align="center" class="bfont">
                                            <span style="margin-bottom:10px;font-size:16px;" class="bfont">وزارت تحصیلات عالی</span>
                                            <br>
                                            <span style="margin-bottom:10px;font-size:14px;" class="bfont">ریاست پوهنتون هرات</span>
                                            <div style="font-size: 12px;line-height:30px" class="bfont">مدیریت تدریسی</div>
                                            <span style="margin-bottom:10px;font-size:14px;" class="bfont">کارت کتابخانه - پوهنحی ژورنالیزم </span>
                                        </td>
                                        </span>
                                        <td colspan="2"><img src="../img/download.png" style="width:103px;"></td>
                                    </tr>
        
                                    <tr style="text-align:center;">
                                        <td rowspan="4" style="width:150px"><img src="'.$student_data['photo'].'" class="img-thumbnail"></td>
                                        <td class="bfont color"> آیدی  </td>
                                        <td class="cfont"> '.$student_data['student_id'].' </td>
                                        <td class=" bfont color" > نام  </td>
                                        <td class="cfont ">'.$student_data['full_name'].'</td>
                                    </tr>
                                    <tr style="text-align:center;">
                                        <td class="width color bfont">نام پدر</td>
                                        <td class="width cfont"> '.$student_data['father_name'].' </td>
                                        <td class="width color bfont"> سال فراغت </td>
                                        <td class="width cfont" align="center" style="vertical-align: bottom; min-width:145"><span class="cfont"> '.persionData($student_data['graduate_year']).' </span></td>
                                    </tr>
                                    <tr style="text-align:center;">
                                        <td class="width color bfont"> شماره تماس </td>
                                        <td class="width cfont"> '.$student_data['phone'].' </td>
                                        <td class="width color bfont"> ایمیل  </td>
                                        <td class="width cfont" align="center" style="vertical-align: bottom; min-width:145"><span class="cfont"> '.$student_data['email'].' </span></td>
                                    </tr>
        
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';

    }
}


?>

<script type="text/javascript" src="../assets/dist/bootstrap/dist/bootstrap.min.js"></script>
</body>
</html>