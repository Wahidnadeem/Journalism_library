<?php
require_once("_config.php");



if(isset($_POST['search'])){

    $condition = '';

    if(!empty($_POST['s_book_name'])){
        $s_book_name = VD($_POST['s_book_name']);
        $condition .= " AND  `book_name` like '%$s_book_name%'  ";
    }

    if(!empty($_POST['s_category'])){
        $s_category = VD($_POST['s_category']);
        $condition .= " AND  `category_id`  = '$s_category' ";
    }

    if(!empty($_POST['s_author'])){
        $s_author = VD($_POST['s_author']);
        $condition .= " AND  `author1` like '%$s_author%' or `author2` like '%$s_author%' or `author3` like '%$s_author%'   ";
    }

    if(!empty($_POST['s_book_translator'])){
        $s_book_translator = VD($_POST['s_book_translator']);
        $condition .= " AND `book_translator` like "%$s_book_translator%" ";
    }

    if(!empty($_POST['s_year_Publishe'])){
        $s_year_Publishe = VD($_POST['s_year_Publishe']);
        $condition .= " AND `print_year` like '%$s_year_Publishe%' ";
    }



    $book_data = $db->prepare("SELECT * FROM books WHERE `is_deleted` =:is_deleted AND $condition  ORDER BY id DESC LIMIT $to OFFSET $from ");
    $book_data->execute(['is_deleted' => 0]);

    $list_data  = $db->query("SELECT count(id) as record FROM books WHERE is_deleted = 0")->fetch();
    $record     = $list_data['record'];

}else{
    $book_data = $db->prepare("SELECT * FROM books WHERE `is_deleted` =:is_deleted  ORDER BY id DESC LIMIT $to OFFSET $from ");
    $book_data->execute(['is_deleted' => 0]);

    $list_data  = $db->query("SELECT count(id) as record FROM books WHERE is_deleted = 0")->fetch();
    $record     = $list_data['record'];

}






