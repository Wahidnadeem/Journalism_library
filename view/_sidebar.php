<style type="text/css">
    ul.main-navigation-menu>li>a i{
        padding-left:5px !important;
    }
</style>
<div class="navbar-content">
    <!-- start: SIDEBAR -->
    <div class="main-navigation navbar-collapse collapse"  >
        <!-- start: MAIN MENU TOGGLER BUTTON -->
        <div class="navigation-toggler">
            <i class="clip-chevron-left"></i>
            <i class="clip-chevron-right"></i>
        </div>
        <!-- end: MAIN MENU TOGGLER BUTTON -->
        <!-- start: MAIN NAVIGATION MENU -->
        <ul class="main-navigation-menu" >
            
            <li class="<?php if(isset($submenu) AND $submenu == "index.php") echo 'active';?>">
                <!--active open-->
                <a href="index.php">
                    <i class="clip-home-2"></i>
                    <span class="title bfont" >کتابخانه </span><span class="selected"></span>
                </a>
            </li>
     
             <!---------------  BOOK List ------------------>
             <li class="<?php if(isset($submenu) AND $submenu == "add_category.php") echo 'active';?>">
                <!--active open-->
                <a href="add_category.php">
                    <i class=" fa  fa-plus-square" ></i>
                    <span class="title bfont" > ثبت کتگوری  </span><span class="selected"></span>
                </a>
            </li>

             <!---------------  Membership ------------------>
             <li class="<?php if(isset($submenu) AND $submenu == "addbook") echo 'active';?>">
                <!--active open-->
                <a href="add_book.php">
                    <i class="clip-book"></i>
                    <span class="title bfont" > ثبت کتاب    </span><span class="selected"></span>
                </a>
            </li>

             <li class="<?php if(isset($submenu) AND $submenu == "add_student") echo 'active';?>">
                <!--active open-->
                <a href="add_student.php">
                    <i class="clip-user"></i>
                    <span class="title bfont" > ثبت محصل  </span><span class="selected"></span>
                </a>
            </li>

            <li class="<?php if(isset($submenu) AND $submenu == "add_teacher") echo 'active';?>">
                <!--active open-->
                <a href="add_teacher.php">
                    <i class="clip-user-3"></i>
                    <span class="title bfont" > ثبت   استاد  </span><span class="selected"></span>
                </a>
            </li>

            <li class="<?php if(isset($submenu) AND $submenu == "lending_book") echo 'active';?>">
                <!--active open-->
                <a href="lending_book.php">
                    <i class="fa fa-map"></i>
                    <span class="title bfont" >امانت دهی کتاب  </span><span class="selected"></span><span class="badge badge-danger"></span>
                </a>
            </li>

            <li class="<?php if(isset($submenu) AND $submenu == "return_book") echo 'active';?>">
                <!--active open-->
                <a href="return_book.php">
                    <i class="clip-refresh"></i>
                    <span class="title bfont" > تحویل گیری کتاب </span><span class="selected"></span>
                    <span class="bfont badge badge-danger" >
                        <?php
                        $number_book_expire_date = $db->query("SELECT COUNT(id) as id FROM `lending_book` WHERE `date_delivery` < '$PDATE' AND `is_deleted` = 0 AND `status` = 'pending' ")->fetch()['id'] + 0;
                        echo $number_book_expire_date;
                        ?>
                    </span>
                </a>
            </li>
            
            <!-- <li class="<?php // if(isset($submenu) AND $submenu == "list_card") echo 'active';?>">
                <a href="list_card.php">
                    <i class="clip-users"></i>
                    <span class="title bfont" > چاپ کارت محصل </span><span class="selected"></span>
                </a>
            </li> -->

            <li class="<?php if(isset($submenu) AND $submenu == "show_alternative_books") echo 'active';?>">
                <!--active open-->
                <a href="list_alternative_book.php">
                    <i class="clip-list"></i>
                    <span class="title bfont" >  لیست بدیل کتاب  </span><span class="selected"></span>
                </a>
            </li>

            <li class="<?php if(isset($submenu) AND $submenu == "list_barcode") echo 'active';?>">
                <!--active open-->
                <a href="list_barcode.php">
                    <i class="clip-barcode"></i>
                    <span class="title bfont" > چاپ  بارکد </span><span class="selected"></span>
                </a>
            </li>

            <?php if($user_type != 'user' ){ ?>
            <li class="<?php if(isset($submenu) AND $submenu == "add_user") echo 'active';?>">
                <!--active open-->
                <a href="add_user.php">
                    <i class="clip-user-2"></i>
                    <span class="title bfont" > ثبت کاربر  </span><span class="selected"></span>
                </a>
            </li>
            <?php } ?>
        </ul>
        <!-- end: MAIN NAVIGATION MENU -->
    </div>
    <!-- end: SIDEBAR -->
</div>
