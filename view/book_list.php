<?php 
    require_once("_config.php");
?>
<!DOCTYPE html>
<!--[if !IE]><!-->
<html class="no-js" lang="fa">
<!--<![endif]-->
<head>
    <!-- Main CSS -->
    <?php
        $PAGE_TITLE     = "Book List";
        $submenu        = "l-book_list";
        require_once("_head.php");
    ?>
</head>

<body class="rtl footer-fixed header-default">

    <!-- start: HEADER -->
    <?php
        $menu  = "LIBRARY";
        require_once("_header.php");
    ?>
    <!-- end: HEADER -->
    <!-- start: MAIN CONTAINER -->
    <div class="main-container">
         <!-- start: SIDEBAR -->
        <?php 
            $submenu    = "book_list";
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
                                <a href="">    
                                    خانه 
                                </a>
                            </li>
                             <li class="bfont">
                                <a href="javascript:(void);">    
                                    کتاب خانه 
                                </a>
                            </li>
                            <li class="active bfont">
                                لیست کتاب ها
                            </li>

                            <li class="search-box">
                                <form class="sidebar-search search-input" action="" method="GET" role="form"  >
                                    <div class="form-group ">
                                        <input type="text"  name="student" placeholder=""  class="col-sm-12 search">
                                        <button type="submit" name="search-input" >
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
                                <i class="clip-folder-open"></i>برای امتحان است 
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
                                                        <i class="green clip-stack"></i> برای امتحان است 
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="panel_tab_1">
                                                    <h4 class="bfont green"><i class="fa fa-arrow-circle-left tooltips" data-placement="left" title="" placeholder="" data-rel="tooltip" data-original-title=""></i>برای امتحان است </h4>
                                                    
                                                    <form role="form" class="form-horizontal bfont" action="ssi-class.php" method="POST" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                                                بب <span class="required">*</span>
                                                            </label>
                                                            <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                                <input type="text" autocomplete="off" id="name" name="name" required placeholder="یی" class="form-control tooltips" data-placement="top" title="یی" data-rel="tooltip" data-original-title="یی">
                                                            </div>
                                                            <p class="col-sm-12 col-md-2 col-lg-2 col-xs-12 server-validation" id="class_name_validation"> <i class="red fa fa-asterisk fa-spin"></i>صص</p>
                                                        </div>

                                                         <div class="form-group">
                                                            <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name_en">
                                                                سس <span class="required">*</span>
                                                            </label>
                                                            <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                                <input type="text" autocomplete="off" id="name_en" name="name_en" dir="ltr" required placeholder="یی" class="form-control tooltips" data-placement="top" title="یی" data-rel="tooltip" data-original-title="یی">
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="date">
                                                                هه <span class="required">*</span>
                                                            </label>
                                                            <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12 input-group" style="padding-left:15px !important; padding-right:15px !important;">
                                                                <input type="text" id="date" name="date" placeholder="نن" class="form-control tooltips date" data-placement="top" title=مم" data-rel="tooltip" data-original-title="نن" autocomplete="off">
                                                                <span class="input-group-addon" style="border-radius:0px !important;"> <i class="fa fa-calendar"></i> </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="note">
                                                                توضحیات 
                                                            </label>
                                                            <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                                <textarea type="text" id="note" name="note" rows="5" placeholder="ییی" class="form-control tooltips" data-placement="top" title="یی" data-rel="tooltip" data-original-title="یی"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label"></label>
                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                                                
                                                                <button type="submit" name="submit" class="btn btn-primary fbtn">
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
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12 col-xl-12">
                        <div class="panel panel-success non-border">
                            <div class="panel-heading">
                                <i class="clip-folder-open"></i>ff
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
                                                        <i class="fa fa-chevron-down"></i>
                                                    </a>                                                        
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse in margin-top-1">
                                                <!-- table  -->
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover" id="sample-table-1" >
                                                        <thead>
                                                            <tr>
                                                                <th class="center bfont">ww</th>
                                                                <th class="tright bfont">ss</th>
                                                                <th class="tright bfont">dd</th>
                                                                <th class="tright bfont">ss</th>
                                                                <th class="center bfont">dd</th>
                                                                <th class="center bfont">cc</th>
                                                                <th class="center bfont">cf</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr>   
                                                                <td class="tab-cen">1</td>
                                                                <td> علوم شرعی </td>
                                                                <td style="text-align:left"> شرعی </td>
                                                                <td style="text-align:lef   t"> شرعی </td>
                                                                <td class="center">   </td>
                                                                <td class="tab-cen"> 11 ثور, 1400 </td>
                                                                <td class="tab-cen center">
                                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                                        <a onclick="Edit('MTQx');" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit">
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                        <a href="ssi-class.php?delete_row=MTQx" class="btn btn-xs btn-bricky tooltips deleted" data-placement="top" data-original-title="Delete">
                                                                            <i class=" fa fa-trash"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>    
                                                                          
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