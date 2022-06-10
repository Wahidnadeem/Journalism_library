<?php 
require_once("_config.php");

    if (isset($_GET['id'])) {
        $id              = base64_decode($_GET['id']);
        $book_view       = $db->query("SELECT * FROM `books` WHERE `is_deleted` = '0' AND `id`='$id'");
        $book_edit       = $book_view->fetch();
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

                                                <form role="form" class="form-horizontal bfont" action="action_book.php" method="POST" enctype="multipart/form-data">

                                       <input type="hidden" name="id" id="id" value="<?php echo base64_encode($book_edit['id']);?>">
                                       <input type="hidden" name="lastphoto" id="lastphoto" value="<?php echo base64_encode($book_edit['photo']);?>">

                                        <div class="form-group" >
                                            <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="old_img">
                                                  عکس قبلی <span></span>
                                              </label>
                                            <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                              <img style="width: 170px;" src="<?php echo $book_edit['photo'];?>" class="thumbnail" id = "old_img">
                                            </div>
                                         </div>

                                          <div class="form-group" >
                                            <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                                  عکس جدید <span></span>
                                              </label>
                                            <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                               <input  type="file" name="photo" id="photo" class="file tooltips" title=""  data-placement="top" data-show-preview="true"  data-rel="tooltip" data-original-title="">
                                            </div>
                                         </div>

                                     
                                       <div class="form-group">
                                          <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                          نام کتاب  <span class="required">*</span>
                                          </label>
                                          <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                             <input type="text"  onblur="is_dublicate(this.value,'is_doblicate_book_name','<?php echo $book_edit['book_name']?>')" autocomplete="off" value="<?php echo $book_edit['book_name']; ?>" id="book_name" name="book_name" required placeholder="مثال : ژورنالیست عمومی" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کتگوری را وارد کنید">
                                             <p id="is_doblicate_book_name" style="display:none;color:red;font-weight:bold;margin-top:40px;">* نام این کتاب تکراری است ! </p>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                          تعداد صفحات  
                                          </label>
                                          <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                             <input type="text" autocomplete="off" value="<?php echo $book_edit['num_page']; ?>" id="num_page" name="num_page" required placeholder="مثال : 15" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کتگوری را وارد کنید">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                          زبان  <span class="required">*</span>
                                          </label>
                                          <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                             <input type="text" autocomplete="off" value="<?php echo $book_edit['book_languge']; ?>" id="book_languge" name="book_languge" required placeholder="مثال : دری" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کتگوری را وارد کنید">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="author">
                                          نویسند <span class="required">*</span>
                                          </label>
                                          <div class="col-sm-2 col-md-2 col-lg-3 col-xs-2">
                                             <input type="text"   placeholder="نویسنده اول"   autocomplete="off" id="author1" name="author1" value="<?php echo $book_edit['author1']; ?>" required class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="">
                                          </div>
                                          <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
                                             <input type="text"   placeholder="نویسنده دوم"  autocomplete="off" id="author2" name="author2" value="<?php echo $book_edit['author2']; ?>"  class="form-control tooltips" data-placement="top" title="این فیلد الزامی  است" data-rel="tooltip" data-original-title="">
                                          </div>
                                          <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
                                             <input type="text"   placeholder="نویسنده سوم "   autocomplete="off" id="author3" name="author3" value="<?php echo $book_edit['author3']; ?>" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                          تعداد  <span class="required">*</span>
                                          </label>
                                          <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                             <input type="number" autocomplete="off" value="<?php echo $book_edit['book_quantity']; ?>" id="book_quantity" name="book_quantity" required placeholder="مثال : 2 جلد" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                          سال چاپ  <span class="required">*</span>
                                          </label>
                                          <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                             <input type="text" autocomplete="off" value="<?php echo $book_edit['print_year']; ?>" id="print_year" name="print_year" required placeholder="مثال : 1396" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کتگوری را وارد کنید">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                          مترجم 
                                          </label>
                                          <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                             <input type="text" autocomplete="off" value="<?php echo $book_edit['book_translator']; ?>" id="book_translator" name="book_translator" placeholder="مثال : داوود صابری" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کتگوری را وارد کنید">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="publish_year">
                                          کتگوری 
                                          </label>
                                          <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                             <select id="category_id"  name="category_id" required="required"  class="form-control tooltips select2" data-placement="top" title="" data-rel="tooltip" data-original-title="">
                                               <?php
                                                   $category = $db->prepare('SELECT * FROM `categories` WHERE `is_deleted` =:is_deleted');
                                                   $category->execute(['is_deleted' => 0]);
                                                   foreach ($category as $category_rows){
                                                       if ($category_rows['id'] == $book_edit['category_id']) {
                                                           echo '<option value = "'.$category_rows['id'].'" selected>'.$category_rows['name'].' </option>';
                                                       }
                                                       else{
                                                           echo '<option value ="'.$category_rows['id'].'"> '.$category_rows['name'].'</option>';
                                                       }

                                                   }
                                                   ?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                          ردیف  <span class="required">*</span>
                                          </label>
                                          <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                             <input type="text" autocomplete="off" value="<?php echo $book_edit['book_row']; ?>" id="book_row" name="book_row" required placeholder="مثال : پنجم" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کتگوری را وارد کنید">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="name">
                                          ستون  <span class="required">*</span>
                                          </label>
                                          <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                             <input type="text" autocomplete="off" value="<?php echo $book_edit['book_column']; ?>" id="book_column" name="book_column" required placeholder="مثال : دهم" class="form-control tooltips" data-placement="top" title="این فیلد لازمی است" data-rel="tooltip" data-original-title="نام کتگوری را وارد کنید">
                                          </div>
                                       </div>

                                       <div class="form-group" >
                                          <label class="col-sm-3 control-label bfont">
                                          فاکتور
                                          </label>
                                          <div class="col-sm-7">
                                             <input  type="file" name="book_factor" id="book_factor" class="file tooltips" title=""  data-placement="top" data-show-preview="true"  data-rel="tooltip" data-original-title="">
                                          </div>
                                       </div>
                                       <div class="form-group" >
                                          <label class="col-sm-3 control-label bfont">
                                          سافت
                                          </label>
                                          <div class="col-sm-7">
                                             <input  type="file" name="book_soft_file" id="book_soft_file" class="file tooltips" title=""  data-placement="top" data-show-preview="true"  data-rel="tooltip" data-original-title="">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="date">
                                          تاریخ <span class="required">*</span>
                                          </label>
                                          <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12 input-group" style="padding-left:15px !important; padding-right:15px !important;">
                                             <input type="text" value="<?php echo $book_edit['date']; ?>" id="date" name="date" class="form-control tooltips" data-placement="top" title="" data-rel="tooltip" data-original-title="این فیلد لازمی هست" autocomplete="off">
                                             <span class="input-group-addon" style="border-radius:0px !important;"> <i class="fa fa-calendar"></i> </span>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label bfont" for="note">
                                          خلاصه کتاب 
                                          </label>
                                          <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                             <div class=" cfont">
                                                <textarea class=" form-control cfont" id="note" name="note" style="min-height:150px;"><?php echo $book_edit['note']; ?></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-12 col-md-12 col-lg-3 col-xs-12 control-label"></label>
                                          <div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
                                             <button type="submit" name="edit" class="btn btn-primary fbtn">
                                             <i class="clip-stack-empty"> </i>
                                             <span class="ladda-label"> ویرایش  </span>
                                             </button>

                                             <a href="add_book.php">
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
        <script>
         $(document).ready(function() {
         $('.summernote').summernote({
         height:200
         });
         });
         
      </script>
  </body>
  </html >
