<?php
require_once("_config.php");

if (empty($_GET['id'])) {
    header("location: return_book.php");
    exit();
}
?>

<!DOCTYPE html>
<!--[if !IE]><!-->
<html class="no-js" lang="fa">
<!--<![endif]-->
<head>
    <!-- Main CSS -->
    <?php
    $PAGE_TITLE     = "بدیل کتاب ";
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
                <i class="clip-folder-open"></i>  بدیل کتاب
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
                                    <h4 class="bfont green" style="position: relative;right: 30px"><i class="fa fa-arrow-circle-left tooltips" data-placement="left" title="" placeholder="" data-rel="tooltip" data-original-title=""></i> ثبت  اطلاعات </h4><br>


                                    <form role="form" class="form-horizontal bfont" action="action_lending_book.php" method="POST" enctype="multipart/form-data">

                                        <input type="hidden" name="lending_book_id" id="lending_book_id" value="<?php echo $_GET['id']  ?>">
                                        <input type="hidden" name="alternative_book" value="1">

                                        <div class="form-group">
                                            <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="note">
                                                توضیحات <span class="required">*</span>
                                            </label>
                                            <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                                <textarea type="text" id="note" name="note" rows="5" required class="form-control tooltips" ><?php ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label"></label>
                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                                <button type="submit"  class="btn btn-primary fbtn">
                                                    <i class="clip-stack-empty"> </i>
                                                    <span class="ladda-label"> ثبت   </span>
                                                </button>
                                                <a href="return_book.php">
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