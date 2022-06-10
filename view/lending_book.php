<?php
require_once("_config.php");

$lend_book_data = $db->prepare("SELECT * FROM `lending_book` WHERE `is_deleted` =:is_deleted ORDER BY id DESC LIMIT $to OFFSET $from  ");
$lend_book_data->execute(['is_deleted' => 0]);

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
    $PAGE_TITLE     = "امانت دهی کتاب";

    require_once("_head.php");
    ?>
</head>

<body class="rtl footer-fixed header-default">

<!-- start: HEADER -->
<?php
$menu  = "lending_book.php";
require_once("_header.php");
?>
<!-- end: HEADER -->
<!-- start: MAIN CONTAINER -->
<div class="main-container">
    <!-- start: SIDEBAR -->
    <?php
    $submenu    = "lending_book";
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
                            امانت دهی کتاب
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
                                                    <i class="green clip-stack"></i> امانت دهی کتاب
                                                </a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="panel_tab_1">
                                                <h4 class="bfont green"><i class="fa fa-arrow-circle-left tooltips" data-placement="left" title="" placeholder="" data-rel="tooltip" data-original-title=""></i> ثبت اطلاعات </h4>
                                                <form role="form" class="form-horizontal bfont" action="action_lending_book.php" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="insert" value="1" >
                                                    <input type="hidden" name="book_hidden_value" value="0">

                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">

                                                            <div class="form-group">
                                                                <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                                                    بارکد 
                                                                </label>
                                                                <div class="col-sm-12 col-md-12 col-lg-9 col-xs-12">
                                                                    <input type="text" autocomplete="off" id="barcode" name="barcode"  onchange="getValueBarCode(this.value);check_is_student_get_book(book_id.value,student_id.value)" placeholder="" class="form-control tooltips" >
                                                                    <p class="required p_is_exit" style="font-size: 20px;display: none" > این محصل این کتاب راه قبلا به امانت گرفته است!   </p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="student_id">
                                                                    انتخاب محصل <span class="required">*</span>
                                                                </label>
                                                                <div class="col-sm-12 col-md-12 col-lg-9 col-xs-12">
                                                                    <select id="student_id" onchange="check_is_student_get_book(book_id.value,student_id.value);getStudentDetails(this.value)"  name="student_id"  class="form-control tooltips select2"   data-placement="top" title="" data-rel="tooltip" data-original-title="">
                                                                        <option >یکی را انتخاب کنید</option>
                                                                        <?php
                                                                        $student = $db->prepare('SELECT * FROM students WHERE `is_deleted` =:is_deleted');
                                                                        $student->execute(['is_deleted' => 0]);
                                                                        foreach ($student as $studen_rows){
                                                                            echo '<option value="'.$studen_rows['id'].'"> '.$studen_rows['full_name'].' </option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group" id="book_select_div">
                                                                <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="book_id">
                                                                    انتخاب کتاب <span class="required">*</span>
                                                                </label>
                                                                <div class="col-sm-12 col-md-12 col-lg-9 col-xs-12">
                                                                    <select id="book_id"  name="book_id"  class="form-control tooltips select2" onchange="getBookDetails(this.value);check_is_student_get_book(book_id.value,student_id.value)" data-placement="top" title="" data-rel="tooltip" data-original-title="">
                                                                        <option  >یکی را انتخاب کنید</option>
                                                                        <?php
                                                                        $book = $db->prepare('SELECT * FROM books WHERE `is_deleted` =:is_deleted');
                                                                        $book->execute(['is_deleted' => 0]);
                                                                        foreach ($book as $book_rows){
                                                                            echo '<option value="'.$book_rows['id'].'"> '.$book_rows['book_name'].' </option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <p class="required p_is_exit" style="font-size: 20px;display: none"  > این محصل این کتاب راه قبلا به امانت گرفته است!   </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="date_lend">
                                                                    تاریخ امانت دهی <span class="required">*</span>
                                                                </label>
                                                                <div class="col-sm-12 col-md-12 col-lg-9 col-xs-12 input-group" style="padding-left:15px !important; padding-right:15px !important;">
                                                                    <input type="text" id="date_lend" name="date_lend" class="form-control tooltips date" data-placement="top" title="" data-rel="tooltip" data-original-title="این فیلد لازمی هست" autocomplete="off">
                                                                    <span class="input-group-addon" style="border-radius:0px !important;"> <i class="fa fa-calendar"></i> </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="date_delivery">
                                                                    تاریخ تحویل گیری  <span class="required">*</span>
                                                                </label>
                                                                <div class="col-sm-12 col-md-12 col-lg-9 col-xs-12 input-group" style="padding-left:15px !important; padding-right:15px !important;">
                                                                    <input type="text" id="date_delivery" name="date_delivery" class="form-control tooltips date" data-placement="top" title="" data-rel="tooltip" data-original-title="این فیلد لازمی هست" autocomplete="off">
                                                                    <span class="input-group-addon" style="border-radius:0px !important;"> <i class="fa fa-calendar"></i> </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="note">
                                                                    توضیحات
                                                                </label>
                                                                <div class="col-sm-12 col-md-12 col-lg-9 col-xs-12">
                                                                    <textarea type="text" id="note" name="note" rows="5" placeholder="این فیلد لازمی  نیست" class="form-control tooltips" data-placement="top" title="این فیلد لازمی نیست" data-rel="tooltip" data-original-title="این فیلد لازمی نیست"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label"></label>
                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                                                    <button id="insert_button" disabled="disabled" type="submit"" class="btn btn-primary fbtn">
                                                                        <i class="clip-stack-empty"> </i>
                                                                        <span class="ladda-label"> ذخیره  </span>
                                                                    </button>
                                                                    <button type="reset" class="btn btn-danger fbtn">
                                                                        <i class="clip-spinner-4"> </i>
                                                                        <span class="ladda-label"> لغو  </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
                                                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="max-height: 311px; overflow: auto;">
                                                                <table class="table table-responsive table-striped" style="border:1px dotted #009688">
                                                                    <tr>
                                                                        <th colspan="4" style="background: #6ebb98;padding: 10px;font-size: 12px;color:#000;;font-weight:bold;border:1px dotted #009688" class="bfont text-center" >
                                                                            مشخصات محصل
                                                                        </th>
                                                                    </tr>
                                                                    <tr class="bfont" >
                                                                        <th class="center" style="background: #eaeaea;padding: 10px;font-size: 12px;color:black;;font-weight:bold;border-top:1px dotted #009688"> آیدی محصل</th>
                                                                        <th class="center" style="background: #eaeaea;padding: 10px;font-size: 12px;color:black;;font-weight:bold;border-top:1px dotted #009688"> نام کامل</th>
                                                                        <th class="center" style="background: #eaeaea;padding: 10px;font-size: 12px;color:black;;font-weight:bold">نام پدر </th>
                                                                    </tr>
                                                                    <tbody id="student_dev" >
                                                                    <tr>
                                                                        <td colspan="5" class="center blue"><p style="padding:10px;padding-top:15px;"><i class="fa fa-refresh fa-spin"> </i> در حال انتظار....</p></td>
                                                                    </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="max-height: 311px; overflow: auto;">
                                                                <br>
                                                                <table class="table table-responsive table-striped" style="border:1px dotted #009688">
                                                                    <tr class="bfont" >
                                                                        <th colspan="7" style="background: #6ebb98;padding: 10px;font-size: 12px;color:black;;font-weight:bold;border:1px dotted #009688" class="text-center" >
                                                                            مشخصات  کتاب
                                                                        </th>
                                                                    </tr>
                                                                    <tr class="bfont" >
                                                                        <th class="center" style="background: #eaeaea;padding: 10px;font-size: 12px;color:black;;font-weight:bold;border-top:1px dotted #009688">نام کتاب </th>
                                                                        <th class="center" style="background: #eaeaea;padding: 10px;font-size: 12px;color:black;;font-weight:bold;"> تعداد  </th>
                                                                        <th class="center" style="background: #eaeaea;padding: 10px;font-size: 12px;color:black;;font-weight:bold;;">نویسنده </th>
                                                                        <th class="center" style="background: #eaeaea;padding: 10px;font-size: 12px;color:black;;font-weight:bold;;">سال چاپ</th>
                                                                        <th class="center" style="background: #eaeaea;padding: 10px;font-size: 12px;color:black;;font-weight:bold;border-top:1px dotted #009688;">زبان </th>
                                                                        <th class="center" style="background: #eaeaea;padding: 10px;font-size: 12px;color:black;;font-weight:bold;border-top:1px dotted #009688;">آدرس </th>
									<th class="center" style="background: #eaeaea;padding: 10px;font-size: 12px;color:black;;font-weight:bold;border-top:1px dotted #009688;"> کتگوری  </th>
                                                                    </tr>
                                                                    <tbody id="book_dev" >
                                                                    <tr>
                                                                        <td colspan="7" class="center blue"><p style="padding:10px;padding-top:15px;"><i class="fa fa-refresh fa-spin"> </i> در حال انتظار....</p></td>
                                                                    </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
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
             $record_table = $db->query("SELECT COUNT(id) AS number FROM `lending_book` WHERE is_deleted = '0' LIMIT $to OFFSET $from ")->fetch(); 

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
                                                        <th class="left bfont">توضیحات</th>
                                                        <th class="left bfont">کاربر</th>
                                                        <th class="center bfont">عملیات</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    $count = "1";
                                                    if($lend_book_data->rowCount() > 0) {
                                                        foreach ($lend_book_data as $rows) {

                                                            $student_id = $rows['student_id'];
                                                            $student_data = $db->query("SELECT * FROM `students` WHERE `is_deleted` = '0' AND `id`='$student_id'");
                                                            $student_row = $student_data->fetch();

                                                            $book_id = $rows['book_id'];
                                                            $book_data = $db->query("SELECT * FROM `books` WHERE `is_deleted` = '0' AND `id`='$book_id'");
                                                            $book_row = $book_data->fetch();

                                                            $user_id = $rows['user_id'];
                                                            $user_data = $db->query("SELECT * FROM `users` WHERE `is_deleted` = '0' AND `id`='$user_id'");
                                                            $user_row = $user_data->fetch();



                                                            echo '
                                                                    <tr class="active">
                                                                        <td class = "text-center"> ' . ($count++) . ' </td>
                                                                        <td class = "text-right"> ' . $student_row['full_name'] . ' <span class ="badge badge-warning"> ' . $student_row['student_id'] . ' </span>  </td>
                                                                        <td class = "text-right"> ' . $book_row['book_name'] . ' </td>
                                                                        <td class = "text-center"><span style ="color :#0037ff;"> ' .persionData($rows['date_lend']) . ' </span> / <span style ="color:#37c13b;"> ' . persionData($rows['date_delivery']) . ' </span></td>
                                                                        <td class = "text-right"> ' . $rows['note'] . ' </td>
                                                                        <td class = "text-right"> ' . $user_row['full_name'] . ' </td>

                                                                           <td class="tab-cen center">
                                                                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                                                    <a href="edit_lending_book.php?id='.base64_encode($rows['id']).'" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit">
                                                                                        <i class="fa fa-edit"></i>
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

        <script type="text/javascript">


        function getValueBarCode(key){
            $.ajax({
                url:"ajax.php",
                method:"POST",
                // async: false,
                data:{
                    key:key,
                    type:"BARCODE"
                },success:function(data){

                    $("#barcode").val('');

                    data = data.split('##')
                    // data  = [
                        //  0 => book_id
                        //  1 => bood_selete_data 
                    // ]
                    
                    getBookDetails(data[0]);
                    $("#book_id").html(data[1]);
                    $("#book_hidden_value").val(data[1]);
                    $("#book_select_div").hide();


                }
            });
        }


            // Get Student Details
            function getStudentDetails(student_id){
                // student_id = $("#"+student_id).val();
                if(student_id){
                    $.ajax({
                        url:"ajax_lending_book.php",
                        method:"POST",
                        beforeSend:function(){
                            $("#student_dev").html('<tr><td colspan="5" class="center red"><p style="padding:10px;padding-top:15px;"><i class="fa fa-refresh fa-spin"> </i> لطفا صبر کنید....</p></td></tr>');
                        },
                        data:{student_id:student_id},
                        success:function(data){
                            $("#student_dev").html(data);
                        }
                    });
                }


            }

            // Get Book Detials
            function getBookDetails(book_id){
                if(book_id){
                    $.ajax({
                        url:"ajax_lending_book.php",
                        method:"POST",
                        beforeSend:function(){
                            $("#book_dev").html('<tr><td colspan="7" class="center red"><p style="padding:10px;padding-top:15px;"><i class="fa fa-refresh fa-spin"> </i> لطفا صبر کنید....</p></td></tr>');
                        },
                        data:{book_id:book_id},
                        success:function(data){
                            $("#book_dev").html(data);
                        }
                    });
                }
            }


            function check_is_student_get_book (book_id , student_id){

                if(book_id == '' || student_id == '' )
                    return;

                $.ajax({
                    url:'ajax.php',
                    method: "post",
                    data : {
                        type : "check_is_student_get_book",
                        book_id,
                        student_id
                    },success:function (response) {
                        if(response == "true"){
                            $(".p_is_exit").show('slow');
                            $("#insert_button").prop('disabled', true);
                        }else {
                            $(".p_is_exit").hide('slow');
                            $("#insert_button").prop('disabled', false);
                        }
                    }
                })
            }



        </script>


</body>
</html >