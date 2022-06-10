<?php 
require_once("_config.php");

// $category_data = $db->prepare("SELECT * FROM categories WHERE `is_deleted` =:is_deleted ORDER BY id DESC LIMIT $to OFFSET $from ");
// $category_data->execute(['is_deleted' => 0]);

// $list_data  = $db->query("SELECT count(id) as record FROM categories WHERE is_deleted = 0")->fetch();
// $record     = $list_data['record'];


  $bookList    = $db->query("SELECT count(id) as record FROM books WHERE is_deleted = 0")->fetch();
  $totalbook   = $db->query("SELECT sum(book_quantity) as totalrecord FROM books WHERE is_deleted = 0")->fetch();
  $bookLend    = $db->query("SELECT count(id) as lend_book FROM lending_book WHERE is_deleted = 0")->fetch();
  $studentList = $db->query("SELECT count(id) as student_list FROM students WHERE is_deleted = 0")->fetch();
  $teacherList = $db->query("SELECT count(id) as teacher_list FROM teachers WHERE is_deleted = 0")->fetch();


?>
<!DOCTYPE html>
<!--[if !IE]><!-->
<html class="no-js" lang="fa">
<!--<![endif]-->
<head>
<!-- Main CSS -->
<?php
$PAGE_TITLE     = "ثبت کتگوری";

require_once("_head.php");
?>

               <style type="text/css">
  

.card {
  background: #fff;
  border-radius: 2px;
  display: inline-block;
  height: 100px;
  margin: 1rem;
  position: relative;
  width: 293px;
}
.card-3 {
      box-shadow: 0px 0px 0px rgba(0,0,0,0.19), 0px 2px 6px 0px rgba(0,0,0,0.23);
}


 td, th {  
  border-bottom: 1px solid #ddd;
  text-align: left;
}

table {
  width: 100%;
}

th, td {
  padding: 15px;
}




</style>

</head>

<body class="rtl footer-fixed header-default">

<!-- start: HEADER -->
<?php
$menu  = "add_category.php";
require_once("_header.php");
?>
<!-- end: HEADER -->
<!-- start: MAIN CONTAINER -->
<div class="main-container">
 <!-- start: SIDEBAR -->
 <?php 
 $submenu    = "add_category";
 require_once("_sidebar.php");
 ?>
 <!-- end: SIDEBAR   -->
 <BR>

 <div class="main-content">
    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">
                <!-- start: PAGE TITLE & BREADCRUMB -->
                <ol class="breadcrumb">
                    <li class="bfont">
                        <i class="clip-home-3"></i>
                        <a href="s-index">    
                            خانه 
                        </a>
                    </li>
                    <li class="bfont">
                        <a href="javascript:(void);">    
                            کتاب خانه 
                        </a>
                    </li>
                    <li class="active bfont">
                        کتابخانه 
                    </li>
                    <li class="search-box">
                        <form class="sidebar-search">
                            <div class="form-group ">
                                <input type="text" placeholder="دنبال چی می گردی , اینجا بنویس " class="col-sm-12">
                                <button class="submit">
                                    <i class="clip-search-3"></i>
                                </button>
                            </div>
                        </form>
                    </li>

                </ol><br>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <!-- end: PAGE HEADER -->
        <!-- start: PAGE CONTENT -->
          
        <div class="row">
          <div style="float: right;margin-right: 6px;">
             <div class="card card-3" style="text-align: center;color: #007aff;">
                 <i class="fa fa-book" style="font-weight: bolder; margin-top: 13px;float: right;margin-right: 10px;font-size: 50px;"  > </i>
                 <p class="bfont" style="font-size: 16px;margin-top: 16px;color: #007aff;">عناوین کتاب های موجود </p>
                 <p class="bfont" style="font-size: 25px;margin-top: -7px"><?php echo $bookList['record']; ?></p>
             </div>

              <div class="card card-3" style="text-align: center; color:#009688">&nbsp;&nbsp;
                 <i class="clip-enter" style="margin-top: 13px;float: right;margin-right: 10px; margin-right: 10px;font-size: 50px;"> </i><br>
                 <p class="bfont" style="font-size: 18px;"> کتاب های در حال امانت </p>
                 <p class="bfont" style="font-size: 16px;"><?php echo $bookLend['lend_book']; ?> </p>
             </div>

             <div class="card card-3" style="text-align: center;color: #607D8B;">
                   <i class="clip-users" style="margin-top: 13px;float: right;margin-right: 10px;   margin-top: 13px;float: right;margin-right: 10px;font-size: 50px;"> </i><br>
                 <p class="bfont" style="font-size: 20px;">اعضای کتابخانه   </p>
                 <p class="bfont" style="font-size: 16px;margin-top: -7px">
                  <b>استاد</b> : <?php echo $teacherList['teacher_list']; ?>
                  <b> محصل </b> : <?php echo $studentList['student_list']; ?>
                  </p>
             </div>

             <div class="card card-3" style="text-align: center;color: #E91E63;">
                 <i class="clip-tree" style=" margin-top: 13px;margin-right: 10px;font-size: 50px;float: right;"> </i>
                 <p class="bfont" style="font-size: 16px;margin-top: 16px;"> مجموع کل کتاب های موجود </p>
                 <p class="bfont" style="font-size: 18px;"><?php echo $totalbook['totalrecord']; ?></p>
             </div>
        </div>
      </div>

              
        <!-- end: PAGE CONTENT-->
        <!-- start: PAGE -->
        <!-- start: PAGE CONTENT -->   
    <div class="default-bottom-height">
    </div>
</div>
 <!-- start: FOOTER -->
<?php 
require_once("_footer.php");
?>
<!-- Main Script -->
<?php 
require_once("_script.php");
?>
    <!-- /Main Script -->
</body>
</html >