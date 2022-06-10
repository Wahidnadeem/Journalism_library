<?php
require_once("_config.php");

$lend_book_data = $db->prepare("SELECT * FROM `lending_book` WHERE `is_deleted` =:is_deleted AND `status` =:status  ORDER BY id DESC LIMIT $to OFFSET $from ");
$lend_book_data->execute(['is_deleted' => 0,'status' => 'done']);

$list_data  = $db->query("SELECT count(id) as record FROM lending_book WHERE is_deleted = 0")->fetch();
$record     = $list_data['record'];


?>
<!DOCTYPE html>
<!--[if !IE]><!-->
<html class="no-js" lang="fa">
<!--<![endif]-->
<head>
    <!-- Main CSS -->
    <?php
    $PAGE_TITLE     = "تحویل گیری کتاب";

    require_once("_head.php");
    ?>
</head>

<body class="rtl footer-fixed header-default">

<!-- start: HEADER -->
<?php
$menu  = "return_book.php";
require_once("_header.php");
?>
<!-- end: HEADER -->
<!-- start: MAIN CONTAINER -->
<div class="main-container">
    <!-- start: SIDEBAR -->
    <?php
    $submenu    = "return_book";
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
                            تحویل گیری کتاب
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
                <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12 col-xl-12">
                    <div class="panel panel-default non-border">
                        <div class="panel-heading bfont">
                            <i class="clip-folder-open"></i> تحویل گیری کتاب
                            <div class="panel-tools">
                                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                                <a class="btn btn-xs btn-link panel-expand" href="#">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a class="btn btn-xs btn-link panel-close" href="#">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 unset-padding">
                                    <div class="tabbable">
                                        <ul id="myTab" class="nav nav-tabs tab-bricky bfont">
                                            <li class="active">
                                                <a href="#panel_tab_1" data-toggle="tab" aria-expanded="true">
                                                    <i class="green clip-stack"></i> تحویل گیری کتاب
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="panel_tab_1">
                                                <p class="bfont" style="color: white;padding: 3px;border-radius: 3px;background: #036f3e"  >
                                                    <i class="fa fa-book" ></i>&nbsp;کتاب های در حال امانت
                                                </p>

                                                <div class="row">
                                                    <?php


                                                    $lending_book_data = $db->prepare('SELECT * FROM `lending_book` WHERE `is_deleted` =:is_deleted AND `status` = :status ORDER BY date_delivery  ');
                                                    $lending_book_data->execute(['is_deleted' => 0 , 'status' => 'pending']);

                                                    if($lending_book_data->rowCount() > 0 ){

                                                        foreach ( $lending_book_data as $item) {

                                                            $bookInfo = selectOne('books',$item['book_id']);
                                                            $studentInfo = selectOne('students',$item['student_id']);

                                                            $remainClass = "";
                                                            if( (strtotime($PDATE) - strtotime($item['date_delivery'] )) <  0 ){
                                                                $remainClass=" background:#036f3e ";
                                                            }else {
                                                                $remainClass="background:#e63f47";
                                                            }

                                                            echo '<div class="col-sm-6 col-lg-4 col-md-6 col-xs-12 col-xl-12">
                                                        <a title="" class="pointer  btn btn-primary center white" style="margin-bottom:0px;border-bottom:unset;'.$remainClass.'"><i class="clip-books bold"></i>('.$item['date_delivery'].')  روز تحویل گیری  </a>
                                                        <div class="panel panel-success non-border">
                                                            <div class="panel-heading bfont" style="padding-right:10px;background:#f6f6f6 !important;">
                                                                '.$bookInfo['book_name'].' <span style="color:#FF5722">['.$bookInfo['book_code'].']</span>
                                                                <div class="panel-tools">
                                                                    <a class="btn btn-xs btn-link panel-collapse collapses">
                                                                        <i class="fa fa-chevron-down"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="panel-body unset-margin">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="panel-body" style="min-height:250px;max-height:250px;overflow:auto; >
    
                                                                            <p style=" padding-bottom:10px;"="">محصل :  <span class="teacher-hover" style="color:#364f6a;font-weight:bold;background:unset;font-weight:bold;cursor:pointer;border-radius:0px;padding:3px !important;">'.$studentInfo['full_name'].'  '.$studentInfo['father_name'].'(<span class="text-danger" >'.$studentInfo['student_id'].'</span>)</span>&nbsp; <p></p>
                                                                            <form method="post" class="result-forms">
                                                                                <div class="col-md-12" style="float:unset;padding:0px !important;">
                                                                                    <div class="col-md-6" style="padding:1px !important;">
                                                                                        <table class="table table-bordered table-striped table-hover" dir="rtl">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <th class="tright" style="color:#009688">تاریخ امانت دهی</th>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="tright text-info ">
                                                                                                        '.persionData($item['date_lend']).'
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        </div>
                                                                                        <div class="col-md-6" style="padding:1px !important;">
                                                                                            <table class="table table-bordered table-striped table-hover" dir="rtl">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <th class="tright" style="color:#009688">تاریخ تحویل دهی  </th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="tright text-warning " >
                                                                                                           '.persionData($item['date_delivery']).'
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody></table>
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                         <p style="color:green" >  توضیحات:  </p>
                                                                                         <p style="font-style:italic" >'.$item['note'].'</p>
                                                                                         
                                                                                         <p class="bg-success"   id="r-'.$item['id'].'" ></p>
                                                                                         
                                                                                        <table style="position:absolute;bottom:10px;" >
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <a  href="action_return_book.php?returnBook&id='.base64_encode($item['id']).'" class="pointer btn btn-default center bfont get_book " style="color:#2a798f;font-weight:bold;"><i class="clip-stack-empty bold"> </i>تحویل گیری </a>
                                                                                                </td>
                                                                                                <td style="padding-right: 5px">
                                                                                                    <a href="alternative_book.php?id='.base64_encode($item['id']).'" class="pointer btn btn-default center bfont" style="color:#2a798f;font-weight:bold;"><i class="clip-stack-empty bold"> </i> بدیل کتاب   </a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        ';
                                                        }


                                                    }else {
                                                        echo " 
                                                        <p class='text-center'>
                                                           <img src='../img/empty.png'>
                                                           کدام کتابی به امانت گرفته نشده است 
                                                           <br>
                                                           <br><br>
                                                        </p>
                                                    ";
                                                    }


                                                    ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END -->
                </div> <!-- COL-LG-12 -->
            </div> <!-- ROW -->
            <!-- end: PAGE CONTENT-->
            <!-- start: PAGE -->
            <!-- start: PAGE CONTENT -->

            <?php
                $record_table = $db->query("SELECT COUNT(id) AS number FROM `lending_book` WHERE is_deleted = '0' AND status = 'done' LIMIT $to OFFSET $from ")->fetch();
            ?>

            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12 col-xl-12">
                    <div class="panel panel-success non-border">
                        <div class="panel-heading">
                            <i class="clip-folder-open"></i>لیست اطلاعات موجود
                            <div class="panel-tools">
                                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                                <a class="btn btn-xs btn-link panel-expand" href="#">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a class="btn btn-xs btn-link panel-close" href="#">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>

                        </div>

                        <div class="panel-body unset-margin" >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel-group accordion-custom accordion-teal" id="accordion">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle bfont" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                    <i class="fa fa-chevron-down"></i> نمایش ریکارد های موجود [ <span style="color: red;"><?php echo $record_table['number']; ?></span> ] <?php echo $record_table['number']; ?> از مجموع ۶۱
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse in margin-top-1">
                                            <!-- table  -->
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover" id="sample-table-1" >
                                                    <thead>
                                                    <tr>

                                                        <th class="center bfont">شماره</th>
                                                        <th class="left bfont">نام  محصل</th>
                                                        <th class="left bfont">نام کتاب</th>
                                                        <th class="center bfont">تاریخ امانت دهی / تاریخ تحویل گیری</th>
                                                        <th class="left bfont"> تاریخ تحویل گیری </th>
                                                        <th class="left bfont">توضیحات</th>
                                                        <th class="center bfont">عملیات</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    $count = "1";
                                                    if($lend_book_data->rowCount() > 0) {
                                                        foreach ($lend_book_data as $rows) {

                                                            $student_row = selectOne('students',$rows['student_id']);
                                                            $book_row = selectOne('books',$rows['book_id']);

                                                            echo '
                                                                    <tr class="active">
                                                                        <td class = "text-center"> ' . ($count++) . ' </td>
                                                                        <td class = "text-right"> ' . $student_row['full_name'] . ' <span class ="badge badge-warning"> ' . $student_row['student_id'] . ' </span> </td>
                                                                        <td class = "text-right"> ' . $book_row['book_name'] . ' </td>
                                                                        <td class = "text-center"><span style ="color :#0037ff;"> ' .persionData($rows['date_lend']) . ' </span> / <span style ="color:#37c13b;"> ' . persionData($rows['date_delivery']) . ' </span></td>
                                                                        <td class = "text-right"> ' . persionData($rows['return_date']) . ' </td>
                                                                        <td class = "text-right"> ' . $rows['note'] . ' </td>
                                                                           <td class="tab-cen center">
                                                                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                                                    <a href="action_return_book.php?deleted&id='.base64_encode($rows['id']).'" class="btn btn-xs btn-bricky tooltips deleted" data-placement="top" data-original-title="Delete">
                                                                                        <i class=" fa fa-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
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

                                                    </tbody>
                                                </table>

                                                <br>
                                                <div style="text-align: center;">
                                                    <?php
                                                    $pagination->records($record);
                                                    $pagination->records_per_page($records_per_page);
                                                    // render the pagination links
                                                    if($record>60){
                                                        $pagination->render();
                                                    }

                                                    ?>
                                                </div><br>

                                                <div class="center bfont">

                                                </div>
                                            </div>
                                            <!-- /end table -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- COL-LG-12 -->
            </div> <!-- ROW -->
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

        <script>

            $(document).ready(function () {
                $(".get_book").click(function(){
                    var confirms = confirm(" کتاب تحویل گرفته شد .");
                    if(confirms){
                        window.location = $("a").attr("href");
                    }else{
                        return false;
                    }
                });
            });

        </script>

</body>
</html >