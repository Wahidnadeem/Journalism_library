<?php 
require_once("_config.php");

    if (isset($_GET['id'])) {
        $id              = base64_decode($_GET['id']);
        $view            = $db->query("SELECT * FROM `categories` WHERE `is_deleted` = '0' AND `id`='$id'");
        $category_edit   = $view->fetch();
    }
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
</head>

<body class="rtl bg-pic fixed-bg">
            <br><br>
        <!-- start: PAGE CONTENT -->
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-sm-8 col-lg-8 col-md-8 col-xs-8 col-xl-8">                        
                    <div class="panel panel-default non-border">
                        <div class="panel-heading bfont">
                            <i class="clip-folder-open"></i> ویرایش اطلاعات
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
                        <div>
                            <div class="row">
                                <div class=" unset-padding">
                                    <div class="tabbable">
                                        <div class="">
                                            <div class="tab-pane active" id="panel_tab_1">
                                                <br>
                                                <h4 class="bfont green" style="position: relative;right: 30px"><i class="fa fa-arrow-circle-left tooltips" data-placement="left" title="" placeholder="" data-rel="tooltip" data-original-title=""></i> ویرایش اطلاعات </h4><br>

                                                


                                                 <form role="form" class="form-horizontal bfont" action="action_category.php" method="POST" enctype="multipart/form-data">

                                                     <input type="hidden" name="id" id="id" value="<?php echo base64_encode($category_edit['id']);?>">

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                                            نام کتگوری <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                                            <input type="text" onblur="is_dublicate(this.value,'is_doblicate_category_name','<?php echo $category_edit['name']?>')" autocomplete="off" value="<?php echo $category_edit['name']; ?>" id="name" name="name" required placeholder="مثال : رادیو" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کتگوری را وارد کنید">
                                                            <p id="is_doblicate_category_name" style="display:none;color:red;font-weight:bold;margin-top:40px;">* نام کتگوری وارده تکراری می باشد !</p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="date">
                                                            تاریخ <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12 input-group" style="padding-left:15px !important; padding-right:15px !important;">
                                                            <input type="text" id="date" name="date" class="form-control tooltips" data-placement="top" value="<?php echo $category_edit['date']; ?>" title="" data-rel="tooltip" data-original-title="این فیلد لازمی هست" autocomplete="off">
                                                            <span class="input-group-addon" style="border-radius:0px !important;"> <i class="fa fa-calendar"></i> </span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="note">
                                                            توضیحات 
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                                            <textarea type="text" id="note" name="note" rows="5" placeholder="این فیلد لازمی  نیست" class="form-control tooltips" data-placement="top" title="این فیلد لازمی نیست" data-rel="tooltip" data-original-title="این فیلد لازمی نیست"><?php echo $category_edit['note']; ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label"></label>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">

                                                            <button type="submit" name="edit" class="btn btn-primary fbtn">
                                                                <i class="clip-stack-empty"> </i>
                                                                <span class="ladda-label"> ویرایش  </span>
                                                            </button>

                                                        <a href="add_category.php">
                                                            <button type="button" class="btn btn-danger fbtn">
                                                                <i class="fa fa-arrow-left"> </i>
                                                                <span class="ladda-label"> بازگشت  </span>
                                                            </button>
                                                        </a>

                                                        </div>
                                                    </div>

                                                </form>
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
                            <div class="default-bottom-height">
                            </div>
                        </div>
                        <?php 
                        require_once("_script.php");
                        ?>
                        <!-- /Main Script -->
                    </body>
                    </html >