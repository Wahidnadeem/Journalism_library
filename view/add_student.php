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
    $student_data = $db->prepare("SELECT * FROM `students` WHERE `is_deleted` =:is_deleted ORDER BY id DESC LIMIT $to OFFSET $from  ");
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
    $PAGE_TITLE     = "ثبت   محصل";
    
    require_once("_head.php");
    ?>
</head>

<body class="rtl footer-fixed header-default">

    <!-- start: HEADER -->
    <?php
    $menu  = "add_student.php";
    require_once("_header.php");
    ?>
    <!-- end: HEADER -->
    <!-- start: MAIN CONTAINER -->
    <div class="main-container">
       <!-- start: SIDEBAR -->
       <?php 
       $submenu    = "add_student";
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
                            ثبت   محصل
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
                            <i class="clip-folder-open"></i> ثبت اطلاعات
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
                                                    <i class="green clip-stack"></i> ثبت  محصل جدید
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="panel_tab_1">
                                                <h4 class="bfont green"><i class="fa fa-arrow-circle-left tooltips" data-placement="left" title="" placeholder="" data-rel="tooltip" data-original-title=""></i> ثبت اطلاعات </h4>

                                                <form role="form" class="form-horizontal bfont" action="action_student.php" method="POST" enctype="multipart/form-data">

                                                    <div class="form-group" >
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                                            عکس 
                                                        </label>
                                                        <div class="col-sm-5">
                                                            <input  type="file" name="photo" id="photo" class="file tooltips" title=""  data-placement="top" data-show-preview="true"  data-rel="tooltip" data-original-title="">
                                                        </div>
                                                   </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="student_id">
                                                            آیدی محصل <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <input type="number" onblur="is_dublicate(this.value,'is_doblicate_student_id')" autocomplete="off" id="student_id" name="student_id" required placeholder="مثال : 99148" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کامل را وارد کنید">
                                                            <p id="is_doblicate_student_id" style="display:none;color:red;font-weight:bold;margin-top:40px;">* آیدی وارده تکراری می باشد ! </p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="full_name">
                                                            نام  کامل <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <input type="text" autocomplete="off" id="full_name" name="full_name" required placeholder="مثال : حمید محمدی" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کامل را وارد کنید">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="father_name">
                                                            نام  پدر <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <input type="text" autocomplete="off" id="father_name" name="father_name" required placeholder="مثال : علی احمد" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام پدر را وارد کنید">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="graduate_year">
                                                            سال فراغت <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12 input-group" style="padding-left:15px !important; padding-right:15px !important;">
                                                            <input type="text" id="graduate_year" name="graduate_year" class="form-control tooltips date" data-placement="top" title="" data-rel="tooltip" data-original-title="این فیلد لازمی هست" autocomplete="off">
                                                            <span class="input-group-addon" style="border-radius:0px !important;"> <i class="fa fa-calendar"></i> </span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="phone">
                                                            شماره تماس <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <input type="number" autocomplete="off" id="phone" name="phone" required placeholder="مثال : 0799090909" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام پدر را وارد کنید">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="email">
                                                            ایمیل آدرس 
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <input type="email" autocomplete="off" id="email" name="email" placeholder="مثال : admin@gmail.com" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام پدر را وارد کنید">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="date">
                                                            تاریخ <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12 input-group" style="padding-left:15px !important; padding-right:15px !important;">
                                                            <input type="text" id="date" name="date" class="form-control tooltips date" data-placement="top" title="" data-rel="tooltip" data-original-title="این فیلد لازمی هست" autocomplete="off">
                                                            <span class="input-group-addon" style="border-radius:0px !important;"> <i class="fa fa-calendar"></i> </span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="note">
                                                            توضیحات 
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <textarea type="text" id="note" name="note" rows="5" placeholder="این فیلد لازمی  نیست" class="form-control tooltips" data-placement="top" title="این فیلد لازمی نیست" data-rel="tooltip" data-original-title="این فیلد لازمی نیست"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                            <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label"></label>
                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                                                
                                                                <button type="submit" name="insert" class="btn btn-primary fbtn">
                                                                    <i class="clip-stack-empty"> </i>
                                                                    <span class="ladda-label"> ذخیره  </span>
                                                                </button>

                                                                <button type="reset" class="btn btn-danger fbtn">
                                                                    <i class="clip-spinner-4"> </i>
                                                                    <span class="ladda-label"> لغو  </span>
                                                                </button>
                                                                
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
            <form action="" method="post" role="form" class="form-horizontal">
                <!-- SEARCH BOX -->
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12 col-xl-12">
                        <div class="panel panel-success non-border">
                            <div class="panel-body unset-margin">
                                <div class="row">
                                    <div class="col-md-12">
                                        <P class="bfont" style="background:#988959;border-bottom:0px solid #988959;color:white;position:relative;bottom:0px;width:100%;padding:5px;">&nbsp;&nbsp; <i class="fa fa-search"></i> جستجو </P>
                                        <div id="collapsesix" class="panel-collapse collapse in">
                                            <!-- table  -->
                                            <div class="table-responsive ">
                                                <table class="table table-hover scroll" style="width:99%;margin:auto;border:1px solid whitesmoke;">
                                                    <tr>
                                                        <th class="tright bold bfont" style="padding-right:10px !important;"> آیدی   </th>
                                                        <th class="tright bold bfont" style="padding-right:10px !important;"> نام   </th>
                                                        <th class="tright bold bfont" style="padding-right:10px !important;"> نام پدر  </th>
                                                        <th class="tright bold bfont" style="padding-right:10px !important;">  تماس  </th>
                                                        <th></th>
                                                    </tr>

                                                    <tr>
                                                        <input type="hidden" name="search" value="1">
                                                        <td class="tright bold bfont" style="padding-right:10px !important;min-width:150px;">
                                                            <input type="text" value="<?php if(isset($_POST['s_id'])) echo VD($_POST['s_id']) ?>" autocomplete="off" id="s_id" name="s_id" class="form-control tooltips" data-placement="top" title="" data-rel="tooltip" data-original-title="نام کتاب ">
                                                        </td>
                                                        <td class="tright bold bfont" style="padding-right:10px !important;min-width:150px;">
                                                            <input type="text" autocomplete="off" value="<?php if(isset($_POST['s_name'])) echo VD($_POST['s_name']) ?>" id="s_name" name="s_name" class="form-control tooltips" data-placement="top" title="" data-rel="tooltip" >
                                                        </td>

                                                        <td class="tright bold bfont" style="padding-right:10px !important;min-width:150px;">
                                                            <input type="text" autocomplete="off" id="s_fname"  value="<?php if(isset($_POST['s_fname'])) echo VD($_POST['s_fname']) ?>"  name="s_fname" class="form-control tooltips" data-placement="top" title="" data-rel="tooltip" >
                                                        </td>
                                                        <td class="tright bold bfont" style="padding-right:10px !important;min-width:150px;">
                                                            <input type="text" autocomplete="off" id="s_phone" value="<?php if(isset($_POST['s_phone'])) echo VD($_POST['s_phone']) ?>" name="s_phone" class="form-control tooltips" data-placement="top" title="" data-rel="tooltip" >
                                                        </td>
                                                        <td class="tright bold bfont" style="padding-right:10px !important;min-width:100px;">
                                                            <button  type="submit"  title="" name="search" class="pointer no-underline btnc btnc-info  fancy-button center cbsearch" ><i class="clip-search-3 bold"></i> جستجو </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- /end table -->
                                        </div>
                                        <P style="background:#988959;border-bottom:0px solid #988959;color:white;position:relative;bottom:-11px;width:100%;">&nbsp;</P>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END -->
                    </div> <!-- COL-LG-12 -->
                </div> <!-- ROW -->
            </form>
            <!-- start: PAGE CONTENT -->

              <?php
             $record_table = $db->query("SELECT COUNT(id) AS number FROM `students` WHERE is_deleted = '0' LIMIT $to OFFSET $from ")->fetch(); 

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
                                                            <th class="center bfont"> آیدی محصل </th>
                                                            <th class="left bfont">نام کامل</th>
                                                            <th class="left bfont">نام  پدر</th>
                                                            <th class="center bfont">سال فراغت</th>
                                                            <th class="center bfont">شماره تماس</th>
                                                            <th class="left bfont">ایمیل آدرس</th>
                                                            <th class="left bfont">تعداد کتاب قرض گرفته</th>
                                                            <th class="center bfont"> تاریخ </th>
                                                            <th class="center bfont">توضیحات</th>
                                                            <?php if($user_type != "user"){ ?>
                                                                <th class="center bfont">عملیات</th>
                                                            <?php } ?>                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                         <?php
                                                         $count = "1";
                                                            if($student_data->rowCount() > 0) {
                                                                foreach ($student_data as $rows) {

                                                                    $id = $rows['id'];
                                                                    $lend_data = $db->query("SELECT COUNT(id) AS number , student_id , book_id , date_lend , date_delivery , note , is_deleted FROM `lending_book` WHERE `is_deleted` = '0' AND `student_id`='$id'");
                                                                    $lend_row = $lend_data->fetch();


                                                                    $deleted = '';
                                                                    if($user_type == "superadmin"){
                                                                        $deleted = '
                                                                            <a href="action_student.php?delete&id='.base64_encode($rows['id']).'" class="btn btn-xs btn-bricky tooltips deleted" data-placement="top" data-original-title="Delete">
                                                                                <i class=" fa fa-trash"></i>
                                                                            </a>';
                                                                    }
                
                                                                    $action = '';
                                                                    if($user_type != 'user'){
                                                                        $action = 
                                                                            '<td class="tab-cen center">
                                                                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                                                    <a href="edit_student.php?id='.base64_encode($rows['id']).'" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit">
                                                                                        <i class="fa fa-edit"></i>
                                                                                    </a>
                                                                                    '.$deleted.'
                                                                                </div>
                                                                            </td>';
                                                                    }

                                                                    echo '
                                                                    <tr class="active">
                                                                        <td class = "text-center"> ' . ($count++) . ' </td>
                                                                        <td class = "text-center"><span class ="badge badge-warning"> ' . $rows['student_id'] . ' </span></td>
                                                                        <td class = "text-right"> ' . $rows['full_name'] . ' </td>
                                                                        <td class = "text-right"> ' . $rows['father_name'] . ' </td>
                                                                        <td class = "text-center"> ' . $rows['graduate_year'] . ' </td>
                                                                        <td class = "text-center"> ' . $rows['phone'] . ' </td>
                                                                        <td class = "text-right"> ' . $rows['email'] . ' </td>
                                                                        <td class = "text-center"> <a class="bold custom-green" style="cursor: pointer;text-decoration:none;" onclick="details_quntity_lend_book(\'details_quntity_lend_book.php?id='.base64_encode($rows['id']).' \')" >  '.$lend_row['number'].'</a> </td>
                                                                        <td class = "text-center"> ' .persionData($rows['date']) . ' </td>
                                                                        <td class = "text-center"> ' . $rows['note'] . ' </td>
                                                                        '.$action.'

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

                        <script type="text/javascript">
                             function details_quntity_lend_book(location){
                                window.open(location,'AfghanVTeam Journalism Library','width=1000,height=600,scrollbars,resizable');
                            }

                        </script>



</body>
</html >