require '../lib/barcode/autoload.php';
$generator = new Picqer\Barcode\BarcodeGeneratorHTML();

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
                            ثبت  کتاب
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
                    </ol>
                    <br>
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
                                                    <i class="green clip-stack"></i> ثبت کتاب
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="panel_tab_1">
                                                <h4 class="bfont green"><i class="fa fa-arrow-circle-left tooltips" data-placement="left" title="" placeholder="" data-rel="tooltip" data-original-title=""></i> ثبت اطلاعات </h4>
                                                <form role="form" class="form-horizontal bfont" action="action_book.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                                            نام کتاب  <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                                            <input type="text" onblur="is_dublicate(this.value,'is_doblicate_book_name')" autocomplete="off" id="book_name" name="book_name" required placeholder="مثال : ژورنالیست عمومی" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کتگوری را وارد کنید">
                                                            <p id="is_doblicate_book_name" style="display:none;color:red;font-weight:bold;margin-top:40px;">* نام این کتاب تکراری است ! </p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                                            تعداد صفحات
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                                            <input type="text" autocomplete="off" id="num_page" name="num_page" required placeholder="مثال : 15" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کتگوری را وارد کنید">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                                            زبان  <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                                            <input type="text" autocomplete="off" id="book_languge" name="book_languge" required placeholder="مثال : دری" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کتگوری را وارد کنید">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="author">
                                                            نویسند <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
                                                            <input type="text"   placeholder="نویسنده اول"   autocomplete="off" id="author1" name="author1"  required class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="">
                                                        </div>
                                                        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
                                                            <input type="text"   placeholder="نویسنده دوم"  autocomplete="off" id="author2" name="author2"   class="form-control tooltips" data-placement="top" title="این فیلد الزامی  است" data-rel="tooltip" data-original-title="">
                                                        </div>
                                                        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
                                                            <input type="text"   placeholder="نویسنده سوم "   autocomplete="off" id="author3" name="author3" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                                            تعداد  <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                                            <input type="text" autocomplete="off" id="book_quantity" name="book_quantity" required placeholder="مثال : 2 جلد" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کتگوری را وارد کنید">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                                            سال چاپ  <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                                            <input type="text" autocomplete="off" id="print_year" name="print_year" required placeholder="مثال : 1396" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کتگوری را وارد کنید">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                                            مترجم 
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                                            <input type="text" autocomplete="off" id="book_translator" name="book_translator" placeholder="مثال : داوود صابری" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کتگوری را وارد کنید">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="publish_year">
                                                            کتگوری
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                                            <select id="category_id"  name="category_id"  class="form-control tooltips select2" data-placement="top" title="" data-rel="tooltip" data-original-title="">
                                                                <option value="">انتخاب</option>
                                                                <?php
                                                                $categories = $db->prepare('SELECT * FROM categories WHERE `is_deleted` =:is_deleted');
                                                                $categories->execute(['is_deleted' => 0]);
                                                                foreach ($categories as $cate_rows){
                                                                    echo '<option value="'.$cate_rows['id'].'"> '.$cate_rows['name'].' </option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                                            ردیف  <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                                            <input type="text" autocomplete="off" id="book_row" name="book_row" required placeholder="مثال : پنجم" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کتگوری را وارد کنید">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                                            ستون  <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                                            <input type="text" autocomplete="off" id="book_column" name="book_column" required placeholder="مثال : دهم" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کتگوری را وارد کنید">
                                                        </div>
                                                    </div>

                                                      <div class="form-group" >
                                                      <label class="col-sm-3 control-label bfont" for="name">
                                                            عکس <span></span>
                                                        </label>
                                                      <div class="col-sm-6">
                                                         <input  type="file" name="photo" id="photo" class="file tooltips" title=""  data-placement="top" data-show-preview="true"  data-rel="tooltip" data-original-title="">
                                                      </div>
                                                   </div>

                                                    <div class="form-group" >
                                                        <label class="col-sm-3 control-label bfont">
                                                            فاکتور
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <input  type="file" name="book_factor" id="book_factor" class="file tooltips" title=""  data-placement="top" data-show-preview="true"  data-rel="tooltip" data-original-title="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group" >
                                                        <label class="col-sm-3 control-label bfont">
                                                            سافت
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <input  type="file" name="book_soft_file" id="book_soft_file" class="file tooltips" title=""  data-placement="top" data-show-preview="true"  data-rel="tooltip" data-original-title="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="date">
                                                            تاریخ <span class="required">*</span>
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12 input-group" style="padding-left:15px !important; padding-right:15px !important;">
                                                            <input type="text" id="date" name="date" class="form-control tooltips date" data-placement="top" title="" data-rel="tooltip" data-original-title="این فیلد لازمی هست" autocomplete="off">
                                                            <span class="input-group-addon" style="border-radius:0px !important;"> <i class="fa fa-calendar"></i> </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="note">
                                                            خلاصه کتاب
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                                            <div class=" cfont">
                                                                <textarea class=" form-control cfont" id="" name="note" style="min-height:150px;"></textarea>
                                                            </div>
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
                </div>
                <!-- COL-LG-12 -->
            </div>
            <!-- ROW -->
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
                                                        <th class="tright bold bfont" style="padding-right:10px !important;"> نام  </th>
                                                        <th class="tright bold bfont" style="padding-right:10px !important;"> کتگوری  </th>
                                                        <th class="tright bold bfont" style="padding-right:10px !important;"> نویسنده </th>
                                                        <th class="tright bold bfont" style="padding-right:10px !important;"> مترجم کتاب  </th>
                                                        <th class="tright bold bfont" style="padding-right:10px !important;"> سال چاپ   </th>
                                                        <th></th>
                                                    </tr>

                                                    <tr>
                                                        <input type="hidden" name="search" value="1">
                                                        <td class="tright bold bfont" style="padding-right:10px !important;min-width:150px;">
                                                            <input type="text" value="<?php if(isset($_POST['s_book_name'])) echo VD($_POST['s_book_name']) ?>" autocomplete="off" id="s_book_name" name="s_book_name" class="form-control tooltips" data-placement="top" title="" data-rel="tooltip" data-original-title="نام کتاب ">
                                                        </td>

                                                        <td class="tright bold bfont" style="padding-right:10px !important;min-width:150px;">
                                                            <select id="s_category" name="s_category" class="form-control select2">
                                                                <option  value="">انتخاب</option>
                                                                <?php
                                                                $categories = $db->prepare('SELECT * FROM categories WHERE `is_deleted` =:is_deleted');
                                                                $categories->execute(['is_deleted' => 0]);
                                                                foreach ($categories as $cate_rows){
                                                                    if(isset($_POST['s_category']) and $_POST['s_category'] == $cate_rows['id'] ){
                                                                        echo '<option selected value="'.$cate_rows['id'].'"> '.$cate_rows['name'].' </option>';
                                                                    }else {
                                                                        echo '<option value="'.$cate_rows['id'].'"> '.$cate_rows['name'].' </option>';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>

                                                        <td class="tright bold bfont" style="padding-right:10px !important;min-width:150px;">
                                                            <input type="text" autocomplete="off" value="<?php if(isset($_POST['s_author'])) echo VD($_POST['s_author']) ?>" id="s_author" name="s_author" class="form-control tooltips" data-placement="top" title="" data-rel="tooltip" >
                                                        </td>

                                                        <td class="tright bold bfont" style="padding-right:10px !important;min-width:150px;">
                                                            <input type="text" autocomplete="off" id="s_book_translator"  value="<?php if(isset($_POST['s_book_translator'])) echo VD($_POST['s_book_translator']) ?>"  name="s_book_translator" class="form-control tooltips" data-placement="top" title="" data-rel="tooltip" >
                                                        </td>
                                                        <td class="tright bold bfont" style="padding-right:10px !important;min-width:150px;">
                                                            <input type="text" autocomplete="off" id="s_year_Publishe" value="<?php if(isset($_POST['s_year_Publishe'])) echo VD($_POST['s_year_Publishe']) ?>" name="s_year_Publishe" class="form-control tooltips" data-placement="top" title="" data-rel="tooltip" >
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
             $record_table = $db->query("SELECT COUNT(id) AS number FROM `books` WHERE is_deleted = '0' LIMIT $to OFFSET $from ")->fetch(); 

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
                                                    <i class="fa fa-chevron-down"></i> نمایش ریکارد های موجود [ <span style="color: red;"><?php echo @$record_table['number']; ?></span> ] <?php echo @$record_table['number']; ?> از مجموع ۶۱
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
                                                        <th class="center bfont">ISBN</th>
                                                        <th class="left bfont">کتگوری</th>
                                                        <th class="left bfont">نام کتاب</th>
                                                        <th class="left bfont">نویسنده ها</th>
                                                        <th class="center bfont">آدرس</th>
                                                        <th class="left bfont">زبان</th>
                                                        <th class="center bfont">تاریخ</th>
                                                        <th class="center bfont">کاربر</th>
                                                        <?php if($user_type != "user"){ ?>
                                                            <th class="center bfont">عملیات</th>
                                                        <?php } ?>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    if($book_data->rowCount() > 0) {
                                                        foreach ($book_data as $rows) {

                                                            $category_id = $rows['category_id'];
                                                            $category_data = $db->query("SELECT * FROM `categories` WHERE `id`='$category_id'");
                                                            $category_row = $category_data->fetch();

                                                            $user_id = $rows['user_id'];
                                                            $user_data = $db->query("SELECT * FROM `users` WHERE `id`='$user_id'");
                                                            $user_row = $user_data->fetch();

                                                            $deleted = '';
                                                            if($user_type == "superadmin"){
                                                                $deleted = '
                                                                  <a href="action_book.php?delete&id='.base64_encode($rows['id']).'" class="btn btn-xs btn-bricky tooltips deleted" data-placement="top" data-original-title="Delete">
                                                                     <i class=" fa fa-trash"></i>
                                                                  </a>';
                                                            }

                                                            $action = '';
                                                            if($user_type != 'user'){
                                                                $action =
                                                                    '<td class="tab-cen center">
                                                                     <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                                           <a href="edit_book.php?id='.base64_encode($rows['id']).'" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit">
                                                                              <i class="fa fa-edit"></i>
                                                                           </a>
                                                                           '.$deleted.'
                                                                     </div>
                                                                  </td>';
                                                            }

                                                            $bar_code_value = $KEY_BARCODE.$rows['id'];

                                                            echo '
                                                            <tr class="active">
                                                                <td class = "text-center"> ' . ($count++) . ' </td>
                                                                <td class = "text-center"> '.$generator->getBarcode(  $bar_code_value , $generator::TYPE_CODE_128).' </td>
                                                                <td class = "text-center"> ' . @$category_row['name'] . ' </td>
                                                                <td class = "text-center"> <a class="bold custom-green" style="cursor: pointer;text-decoration:none;" onclick="book_details(\'book_details.php?id='.base64_encode($rows['id']).' \')" >  '.$rows['book_name'].'</a> </td>
                                                                <td class = "text-center"> ' . $rows['author1'] . ' , ' . $rows['author2'] . ' , ' . $rows['author3'] . '  </td>
                                                                <td class = "text-center" dir ="ltr">
                                                                 ' . $rows['book_row'] . ' X 
                                                                 ' . $rows['book_column'] . '   </td>
                                                                <td class = "text-right"> ' . $rows['book_languge'] . ' </td>
                                                                <td class = "text-center"> ' .persionData($rows['date']).'</td>
                                                                <td class = "text-right"> ' . $user_row['full_name'] . ' </td>
                                             
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
                </div>
                <!-- COL-LG-12 -->
            </div>
            <!-- ROW -->
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

            $(document).ready(function() {
                $('.summernote').summernote({
                    height:200
                });
            });

            function book_details(location){
                window.open(location,'AfghanVTeam Journalism Library','width=1000,height=600,scrollbars,resizable');
            }

        </script>
        <!-- /Main Script -->
</body>
</html >