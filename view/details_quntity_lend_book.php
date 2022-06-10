<?php
    require_once("_config.php");

    if (isset($_GET['id'])) {

    $student_id = base64_decode($_GET['id']);
    $lend_book_data = $db->query("SELECT * FROM `lending_book` WHERE `is_deleted` = '0' AND `student_id` = '$student_id' ORDER BY id DESC ");

    $student_data = $db->query("SELECT * FROM `students` WHERE `is_deleted` = '0' AND `id`='$student_id'");
    $student_row = $student_data->fetch();

    }else{
        header("location:add_student.php");
    }


   

?>
<!DOCTYPE html>
<html class="no-js" lang="fa">
<head>
    <!-- Main CSS -->
    <?php
    $PAGE_TITLE     = " جزئیات کتاب ";
    require_once("_head.php");
  ?>
  <!-- /Main CSS -->
</head>
<body class="rtl footer-fixed">
    <br><br><br>
    <div class="col-md-1"></div>
    <div class="col-md-10"> 
        <div class="row">
           
            <br><br>
            <!-- start: FORM WIZARD PANEL -->
            <div class="panel panel-default non-border">

                <div class="panel-heading cfont" >

                <i class=" clip-stack-2"></i> <?php echo '<span> '.$student_row['full_name'].' </span>';?> 
                <i class=" clip-stack-2"></i> <?php echo '<span class ="badge badge-warning">'. $student_row['student_id'] .'</span>';?> 
                    <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-expand">
                        <i class="fa fa-expand"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-close">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            
            <div class="panel-body " style="padding-top:0px !important;padding-bottom:0px !important;">
                <div class="row">
                    <div class="col-sm-12" style="padding:0px;">
                        <div class="col-sm-12" style="padding: 0px !important" >
                        <table class="table table-bordered table-hover" id="sample-table-1" >
                            <thead>
                            <tr>
                                <th class="center bfont">شماره</th>
                                <th class="left bfont">نام کتاب</th>
                                <th class="center bfont">تاریخ امانت دهی / تاریخ تحویل گیری</th>
                                <th class="left bfont">توضیحات</th>
                                <th class="left bfont">کاربر</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $count = "1";
                            if($lend_book_data->rowCount() > 0) {
                                foreach ($lend_book_data as $rows) {

                                    $book_id = $rows['book_id'];
                                    $book_data = $db->query("SELECT * FROM `books` WHERE `is_deleted` = '0' AND `id`='$book_id'");
                                    $book_row = $book_data->fetch();

                                    $user_id = $rows['user_id'];
                                    $user_data = $db->query("SELECT * FROM `users` WHERE `is_deleted` = '0' AND `id`='$user_id'");
                                    $user_row = $user_data->fetch();

                                    $deleted = '';
                                    if($user_type == "superadmin"){
                                        $deleted = '
                                                    <a href="action_category.php?delete&id='.base64_encode($rows['id']).'" class="btn btn-xs btn-bricky tooltips deleted" data-placement="top" data-original-title="Delete">
                                                        <i class=" fa fa-trash"></i>
                                                    </a>';
                                    }

                                    echo '
                                            <tr class="active">
                                                <td class = "text-center"> ' . ($count++) . ' </td>
                                                <td class = "text-right"> ' . $book_row['book_name'] . ' </td>
                                                <td class = "text-center"><span style ="color :#0037ff;"> ' .persionData($rows['date_lend']) . ' </span> / <span style ="color:#37c13b;"> ' . persionData($rows['date_delivery']) . ' </span></td>
                                                <td class = "text-right"> ' . $rows['note'] . ' </td>
                                                <td class = "text-right"> ' . $user_row['full_name'] . ' </td>
                                            </tr>
                                         ';
                                }
                            }else {
                                echo '
                                                <tr>
                                                    <td colspan="13" class="center cfont ">
                                                        <img src="img/empty.png">
                                                        <br>
                                                          کدام اطلاعاتی وجود ندارد 
                                                         <br><br>
                                                    </td>
                                                </tr>
                                            ';
                            }

                            ?>

                            <!-- echo '
                                <tr>
                                    <td colspan="13" class="center">
                                        <img src="../img/empty.png">
                                        <br>
                                         dd
                                         <br><br>
                                    </td>
                                </tr>
                                '; -->
                            </tbody>
                        </table>
                    <div class="center bfont">
                </div> <!-- COL-LG-12 -->
            </div> <!-- ROW -->
        </div>
    </div>
</div>
</div>
</div>
</div> 
<!-- start footer -->
 <?php 
 require_once("_footer.php");
 ?>
 <!-- end: FOOTER -->
 <?php 
 require_once("_script.php");
 ?>
</body>

</html>