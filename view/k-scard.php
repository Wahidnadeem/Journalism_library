<?php 
    $page_part_parm = "KANKOR";
    $page_page_parm = "K-EER";
    $PAGE_TITLE     = "مارت کانکور";
    require_once("_configuration.php");
       
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
  .img-thumbnail{
  	padding:unset  !important;
  }
  td, th {
    border: 1px solid #036f3e !important;
}
  </style>
</head>
<body class="bg-pic">
  <br>
<?php
    if(isset($_POST['chack_select'])){
      $count = sizeof($_POST['chack_select']);
      $arrayData = $_POST['chack_select']; 
      if($count > 0 ){
        $count = 1;                               
        foreach ($arrayData  as $rowId ){
      
            $id = base64_decode($rowId);
            $viewData = $db->query("SELECT * FROM `k_eer` WHERE  `deleted` = '0' $hh_system_type AND id = '$id' LIMIT 1 ");
      
            if($UN_SYSTEM_TYPE == 'فاکولته'){
              $atefi_lable = 'انستیتوت علوم صحی عاطفی';
              $ministry_lable = 'وزارت تحصیلات عالی';
            }else{
              $atefi_lable = 'انستیتوت علوم صحی عاطفی';
              $ministry_lable = 'وزارت صحت عامه';
            }
            if($viewData->rowCount() > 0){
                while ($row = $viewData->fetch()) {
                  $examId = $row['k_entrance_exam_id'];
                  $examName = $db->query("SELECT name , s_name,type,date FROM `k_entrance_exam` WHERE id = '$examId'  limit 1")->fetch();

                  $facultyId = $row['student_faculty1'];
                  $facultyName = $db->query("SELECT * FROM `ss_faculties` WHERE id = '$facultyId' limit 1")->fetch();
                
                  $department_id = $row['student_department1'];
                  $departmentName = $db->query("SELECT name_fa FROM ss_department WHERE id = '$department_id' AND deleted = '0' $hh_system_type limit 1 ")->fetch();
                                                                
                  $rawdate = $examName['date']; 
                  $rawdate = $examName['date']; 

                  $dateCheck = explode("-", $rawdate);
                 
                  $number_crad  = $row['entrance'];
                  $viewnumber = explode("-", $number_crad);
                  $cardview   = $viewnumber[1];
  
                  $photo  = "";
                  if($row['photo'] != ""){
                    $photo = $row['photo'];
                  }else{
                    if($row['gender'] == "مرد")
                      $photo = "images/user.png";
                    else
                      $photo = "images/woman.png";
                  }
                  if (date("H") <"13" ) {
                    $AM_PM=  "قبل  از ظهر";
                  }
                  else{
                    $AM_PM=  "بعد از ظهر";
                  }

                 
                    // $type_kankor = '';
                    // if (strpos($examName['type'], 'عمومی') !== false) {
                    //   $type_kankor = ' عمومی  ';
                    // }else if(strpos($examName['type'], 'متفرقه') !== false){
                    //   $type_kankor = ' متفرقه  ';
                    // }else if(strpos($examName['type'], 'اختصاصی') !== false){
                    //   $type_kankor = ' اختصاصی  ';
                    // }


                    $time= date("H:i");
                    echo'<br>
                          <div class="row">
                           <div class="col-md-2"></div>
                            <div class="col-xs-12 col-sm-12 col-sm-12 col-md-12 col-lg-5" style="padding: -20px;margin:-25px 0px ">
                               <div class="image-flip">
                                    <div class="mainflip">
                                        <div class="frontside">
                                          <div class="card" style="border-radius:0px;border: 1px solid #036f3e;background:#036f3e">
                                             <table style="margin-bottom:0px;padding:0px;margin:0px;" dir="rtl" >
                                               
                                               <tr style="padding:0px !important;color:black;">
                                                  <td class="bfont" style="padding:0px !important;width:100%;" colspan="5" > 
                                                  	<img src="'.$atefi_logo.'" style="width:80px;float:right;">
                                                  	

                                                  	<p class="bfont" style="font-weight:bold;text-align:center;margin-top:10px;font-size:20px;">انستیتوت علوم صحی عاطفی</p>
                                                  	<p class="bfont" style="font-weight:bold;margin-top:-8px;font-size:12px;">'.$examName['name'].'</p>
                                                  	
                                                  	<p class="cfont" style="margin-top:-50px;text-align:left;margin-left:20px;font-weight:bold;" dir="ltr"> ID :  '.explode("-",$row['entrance'])[1].'</p>

                                                  </td>
                                                </tr>
                                               
                                               
                                                <tr style="text-align:center">
                                                  <th rowspan="3" style="width:100px"><img src="'.$photo.'" class="img-thumbnail"></th>
                                                  <th class="bfont color"> نام کامل </th>
                                                  <th class="cfont">'.$row['name'].' '.$row['l_name'].'</th>
                                                  <th class="width color bfont">نام پدر</th>
                                                  <th class="width cfont">'.$row['father_name'].'</th>
                                                  
                                                </tr>
                                                <tr style="text-align:center">
                                                  <th class="width color bfont">ولایت</th>
                                                  <th class="width cfont">'.$row['main_province'].'</th>

                                                 
                                                  <th class="width color bfont">تاریخ برگزاری</th>
                                                  <th class="width cfont">'.persionData($examName['date'],"-").'</th>
                                                </tr>
                                                <tr style="text-align:center">
                                                  <th class="width color bfont">نوعیت کانکور</th>
                                                  <th class="width cfont">'.$examName['type'].'</th>
                                                  
                                                   <th class=" bfont color">نمبر چوکی	</th>
                                                  <th class="cfont" style="min-width:145">  '.$cardview.' </th>

                                                </tr>
                                                <tr style="text-align:center">
                                                  <th colspan="2" class=" bfont color">رشته</th>
                                                  <th colspan ="4" style="font-size: 12px;;" class="bfont">
                                                  	'.$departmentName['name_fa'].'
                                                  </th>                                      
                                                </tr>
                                                <tr style="background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgb(3 111 62) 0%, rgb(3 111 62) 33%, rgb(3 111 62) 87%, rgb(3 111 62) 100%, rgba(255,255,255,0) 100%);;color:white;width:100%;">
                                                  <th colspan ="5" style="font-size: 14px;;" class="bfont">
	                                                  <a dir="rtl" style="margin-right:15px;margin-top:2px;" class="bfont">
	                                                  		<img src="img/location.png" style="width:20px;"> &nbsp;
	                                                  		افغانستان - هرات، غرب پارک ترقی، حنظله بادغیسی(1)
	                                                  </a>

	                                                  <a dir="ltr" style="float: left;margin-left:15px;margin-top:2px;">
	                                                  	<img src="img/tell.png" style="width:20px;    margin-top: -2px;"> &nbsp; <span class="bfont">0792191841</span> &nbsp;- <span class="bfont">0799103174</span> &nbsp;- <span class="bfont">0729489090</span>
	                                                  </a>
                                                  </th>                                      
                                                </tr>
                                                
                                              </table> 

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div><br>';

                                if($count++ %4 ==0){
                                  echo '<footer><br></footer>';
                                }
                                          }
                                        }
                                    }   
                               }
                          }else{
                            echo "There is no data it not working now";
                                   }

           ?>
<script type="text/javascript" src="../assets/dist/bootstrap/dist/bootstrap.min.js"></script>
</body>
</html>