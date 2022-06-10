    <?php 
    require_once("_config.php");

    if (isset($_GET['id'])) {
      $id              = base64_decode($_GET['id']);
      $lend_book_view  = $db->query("SELECT * FROM `lending_book` WHERE `is_deleted` = '0' AND `id`='$id'");
      $lend_row        = $lend_book_view->fetch();
    }
    ?>
    <!DOCTYPE html>
    <!--[if !IE]><!-->
    <html class="no-js" lang="fa">
    <!--<![endif]-->
    <head>
      <!-- Main CSS -->
      <?php
      $PAGE_TITLE     = "ویرایش امانت دهی";

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
                    <div class="unset-padding">
                      <div class="tabbable">
                        <div class="">
                          <div class="tab-pane active" id="panel_tab_1">
                            <br>
                            <h4 class="bfont green" style="position: relative;right: 30px"><i class="fa fa-arrow-circle-left tooltips" data-placement="left" title="" placeholder="" data-rel="tooltip" data-original-title=""></i> ویرایش اطلاعات </h4><br>


                            <form role="form" class="form-horizontal bfont" action="action_lending_book.php" method="POST" enctype="multipart/form-data">

                              <input type="hidden" name="id" id="id" value="<?php echo base64_encode($lend_row['id']);?>">

                              <div class="form-group">
                                <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="student_id">
                                 انتخاب محصل <span class="required">*</span>
                               </label>
                               <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                <select id="student_id"  name="student_id"  class="form-control tooltips select2"  data-placement="top" title="" data-rel="tooltip" data-original-title="">
                                  <?php
                                  $student = $db->prepare('SELECT * FROM `students` WHERE `is_deleted` =:is_deleted');
                                  $student->execute(['is_deleted' => 0]);
                                  foreach ($student as $student_rows){
                                   if ($student_rows['id'] == $lend_row['student_id']) {
                                     echo '<option value = "'.$student_rows['id'].'" selected>'.$student_rows['full_name'].' </option>';
                                   }
                                   else{
                                     echo '<option value ="'.$student_rows['id'].'"> '.$student_rows['full_name'].'</option>';
                                   }

                                 }
                                 ?>
                               </select>
                             </div>
                           </div>

                           <div class="form-group">
                            <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="book_id">
                             انتخاب کتاب <span class="required">*</span>
                           </label>
                           <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                            <select id="book_id"  name="book_id"  class="form-control tooltips select2" data-placement="top" title="" data-rel="tooltip" data-original-title="">
                              <option >یکی را انتخاب کنید</option>
                              <?php
                              $bookk = $db->prepare('SELECT * FROM `books` WHERE `is_deleted` =:is_deleted');
                              $bookk->execute(['is_deleted' => 0]);
                              foreach ($bookk as $book_rows){
                               if ($book_rows['id'] == $lend_row['book_id']) {
                                 echo '<option value = "'.$book_rows['id'].'" selected>'.$book_rows['book_name'].' </option>';
                               }
                               else{
                                 echo '<option value ="'.$book_rows['id'].'"> '.$book_rows['book_name'].'</option>';
                               }

                             }
                             ?>
                           </select>
                         </div>
                       </div>

                       <div class="form-group">
                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="date_lend">
                          تاریخ امانت دهی <span class="required">*</span>
                        </label>
                        <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12 input-group" style="padding-left:15px !important; padding-right:15px !important;">
                         <input type="text" value="<?php echo $lend_row['date_lend']?>" id="date_lend" name="date_lend" class="form-control tooltips" data-placement="top" title="" data-rel="tooltip" data-original-title="این فیلد لازمی هست" autocomplete="off">
                         <span class="input-group-addon" style="border-radius:0px !important;"> <i class="fa fa-calendar"></i> </span>
                       </div>
                     </div>

                     <div class="form-group">
                      <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="date_delivery">
                        تاریخ تحویل گیری  <span class="required">*</span>
                      </label>
                      <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12 input-group" style="padding-left:15px !important; padding-right:15px !important;">
                       <input type="text" value="<?php echo $lend_row['date_delivery']?>" id="date_delivery" name="date_delivery" class="form-control tooltips" data-placement="top" title="" data-rel="tooltip" data-original-title="این فیلد لازمی هست" autocomplete="off">
                       <span class="input-group-addon" style="border-radius:0px !important;"> <i class="fa fa-calendar"></i> </span>
                     </div>
                   </div>


                   <div class="form-group">
                        <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="note">
                            توضیحات 
                        </label>
                        <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                            <textarea type="text" id="note" name="note" rows="5" placeholder="این فیلد لازمی  نیست" class="form-control tooltips" data-placement="top" title="این فیلد لازمی نیست" data-rel="tooltip" data-original-title="این فیلد لازمی نیست"><?php echo $lend_row['note']; ?></textarea>
                        </div>
                    </div>

                <div class="form-group">
                  <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label"></label>
                  <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                   <button type="submit" name="edit" class="btn btn-primary fbtn">
                     <i class="clip-stack-empty"> </i>
                     <span class="ladda-label"> ویاریش  </span>
                   </button>
                     
                    <a href="lending_book.php">
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

    <!-- Main Script -->
    <?php 
    require_once("_script.php");
    ?>
    <!-- /Main Script -->

    </body>
    </html >