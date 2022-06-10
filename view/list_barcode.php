<?php 
   require_once("_config.php");

    if(isset($_GET['search'])){

        $condition = '';

        if(!empty($_GET['s_book_name'])){
            $s_book_name = VD($_GET['s_book_name']);
            $condition .= " AND  `book_name` like '%$s_book_name%'  ";
        }

        if(!empty($_GET['s_category'])){
            $s_category = VD($_GET['s_category']);
            $condition .= " AND  `category_id`  = '$s_category' ";
        }

        if(!empty($_GET['s_author'])){
            $s_author = VD($_GET['s_author']);
            $condition .= " AND  `author1` like '%$s_author%' or `author2` like '%$s_author%' or `author3` like '%$s_author%'   ";
        }

        if(!empty($_GET['s_book_translator'])){
            $s_book_translator = VD($_GET['s_book_translator']);
            $condition .= " AND `book_translator` like "%$s_book_translator%" ";
        }

        if(!empty($_GET['s_year_Publishe'])){
            $s_year_Publishe = VD($_GET['s_year_Publishe']);
            $condition .= " AND `print_year` like '%$s_year_Publishe%' ";
        }

        $book_data = $db->prepare("SELECT * FROM books WHERE `is_deleted` =:is_deleted  $condition ORDER BY id DESC LIMIT $to OFFSET $from ");
        $book_data->execute(['is_deleted' => 0]);

        $list_data  = $db->query("SELECT count(id) as record FROM books WHERE is_deleted = 0")->fetch();
        $record     = $list_data['record'];

    }else{
        $book_data = $db->prepare("SELECT * FROM books WHERE `is_deleted` =:is_deleted ORDER BY id DESC LIMIT $to OFFSET $from ");
        $book_data->execute(['is_deleted' => 0]);

        $list_data  = $db->query("SELECT count(id) as record FROM books WHERE is_deleted = 0")->fetch();
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
    $PAGE_TITLE     = "چاپ  بارکد";
    
    require_once("_head.php");
    ?>
</head>

<body class="rtl footer-fixed header-default">

    <!-- start: HEADER -->
    <?php
    $menu  = "list_barcode.php";
    require_once("_header.php");
    ?>
    <!-- end: HEADER -->
    <!-- start: MAIN CONTAINER -->
    <div class="main-container">
       <!-- start: SIDEBAR -->
       <?php 
       $submenu    = "list_barcode";
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
                            چاپ بارکد 
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
                                                    <i class="green clip-search-3"></i> جستجو کتاب
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="panel_tab_1">
                                                <h4 class="bfont green"><i class="fa fa-search tooltips" data-placement="left" title="" placeholder="" data-rel="tooltip" data-original-title=""></i> جستجو اطلاعات </h4>

                                                <form role="form" class="form-horizontal bfont" action="" method="GET" enctype="multipart/form-data">

                                                    <input type="hidden" name="search">
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="s_book_name">
                                                            نام
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <input type="text" autocomplete="off"  value="<?php if(isset($_POST['s_book_name'])) echo VD($_POST['s_book_name']) ?>" id="s_book_name" name="s_book_name" placeholder="" class="form-control tooltips" data-placement="top" >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="s_category">
                                                            کتگوری
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <select id="s_category"  name="s_category"  class="form-control tooltips select2" data-placement="top" title="" data-rel="tooltip" data-original-title="">
                                                                <option value="">انتخاب</option>
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
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="s_author">
                                                            نویسنده
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <input type="text" autocomplete="off" value="<?php if(isset($_POST['s_author'])) echo VD($_POST['s_author']) ?>" id="s_author" name="s_author"  class="form-control tooltips">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="s_book_translator">
                                                            مترجم کتاب
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <input type="text" autocomplete="off" value="<?php if(isset($_POST['s_book_translator'])) echo VD($_POST['s_book_translator']) ?>" id="s_book_translator" name="s_book_translator"  class="form-control tooltips">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="s_year_Publishe">
                                                            سال چاپ
                                                        </label>
                                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xs-12">
                                                            <input type="text" autocomplete="off" value="<?php if(isset($_POST['s_year_Publishe'])) echo VD($_POST['s_year_Publishe']) ?>" id="s_year_Publishe" name="s_year_Publishe"  class="form-control tooltips">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label"></label>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">

                                                            <button type="submit" name="insert" class="btn btn-primary fbtn">
                                                                <i class="fa fa-search"> </i>
                                                                <span class="ladda-label"> جستجو  </span>
                                                            </button>

                                                            <a href="list_barcode.php" class="btn btn-danger fbtn">
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

                <a id="printbarcode" class="bfont pointer btnc btnc-primary btnc-outline fancy-button btnc-0" style="text-decoration: none" target="_blank" >
                    <i class="fa fa-print"></i>&nbsp;
                    <span class="ladda-label">چاپ  بار کد  </span>&nbsp;
                </a>


    <!-- <div class="row"> -->

         <?php
             $record_table = $db->query("SELECT COUNT(id) AS number FROM `books` WHERE is_deleted = '0'LIMIT $to OFFSET $from ")->fetch(); 

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
                                            <form action="print_barcode.php" target="_blank" id="print_form_barcode" method="post">
                                                        <table class="table table-bordered table-hover" id="sample-table-1" >
                                                   <thead>
                                                      <tr>
                                                        <th class="center bfont">شماره</th>
                                                        <th class="left bfont">کتگوری</th>
                                                        <th class="left bfont">نام کتاب</th>
                                                        <th class="left bfont">نویسنده ها</th>
                                                        <th class="center bfont">آدرس</th>
                                                        <th class="left bfont">زبان</th>
                                                        <th class="left bfont">تعداد </th>
                                                        <th class="center" style="padding-right:10px !important;">
                                                            <input type="checkbox" class="orange" id="print_all" > 
                                                        </th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                      <?php
                                                         $count = "1";
                                                                if($book_data->rowCount() > 0) {
                                                                    foreach ($book_data as $rows) {

                                                                      $category_id = $rows['category_id'];
                                                                      $category_data = $db->query("SELECT * FROM `categories` WHERE `is_deleted` = '0' AND `id`='$category_id'");
                                                                      $category_row = $category_data->fetch();

                                                                      $user_id = $rows['user_id'];
                                                                      $user_data = $db->query("SELECT * FROM `users` WHERE `is_deleted` = '0' AND `id`='$user_id'");
                                                                      $user_row = $user_data->fetch();
                                                                        echo '
                                                                        <tr class="active">
                                                                            <td class = "text-center"> ' . ($count++) . ' </td>
                                                                            <td class = "text-right"> ' . @$category_row['name'] . ' </td>
                                                                            <td class = "text-right"> <a class="bold custom-green" style="cursor: pointer;text-decoration:none;" onclick="book_details(\'book_details.php?id='.base64_encode($rows['id']).' \')" >  '.$rows['book_name'].'</a> </td>
                                                                            <td class = "text-right"> ' . $rows['author1'] . ' , ' . $rows['author2'] . ' , ' . $rows['author3'] . '  </td>
                                                                            <td class = "text-center" dir ="ltr">
                                                                             ' . $rows['book_row'] . ' X 
                                                                             ' . $rows['book_column'] . '   </td>
                                                                            <td class = "text-right"> ' . $rows['book_languge'] . ' </td>
                                                                            <td> 
                                                                                <input type="text" class="form-control cfont bold" value="'.$rows['book_quantity'].'" name="amount[]"  >
                                                                                <input type="hidden" name="row_amount[]" value="'.base64_encode($rows['id']).'" > 
                                                                            </td>             
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
    $("#printbarcode").click(function(){
        $("#print_form_barcode").submit();
    });
});
</script>


</body>
</html >