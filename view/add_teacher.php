<?php 
require_once("_config.php");

    $teacher_data = $db->prepare('SELECT * FROM `teachers` WHERE `is_deleted` =:is_deleted ORDER BY id DESC ');
    $teacher_data->execute(['is_deleted' => 0]);
?>
<!DOCTYPE html>
<!--[if !IE]><!-->
<html class="no-js" lang="fa">
<!--<![endif]-->
<head>
    <!-- Main CSS -->
    <?php
    $PAGE_TITLE     = "ثبت   استاد";
    
    require_once("_head.php");
    ?>
</head>

<body class="rtl footer-fixed header-default">

    <!-- start: HEADER -->
    <?php
    $menu  = "add_teacher.php";
    require_once("_header.php");
    ?>
    <!-- end: HEADER -->
    <!-- start: MAIN CONTAINER -->
    <div class="main-container">
       <!-- start: SIDEBAR -->
       <?php 
       $submenu    = "add_teacher";
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
                            ثبت   استاد 
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
                                                    <i class="green clip-stack"></i> ثبت   استاد جدید
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="panel_tab_1">
                                                <h4 class="bfont green"><i class="fa fa-arrow-circle-left tooltips" data-placement="left" title="" placeholder="" data-rel="tooltip" data-original-title=""></i> ثبت اطلاعات </h4>

                                                <form role="form" class="form-horizontal bfont" action="action_teacher.php" method="POST" enctype="multipart/form-data">

                                                    <div class="form-group" >
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="photo">
                                                            عکس <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-5">
                                                            <input  type="file" name="photo" id="photo" class="file tooltips" title=""  data-placement="top" data-show-preview="true"  data-rel="tooltip" data-original-title="">
                                                        </div>
                                                   </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="teacher_id">
                                                            آیدی  استاد <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <input type="number" onblur="is_dublicate(this.value,'is_doblicate_teacher_id')" autocomplete="off" id="teacher_id" name="teacher_id" required placeholder="مثال : 100" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کامل را وارد کنید">
                                                             <p id="is_doblicate_teacher_id" style="display:none;color:red;font-weight:bold;margin-top:40px;">* آیدی وارده تکراری می باشد ! </p>
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
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="department">
                                                            دیپارتمنت <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <input type="text" autocomplete="off" id="department" name="department" required placeholder="" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام پدر را وارد کنید">
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
                                                            ایمیل آدرس <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <input type="email" autocomplete="off" id="email" name="email" required placeholder="مثال : admin@gmail.com" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام پدر را وارد کنید">
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
            <!-- start: PAGE CONTENT -->

             <?php
             $record_table = $db->query("SELECT COUNT(id) AS number FROM `teachers` WHERE is_deleted = '0' LIMIT $to OFFSET $from ")->fetch(); 

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
                                                            <th class="center bfont"> آیدی  استاد </th>
                                                            <th class="left bfont">نام کامل</th>
                                                            <th class="left bfont">نام  پدر</th>
                                                            <th class="left bfont">دیپارتمنت</th>
                                                            <th class="center bfont">شماره تماس</th>
                                                            <th class="left bfont">ایمیل آدرس</th>
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
                                                            if($teacher_data->rowCount() > 0) {
                                                                foreach ($teacher_data as $rows) {

                                                                    $deleted = '';
                                                                    if($user_type == "superadmin"){
                                                                        $deleted = '
                                                                            <a href="action_teacher.php?delete&id='.base64_encode($rows['id']).'" class="btn btn-xs btn-bricky tooltips deleted" data-placement="top" data-original-title="Delete">
                                                                                <i class=" fa fa-trash"></i>
                                                                            </a>';
                                                                    }
                
                                                                    $action = '';
                                                                    if($user_type != 'user'){
                                                                        $action = 
                                                                            '<td class="tab-cen center">
                                                                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                                                    <a href="edit_teacher.php?id='.base64_encode($rows['id']).'" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit">
                                                                                        <i class="fa fa-edit"></i>
                                                                                    </a>
                                                                                    '.$deleted.'
                                                                                </div>
                                                                            </td>';
                                                                    }

                                                                    echo '
                                                                    <tr class="active">
                                                                        <td class = "text-center"> ' . ($count++) . ' </td>
                                                                        <td class = "text-center"> <span class ="badge badge-warning"> ' . $rows['teacher_id'] . '</span> </td>
                                                                        <td class = "text-right"> ' . $rows['full_name'] . ' </td>
                                                                        <td class = "text-right"> ' . $rows['father_name'] . ' </td>
                                                                        <td class = "text-right"> ' . $rows['department'] . ' </td>
                                                                        <td class = "text-center"> ' . $rows['phone'] . ' </td>
                                                                        <td class = "text-right"> ' . $rows['email'] . ' </td>
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

</body>
</html >