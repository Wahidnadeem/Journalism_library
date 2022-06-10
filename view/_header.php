<div class="navbar navbar-inverse bfont">
    <!-- start: TOP NAVIGATION CONTAINER -->
    <div class="container">
        <div class="navbar-header">
            <!-- start: RESPONSIVE MENU TOGGLER -->
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="clip-list-2"></span>
        </button>
        <!-- end: RESPONSIVE MENU TOGGLER -->
        <!-- start: LOGO -->
        <a class="navbar-brand" href="index.php" style="color:#046137">
                <div style="margin-top:-12px;margin-right:-15px;">
                    <p class="bfont"><img src="../assets/img/logo_faculty.jpg" style="width:45px;"> سیستم مدیریت کتابخانه دانشکده ژورنالیزم </p>
                </div>
            </a>
        <!-- end: LOGO -->
        </div>

        <div class="navbar-tools">
            <!-- start: TOP NAVIGATION MENU -->
            <ul class="nav navbar-right" >
                <!-- start: USER DROPDOWN -->
                <li class="dropdown current-user">
                    <a data-toggle="dropdown"  class="dropdown-toggle" data-close-others="false" href="#">
                        <span class="username">تنظیمات  <i class="fa fa-wrench"></i></span>
                        <i class="clip-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu" >
                        <li>
                            <a href="edit_user.php?id=<?php echo base64_encode($user_id) ?>" target="_">
                               <span style="float: left;"><i class="clip-user-2"></i> &nbsp;
                                    <span class="bfont" style="font-size: 20px;" dir="ltr">  <?= $user_name ?> </span>
                                </span>
                               <br> 
                            </a>
                        </li>
                       
                        <li class="divider"></li>
                        <li>
                            <a  href="logout.php" >
                                 <span style="float: right;"><i class="clip-exit"></i> &nbsp;خروج </span>
                                 <br>
                            </a>
                        </li>
                    </ul>
                    </li>
                    <!-- end: USER DROPDOWN -->
            </ul>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
        

        <style type="text/css">
            @media (min-width: 768px){
                .navbar-nav>li {
                    float: right !important;
                }
            }
            .navbar-nav{
                float: right !important;
                direction:rtl;
            }
            .cnav li{
                margin-right:10px;
            }

           
        </style>
        <!-- end: HORIZONTAL MENU -->
    </div>
    <!-- end: TOP NAVIGATION CONTAINER -->
</div>
<!-- end: HEADER -->
