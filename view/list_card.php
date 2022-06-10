<?php 
require_once("_config.php");


if(isset($_POST['search'])){

    $condation = '';

    if(!empty($_POST['s_name'])){
        $s_name = VD($_POST['s_fname']);
        $condation .= " AND `full_name` LIKE '%$s_name%' ";
    }

    if(!empty($_POST['s_id'])){
        $s_id = VD($_POST['s_id']);
        $condation .= " AND `student_id` = '$s_id' ";
    }

    if(!empty($_POST['s_fname'])){
        $s_fname = VD($_POST['s_fname']);
        $condation .= " AND `father_name` LIKE '%$s_fname%' ";
    }

    if(!empty($_POST['s_phone'])){
        $s_phone = VD($_POST['s_phone']);
        $condation .= " AND `phone` LIKE '%$s_phone%' ";
    }

    $student_data = $db->prepare("SELECT * FROM `students` WHERE `is_deleted` =:is_deleted $condation ORDER BY id DESC LIMIT $to OFFSET $from ");
    $student_data->execute(['is_deleted' => 0]);

    $list_data  = $db->query("SELECT count(id) as record FROM students WHERE is_deleted = 0")->fetch();
    $record     = $list_data['record'];

}else {
    $student_data = $db->prepare("SELECT * FROM `students` WHERE `is_deleted` =:is_deleted ORDER BY id DESC LIMIT $to OFFSET $from ");
    $student_data->execute(['is_deleted' => 0]);

    $list_data  = $db->query("SELECT count(id) as record FROM students WHERE is_deleted = 0")->fetch();
    $record     = $list_data['record'];
}

?>
<!DOCTYPE html>
<!--[if !IE]><!-->
<html class="no-js" lang="fa">
<!--<![endif]-->
<head>
    <!-- Main CSS -->
    <?php
    $PAGE_TITLE     = "چاپ کارت محصل";
    
    require_once("_head.php");
    ?>
</head>

<body class="rtl footer-fixed header-default">

    <!-- start: HEADER -->
    <?php
    $menu  = "list_card.php";
    require_once("_header.php");
    ?>
    <!-- end: HEADER -->
    <!-- start: MAIN CONTAINER -->
    <div class="main-container">
       <!-- start: SIDEBAR -->
       <?php 
       $submenu    = "list_card";
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
                            ثبت   محصلین 
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
                            <i class="clip-folder-open"></i> جستجو
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
                                                    <i class="green clip-stack"></i>  جستجو معصل
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="panel_tab_1">
                                                <h4 class="bfont green"><i class="fa fa-search tooltips" data-placement="left" title="" placeholder="" data-rel="tooltip" data-original-title=""></i> جستجو اطلاعات </h4>

                                                <form role="form" class="form-horizontal bfont" action="" method="POST" enctype="multipart/form-data">

                                                    <input type="hidden" name="search">
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="s_id">
                                                            آیدی
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <input type="text" autocomplete="off"  value="<?php if(isset($_POST['s_id'])) echo VD($_POST['s_id']) ?>" id="s_id" name="s_id" placeholder="" class="form-control tooltips" data-placement="top" >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="s_name">
                                                            نام کامل
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <input type="text" autocomplete="off" value="<?php if(isset($_POST['s_name'])) echo VD($_POST['s_name']) ?>" id="s_name" name="s_name"  class="form-control tooltips">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="s_fname">
                                                            نام پدر
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <input type="text" autocomplete="off" value="<?php if(isset($_POST['s_fname'])) echo VD($_POST['s_fname']) ?>" id="s_fname" name="s_fname"  class="form-control tooltips">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="s_phone">
                                                            تماس
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <input type="text" autocomplete="off" value="<?php if(isset($_POST['s_phone'])) echo VD($_POST['s_phone']) ?>" id="s_phone" name="s_phone"  class="form-control tooltips">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label"></label>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">

                                                            <button type="submit" name="insert" class="btn btn-primary fbtn">
                                                                <i class="fa fa-search"> </i>
                                                                <span class="ladda-label"> جستجو  </span>
                                                            </button>

                                                            <a href="list_card.php" class="btn btn-danger fbtn">
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
                </div>
            </div>

<<<<<<< HEAD
                <a href="printcard.php" class="bfont pointer btnc btnc-primary btnc-outline fancy-button btnc-0" style="text-decoration: none" target="_blank" id="printcard">
=======
                <a class="bfont pointer btnc btnc-primary btnc-outline fancy-button btnc-0" style="text-decoration: none" target="_blank" id="printcard">
>>>>>>> cae0e241775e0ab868c52302c2e7669840051083
                    <i class="fa fa-print"></i>&nbsp;
                    <span class="ladda-label">چاپ کارت  </span>&nbsp;
                </a>


    <!-- <div class="row"> -->

            <?php
             $record_table = $db->query("SELECT COUNT(id) AS number FROM `students` WHERE is_deleted = '0'LIMIT $to OFFSET $from ")->fetch(); 

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
                                            <form action="k-card.php" target="_blank" id="print_form_card" method="post">
                                            <table class="table table-bordered table-hover" id="sample-table-1" >
                                                    <thead>
                                                        <tr>
                                                            <th class="center bfont">شماره</th>
                                                            <th class="center bfont"> آیدی محصل </th>
                                                            <th class="left bfont">نام کامل</th>
                                                            <th class="left bfont">نام  پدر</th>
                                                            <th class="center bfont">سال فراغت</th>
                                                            <th class="center bfont">شماره تماس</th>
                                                            <th class="left bfont">ایمیل آدرس</th>
                                                            <th class="center bfont"> تاریخ </th>
                                                            <th class="left bfont">توضیحات</th>
                                                            <th class="center" style="padding-right:10px !important;">
                                                            <input type="checkbox" class="orange" id="print_all" > 
                                                            </th>
                                                            </tr>
                                                    </thead>
                                                    <tbody>

                                                 <?php
                                                 $count = "1";
                                                    if($student_data->rowCount() > 0) {
                                                        foreach ($student_data as $rows) {
                                                            echo '
                                                            <tr class="active">
                                                                <td class = "text-center"> ' . ($count++) . ' </td>
                                                                <td class = "text-center"><span class ="badge badge-warning"> ' . $rows['student_id'] . ' </span></td>
                                                                <td class = "text-right"> ' . $rows['full_name'] . ' </td>
                                                                <td class = "text-right"> ' . $rows['father_name'] . ' </td>
                                                                <td class = "text-center"> ' . $rows['graduate_year'] . ' </td>
                                                                <td class = "text-center"> ' . $rows['phone'] . ' </td>
                                                                <td class = "text-right"> ' . $rows['email'] . ' </td>
                                                                <td class = "text-center"> ' .persionData($rows['date']) . ' </td>
                                                                <td class = "text-right"> ' . $rows['note'] . ' </td>

                                                                  <td class="center" style="padding-right:10px !important;">
                                                                         <input type="checkbox" class="is_print orange" value="'.base64_encode($rows['id']).'" name="chackbox_select[]"> 
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
                                            </form>

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
    <!-- /Main Script -->

<script type="text/javascript">
$('#print_all').on('ifChecked', function(event){
$(".is_print").iCheck('check');
});

$('#print_all').on('ifUnchecked', function(event){
$(".is_print").iCheck('uncheck');
});
$(document).ready(function(){
    $("#printcard").click(function(){
        $("#print_form_card").submit();
    });
});
</script>


</body>
</html >