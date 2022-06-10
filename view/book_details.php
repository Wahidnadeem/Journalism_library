<?php
    require_once("_config.php");

    if (isset($_GET['id'])) {

        $book_id = base64_decode($_GET['id']);

        $viewData = $db->query("SELECT * FROM `books` WHERE id='$book_id' ")->fetch();

        $user_id = $viewData['user_id'];
        $user_data = $db->query("SELECT * FROM `users` WHERE `is_deleted` = '0' AND `id`='$user_id'");
        $user_row = $user_data->fetch();
    }else{
        header("location:add_book.php");
    }


   

?>
<!DOCTYPE html>
<html class="no-js" lang="fa">
<head>
    <!-- Main CSS -->
    <?php
    $PAGE_TITLE     = " جزئیات کتاب ";
    require_once("_head.php");
  ?>
  <!-- /Main CSS -->
</head>

<body class="rtl footer-fixed">
    <br><br><br>
    <div class="col-md-1"></div>
    <div class="col-md-10"> 
        <div class="row">
           
            <br><br>
            <!-- start: FORM WIZARD PANEL -->
            <div class="panel panel-default non-border">

                <div class="panel-heading cfont" >

                <i class=" clip-stack-2"></i> جزئیات کتاب 
                    <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-expand">
                        <i class="fa fa-expand"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-close">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>

            <div class="panel-body " style="padding-top:0px !important;padding-bottom:0px !important;">
                <div class="row">
                    <div class="col-sm-12" style="padding:0px;">
                        <div class="col-sm-6" style="padding: 0px !important" >
                            <table class="table table-hover table-bordered table striped" >
                                <tr style="background: #036f3e ;color:white" >
                                    <td colspan="2" class="bfont" >
                                            جزئیات کتاب 
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bfont"  >
                                        ISBN
                                    </td>

                                     <td class="cfont" >
                                       <span class="badge btnc-danger" > <?= $viewData['isbn']; ?> </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="bfont"  >
                                        کد کتاب 
                                    </td>

                                     <td class="cfont" >
                                       <span class="badge btnc-info" > <?= $viewData['book_code']; ?> </span>
                                    </td>
                                </tr>

                                 <tr>
                                    <td class="bfont"  >
                                        نام کتاب 
                                    </td>

                                     <td class="cfont" >
                                        <?= $viewData['book_name']; ?> 
                                    </td>
                                </tr>

                                <tr>
                                    <td class="bfont"  >
                                         آدرس (ردیف / ستون )
                                    </td>

                                     <td class="cfont" >
                                       <span class="badge btnc-info" > <?= $viewData['book_row']."X".$viewData['book_column']; ?> </span>
                                    </td>
                                </tr>

                                 <tr>
                                    <td class="bfont"  >
                                        سال چاپ 
                                    </td>

                                     <td class="cfont" >
                                        <?= $viewData['print_year']; ?> 
                                    </td>
                                </tr>

                                 <tr>
                                    <td class="bfont"  >
                                        نویسنده گان
                                    </td>

                                     <td class="cfont" >
                                        <?=       $viewData['author1']
                                            .','. $viewData['author2'] 
                                            .','. $viewData['author3'];   ?> 
                                    </td>
                                </tr>

                                 <tr>
                                    <td class="bfont"  >
                                        مترجم 
                                    </td>

                                     <td class="cfont" >
                                        <?= $viewData['book_translator']; ?> 
                                    </td>
                                </tr>

                                 <tr>
                                    <td class="bfont"  >
                                        تعداد صفحه 
                                    </td>

                                     <td class="cfont" >
                                        <?= $viewData['num_page']; ?> 
                                    </td>
                                </tr>


                                <tr>
                                    <td class="bfont"  >
                                        زبان
                                    </td>

                                     <td class="cfont" >
                                        <?= $viewData['book_languge']; ?> 
                                    </td>
                                </tr>

                                <tr>
                                    <td class="bfont"  >
                                        تعداد 
                                    </td>

                                     <td class="cfont" >
                                        <?= $viewData['book_quantity']; ?> 
                                    </td>
                                </tr>

                                <tr style="background: #022535">
                                    <td style="border:unset;color:white;"><?php echo $user_row['full_name']?></td>
                                    <td style="border:unset;color:white;" class="cfont"><?php echo $viewData['date']; ?></td>
                                </tr>

                            </table>
                        </div>

                        <div class="col-sm-6" style="padding: 0px !important" >
                            <table  style="margin:0px auto;width: 100%;" class="table table-bordered table-hover">
                                <tr>
                                    <td class="bfont" style="background: #036f3e ;color:white">
                                        خلاصه کتاب
                                    </td>
                                </tr>

                                <tr>
                                    <td class="cfont" >
                                        <p style="overflow-y: scroll;" >
                                            <?php echo $viewData['note'] ?>
                                        </p>
                                        
                                        
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>


                </div>
                <br>
                <br>
            </div>
        </div>              
 </div> 
</div>
<!-- start footer -->
 <?php 
 require_once("_footer.php");
 ?>
 <!-- end: FOOTER -->
 <?php 
 require_once("_script.php");
 ?>
</body>

</html>