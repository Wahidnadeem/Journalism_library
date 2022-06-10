<?php
require_once("_config.php");



if(!empty($_POST['search'])){

    $condition  = '';
    $student_id = VD($_POST['student_id']);
    $book_id    = VD($_POST['book_id']);
    $start_date = VD($_POST['start_date']);
    $end_date   = VD($_POST['end_date']);


    if(!empty($student_id)){
        $condition .= " AND `student_id` =  '$student_id' ";
    }

    if(!empty($book_id)){
        $condition .= " AND `book_id` =  '$book_id' ";
    }

    if(!empty($start_date) && !empty($end_date)){
        $condition .= "AND date BETWEEN '$start_date' AND '$end_date' ";
    }

//    echo  "SELECT * FROM `alternative_books` WHERE `is_deleted` =:is_deleted $condition ORDER BY id DESC LIMIT $to OFFSET $from ";
//    exit();


    $row_data = $db->prepare("SELECT * FROM `alternative_books` WHERE `is_deleted` =:is_deleted $condition ORDER BY id DESC LIMIT $to OFFSET $from ");
    $row_data->execute(['is_deleted' => 0]);

}else{
    $row_data = $db->prepare("SELECT * FROM `alternative_books` WHERE `is_deleted` =:is_deleted ORDER BY id DESC LIMIT $to OFFSET $from ");
    $row_data->execute(['is_deleted' => 0]);
}


?>
<!DOCTYPE html>
<!--[if !IE]><!-->
<html class="no-js" lang="fa">
<!--<![endif]-->
<head>
    <!-- Main CSS -->
    <?php
    $PAGE_TITLE     = "لیست بدیل کتاب  ";
    require_once("_head.php");
    ?>
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
                            لیست بدیل کتاب
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
                            <i class="clip-folder-open"></i>  جستجو اطلاعات
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
                                                    <i class="green clip-stack"></i>  جستجو
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="panel_tab_1">
                                                <h4 class="bfont green"><i class="fa fa-arrow-circle-left tooltips" data-placement="left" title="" placeholder="" data-rel="tooltip" data-original-title=""></i> جستجو  اطلاعات </h4>

                                                <form role="form" class="form-horizontal bfont" action="" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="search" value="1">
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="student_id">
                                                            نام محصل
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <select id="student_id"   name="student_id"  class="form-control tooltips select2"   data-placement="top" title="" data-rel="tooltip" data-original-title="">
                                                                <option value=""  >یکی را انتخاب کنید</option>
                                                                <?php
                                                                $student = $db->prepare('SELECT * FROM students WHERE `is_deleted` =:is_deleted');
                                                                $student->execute(['is_deleted' => 0]);
                                                                foreach ($student as $studen_rows){
                                                                    echo '<option value="'.$studen_rows['id'].'"> '.$studen_rows['student_id'].'-'.$studen_rows['full_name'].' </option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="book_id">
                                                            انتخاب کتاب
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12 input-group" style="padding-left:15px !important; padding-right:15px !important;">
                                                            <select id="book_id"  name="book_id"  class="form-control tooltips select2" data-placement="top" title="" data-rel="tooltip" data-original-title="">
                                                                <option  value="" >یکی را انتخاب کنید</option>
                                                                <?php
                                                                $book = $db->prepare('SELECT * FROM books WHERE `is_deleted` =:is_deleted');
                                                                $book->execute(['is_deleted' => 0]);
                                                                foreach ($book as $book_rows){
                                                                    echo '<option value="'.$book_rows['id'].'"> '.$book_rows['book_name'].' </option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="start_date">
                                                            تاریخ شروع
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12 input-group" style="padding-left:15px !important; padding-right:15px !important;">
                                                            <input type="text" value="" id="start_date" name="start_date" class="form-control tooltips  date_val"  autocomplete="off">
                                                            <span class="input-group-addon" style="border-radius:0px !important;"> <i class="fa fa-calendar"></i> </span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="end_date">
                                                            تاریخ ختم
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12 input-group" style="padding-left:15px !important; padding-right:15px !important;">
                                                            <input type="text" id="end_date" name="end_date" class="form-control tooltips date_val"  autocomplete="off">
                                                            <span class="input-group-addon" style="border-radius:0px !important;"> <i class="fa fa-calendar"></i> </span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label"></label>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">

                                                            <button type="submit"  class="btn btn-primary fbtn">
                                                                <i class="fa fa-search"> </i>
                                                                <span class="ladda-label"> جستجو   </span>
                                                            </button>

                                                            <a href="list_alternative_book.php" class="btn btn-danger fbtn">
                                                                <i class="clip-spinner-4"> </i>
                                                                <span class="ladda-label"> تازه سازی   </span>
                                                            </a>

                                                        </div>
                                                    </div>

                                                </form>
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
                                                    <i class="fa fa-chevron-down"></i> نمایش ریکارد های موجود [ <span style="color: red;"><?php echo $row_data->rowCount(); ?></span> ] <?php echo $row_data->rowCount(); ?> از مجموع ۶۱
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
                                                        <th class="center tright">تاریخ امانت دهی </th>
                                                        <th class="left bfont"> تاریخ  </th>
                                                        <th class="left bfont">توضیحات</th>
                                                        <th class="center bfont">عملیات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $count = "1";
                                                    if($row_data->rowCount() > 0) {
                                                        foreach ($row_data as $rows) {

                                                            $student_row        = selectOne('students',$rows['student_id']);
                                                            $book_row           = selectOne('books',$rows['book_id']);
                                                            $lending_book_row   = selectOne('lending_book',$rows['lending_id']);

                                                            echo '
                                                                    <tr class="active">
                                                                        <td class = "text-center"> ' . ($count++) . ' </td>
                                                                        <td class = "text-right"> ' . $student_row['full_name'] . ' <span class ="badge badge-warning"> ' . $student_row['student_id'] . ' </span> </td>
                                                                        <td class = "text-right"> ' . $book_row['book_name'] . ' </td>
                                                                        <td class = "text-right"> ' . persionData($lending_book_row['date_lend']) . ' </td>
                                                                        <td class = "text-right"> ' . persionData($rows['date']) . ' </td>
                                                                        <td class = "text-right"> ' . $rows['note'] . ' </td>
                                                                           <td class="tab-cen center">
                                                                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                                                    <a href="action_alternative.php?deleted&id='.base64_encode($rows['id']).'" class="btn btn-xs btn-bricky tooltips deleted" data-placement="top" data-original-title="Delete">
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
                                                    //                                                    $pagination->records($record);
                                                    //                                                    $pagination->records_per_page($records_per_page);
                                                    //                                                    // render the pagination links
                                                    //                                                    if($record>60){
                                                    //                                                        $pagination->render();
                                                    //                                                    }

                                                    ?>
                                                </div><br>
                                                <div class="center bfont">
                                                </div>
                                            </div><!-- /end table -->
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
        <script>
            $(".date").val('');
        </script>
        <!-- /Main Script -->
</body>
</html >