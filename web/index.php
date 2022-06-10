<?php require_once "../lib/db.php";?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>کتابخانه فاکولته ژورنالیزنم</title>
    <!-- icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Theme -->
    <link rel="stylesheet" href="assist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assist/css/owl.carousel.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <header class="p-0 m-0 position-relative myshadow2">
        <div class="row m-0 pt-4 pb-4">
            <div class="col-md-1"></div>

            <div class="col-md-2 text-center text-md-right ">
                <img class="pt-4" src="assist/img/Screenshot-18.png" style="max-width: 123px;" alt="logo">
            </div>

            <div class="col-md-9 h1 pt-5 pb-5 font-weight-light text-left mikhak font-weight-light">
                <div class="row">

                    <div class="col-md-8 ">
                        <form action="index.php" method="get">
                            <input type="hidden" name="search" vlaue="1" > 
                            <input name="name" class="form-control basicAutoComplete w-100 p-4 h3" type="text"
                                placeholder="کتاب در مسیر موفقیت" autocomplete="off">
                        </form>
                    </div>

                    <div class="col-md-3"><span class="hepo font-weight-light">


                            <a href="#" data-toggle="modal" data-target="#exampleModal"
                                class="btn mybg-dark a vazir font-weight-light ml-2">ژورنالیزم هرات</a>
                            | Herat
                        </span></div>
                </div>
            </div>

            <div class="col-md-1"></div>
        </div>

        <div class="container border-top">
            <div class="row">
                <div class="col-md-12 pt-2 pb-2 ">
                    <nav class="navbar navbar-expand-lg navbar-light mikhak pt-2 pb-0">

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse h5 " id="navbarNavDropdown">

                            <button class="menu menujs">
                                <svg viewBox="0 0 64 48">
                                    <path d="M19,15 L45,15 C70,15 58,-2 49.0177126,7 L19,37"></path>
                                    <path d="M19,24 L45,24 C61.2371586,24 57,49 41,33 L32,24"></path>
                                    <path d="M45,33 L19,33 C-8,33 6,-2 22,14 L45,37"></path>
                                </svg>


                            </button>

                            <button class="resetbtn"><a class="navbar-brand menujs pl-4 border-left" href="#">دسته
                                    بندی</a></button>
                            <ul class="navbar-nav">
                                <li class="nav-item pl-4 active">
                                    <a class="nav-link" href="index.php">صفحه اصلی </a>
                                </li>
                                <li class="nav-item pl-4">
                                    <a class="nav-link" href="#">کتاب ها</a>
                                </li>
                                <li class="nav-item pl-4">
                                    <a class="nav-link" href="#">پیشنهاد ویژه</a>
                                </li>

                                <li class="nav-item pl-4">
                                    <a class="nav-link" href="#">درباره ما</a>
                                </li>
                                <li class="nav-item pl-4">
                                    <a class="nav-link" href="#">ارتباط با ما</a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
        <div class="megamenu d-none mr-5 position-absolute ">
            <div class="container">
                <div class="row ">

                <?php 

                    $categories_data = $db->query("SELECT * FROM categories ORDER BY rand() limit 12 ");
                    if($categories_data->rowCount() > 0 ){

                        $number_linkes = 0;
                        foreach ($categories_data as $key => $value) {
                            
                            if( ( $number_linkes % 6 == 0 || $number_linkes == 0 ) && $number_linkes < 6 ){
                                echo '<div class="col-md-6 p-0 m-0">
                                        <ul class="list-group p-0 m-0">';
                            }

                            echo '
                                <a href="index.php?ca='.$value['id'].'" target="__blank">
                                    <li class="list-group-item"> '.$value['name'].' </li>
                                </a>
                            ';

                            if($number_linkes % 6 == 0 ){
                                echo '</ul>
                                        </div>';
                           }
                        }

                        $number_linkes++;

                    }else {
                ?>    
                <div class="col-md-6 p-0 m-0">
                    <ul class="list-group p-0 m-0">
                        <a href="#" target="__blank">
                            <li class="list-group-item">لینک</li>
                        </a>
                        <a href="#" target="__blank">
                            <li class="list-group-item">لینک</li>
                        </a>
                        <a href="#" target="__blank">
                            <li class="list-group-item">لینک</li>
                        </a>
                        <a href="#" target="__blank">
                            <li class="list-group-item">لینک</li>
                        </a>
                        <a href="#" target="__blank">
                            <li class="list-group-item">لینک</li>
                        </a>
                        <a href="#" target="__blank">
                            <li class="list-group-item">لینک</li>
                        </a>

                    </ul>
                </div>
                <div class="col-md-6 p-0 m-0">
                    <ul class="list-group p-0 m-0">
                        <a href="#" target="__blank">
                            <li class="list-group-item">لینک</li>
                        </a>
                        <a href="#" target="__blank">
                            <li class="list-group-item">لینک</li>
                        </a>
                        <a href="#" target="__blank">
                            <li class="list-group-item">لینک</li>
                        </a>
                        <a href="#" target="__blank">
                            <li class="list-group-item">لینک</li>
                        </a>
                        <a href="#" target="__blank">
                            <li class="list-group-item">لینک</li>
                        </a>
                        <a href="#" target="__blank">
                            <li class="list-group-item">لینک</li>
                        </a>
                    </ul>
                </div>

                <?php  } ?>
                   
                </div>
            </div>
        </div>
    </header>

    <section class="container-fluid bg-ulw">

        <section class="MainBody">

            <section class="carousel mb-4">
                <div class="row bg-slide">
                    <div class="col-md-1"></div>
                    <div class="col-md-8 ">


                        <div id="slider" class="owl-carousel">
                            <div class="item  bg-slide p-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="assist/img/04.jpg" alt="">
                                    </div>
                                    <div class="col-md-6 text-rigth">
                                        <div class="mr-5 pt-4">
                                            <h2 class="mikhak display-4 text-udark pt-5 "> اسرار ذهن موفق</h2>
                                            <br>
                                            <h3 class="h3 font-weight-light vazir mb-4">
                                                تی هاور اکر
                                            </h3>
                                            <a href="https://www.iranketab.ir/book/1812-secrets-of-the-millionaire-mind-mastering-the-inner-game-of-wealth?utm_source=dehlinks&utm_campaign=aff" target="__blank"
                                                class="btn btn-slider mikhak btn-lg btn-danger mt-4 pr-5 pl-5 ">بیشتر</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item  bg-slide p-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="assist/img/06.jpg" alt="">
                                    </div>
                                    <div class="col-md-6 text-rigth">
                                        <div class="mr-5 pt-4">
                                            <h2 class="mikhak display-4 text-udark pt-5 "> اثر مرکب</h2>
                                            <br>
                                            <h3 class="h3 font-weight-black vazir mb-4">
                                                با رنگ های متفاوت
                                            </h3>
                                            <a href="https://parstuts.ir/product/free-download-book-asar-%D8%AF%D8%A7%D9%86%D9%84%D9%88%D8%AF/" target="__blank"
                                                class="btn btn-slider mikhak btn-lg btn-danger mt-4 pr-5 pl-5">بیشتر</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item  bg-slide p-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="assist/img/04.jpg" alt="">
                                    </div>
                                    <div class="col-md-6 text-rigth">
                                        <div class="mr-5 pt-4">
                                            <h2 class="mikhak display-4 text-udark pt-5 ">اثر مرکب</h2>
                                            <br>
                                            <h3 class="h3 font-weight-light vazir mb-4">
                                                دارن هاردی
                                            </h3>
                                            <a href="https://parstuts.ir/product/free-download-book-asar-%D8%AF%D8%A7%D9%86%D9%84%D9%88%D8%AF/"
                                                class="btn btn-slider mikhak btn-lg btn-danger mt-4 pr-5 pl-5">بیشتر</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-2 ">
                        <div class="row">

                            <?php 

                                $book_three = $db->query("SELECT * FROM `books` ORDER BY RAND() LIMIT 3 ");
                                if($book_three->rowCount() > 0){
                                    foreach ($book_three as $key => $value) {
                                        $img = ( !is_file($value['img']) ) ? 'assist/img/bookimg.png' : $value['img'];
                                        echo '
                                            <a href="book.php?id='.$value['id'].'" class="media w-100 align-items-center bg-light rounded-lg p-2 mt-3 mb-1 shadow-sm mr-xl-0"
                                                href="#" style="min-width: 16rem;"><img src="'.$img.'" style="width: 80px;margin-left: " alt="Banner">
                                                <div class="media-body" style="padding-right: 20px;">
                                                    <h5 class="mb-2 h5 text-dark"><span class="font-weight-light"> '. $value['book_name'].' 
                                                    <div class="text-secondary font-size-sm">بیشتر</div>
                                                </div>
                                            </a>       
                                        ';
                                    }

                                }else {
                        
                            ?>

                            <a class="media w-100 align-items-center bg-light rounded-lg p-2 mt-3 mb-1 shadow-sm mr-xl-0"
                                href="#" style="min-width: 16rem;"><img src="assist/img/banner-sm01.png" style="width: 80px;margin-left: " alt="Banner">
                                <div class="media-body" style="padding-right: 20px;">
                                    <h5 class="mb-2 h5 text-dark"><span class="font-weight-light">مدیریت خود
                                    <div class="text-secondary font-size-sm">بیشتر</div>
                                </div>
                            </a>

                            

                            <a class="media w-100 align-items-center bg-light rounded-lg p-2 mt-3 mb-1 shadow-sm mr-xl-0"
                                href="#" style="min-width: 16rem;"><img src="assist/img/banner-sm01.png" style="width: 80px;margin-left: " alt="Banner">
                                <div class="media-body" style="padding-right: 20px;">
                                    <h5 class="mb-2 h5 text-dark"><span class="font-weight-light">مدیریت خود
                                    <div class="text-secondary font-size-sm">بیشتر</div>
                                </div>
                            </a>

                            <a class="media w-100 align-items-center bg-light rounded-lg p-2 mt-3 mb-1 shadow-sm mr-xl-0"
                                href="#" style="min-width: 16rem;"><img src="assist/img/banner-sm01.png" style="width: 80px;margin-left: " alt="Banner">
                                <div class="media-body" style="padding-right: 20px;">
                                    <h5 class="mb-2 h5 text-dark"><span class="font-weight-light">مدیریت خود
                                    <div class="text-secondary font-size-sm">بیشتر</div>
                                </div>
                            </a>

                            <?php }?>

                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </section>
            <section class="smalCat container mb-4">


                <div id="slider3" class="owl-carousel">

                    <?php 

                        $categories_data = $db->query("SELECT * FROM categories ORDER BY RAND() limit 4 ");
                        if($categories_data->rowCount() > 0 ){
                            
                            foreach ($categories_data as $key => $value) {
                                echo '
                                    <div class="item rounded-sm myshadow m-2 p-2">
                                        <div class="rounded">
                                            <a href="index.php?ca='.$value['id'].'" class="flx flx1 justify-content-around">
                                                <div>
                                                    <img src="assist/img/bookimg.png" alt="">
                                                </div>
                                                <div>
                                                    <div class="mikhak font-weight-light h4 pr-2 ">
                                                        '.$value['name'].'
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                ';
                            }

                        }else {

                    ?>

                    <div class="item rounded-sm myshadow m-2 p-2">
                        <div class="rounded">
                            <a href="#" class="flx flx1 justify-content-around">
                                <div>
                                    <img src="assist/img/360-camers.png" alt="">
                                </div>
                                <div>
                                    <div class="mikhak font-weight-light h4 pr-2 ">
                                        فلسفه
                                    </div>

                                </div>

                            </a>
                        </div>
                    </div>

                    <div class="item rounded-sm myshadow m-2 p-2">
                        <div class="rounded">
                            <a href="#" class="flx flx1 justify-content-around">
                                <div>
                                    <img src="assist/img/banner-sm01.png" alt="">
                                </div>
                                <div>
                                    <div class="mikhak font-weight-light h4 pr-2 ">
                                        دینی
                                    </div>

                                </div>

                            </a>
                        </div>
                    </div>

                    <div class="item rounded-sm myshadow m-2 p-2">
                        <div class="rounded">
                            <a href="#" class="flx flx1 justify-content-around">
                                <div>
                                    <img src="assist/img/banner-sm02.png" alt="">
                                </div>
                                <div>
                                    <div class="mikhak font-weight-light h4 pr-2 ">
                                        تخصصی
                                    </div>

                                </div>

                            </a>
                        </div>
                    </div>

                    <div class="item rounded-sm myshadow m-2 p-2">
                        <div class="rounded">
                            <a href="#" class="flx flx1 justify-content-around">
                                <div>
                                    <img src="assist/img/banner-sm03.png" alt="">
                                </div>
                                <div>
                                    <div class="mikhak font-weight-light h4 pr-2 ">
                                        روابط عمومی
                                    </div>

                                </div>

                            </a>
                        </div>
                    </div>

                    <?php }?>

                </div>

            </section>
            <section class="product container mb-4">

                <div class="d-flex justify-content-between underline mb-4">
                    <div>
                        <h1 class="h4 mikhak underline2 p-1">جدیدترین کتاب ها</h1>
                    </div>
                    <div><a class="a mybg-dark mikhak h5 p-1 pr-2 pl-2" href="#">مشاهده همه</a></div>
                </div>
                <div class="row m-0 p-0">

                    <?php

                        if(isset($_GET['search'])){
                            $name = VD($_GET['name']);
                            $book_data = $db->query("SELECT * FROM `books` WHERE book_name = '$name' ORDER BY RAND() LIMIT 8 ");
                        }else {
                            $book_data = $db->query("SELECT * FROM `books` ORDER BY RAND() LIMIT 8 ");
                        }

                        if($book_data->rowCount() > 0 ){
                            
                            foreach ($book_data as $key => $value) {
                                $img = ( !is_file($value['photo']) ) ? 'assist/img/bookimg.png' : $value['photo'];
                                echo '
                                    <div class="col-md-3 contentbox2 p-0 m-0">
                                        <a href="book.php?id='.$value['id'].'" target="__blank">
                                            <div class="contentbox w-100 p-0 m-0">
                                                <header>
                                                    <figure class="d-flex justify-content-center">
                                                        <img width="600" height="600" src="'.$img.'"
                                                            class="attachment-articlethumb size-articlethumb wp-post-image" alt=""
                                                            sizes="(max-width: 600px) 100vw, 600px">
                                                    </figure>
                                                </header>
                                                <footer class="fotcan ">
                                                    <h2 class="h5 vazir"> '.$value['book_name'].' </h2>
                                                    <div class="pricebox">
                                                        <span class="woocommerce-Price-amount amount"> '.$value['author1'].' </span>
                                                    </div>
                                                    <a href="book.php?id='.$value['id'].'" target="__blank" class="add-to-cart "> <span class="material-icons">
                                                            open_in_new
                                                        </span>
                                                    </a>
                                                </footer>
                                            </div>
                                        </a>
                                    </div>
                                ';
                            }
                        }else {
                            echo '<p style="font-size: 30px;color: red;"> کدام کتابی وجود ندارد  </p>';
                        }
                    ?>

                </div>

            </section>
            <section class="banners container mb-4">
                <div class="row p-0 m-0">
                    <div class="col-md-6 pr-0">
                        <a href="https://soheilamani.com/best-mystery-books/" target="__blank">
                        <div href="#" class="bann myshadow"
                            style="background-image: url('assist/img/1000012817.jpg');                           ">
                        </div></a>
                    </div>
                    <div class="col-md-6 pl-0">
                        <a href="https://www.chetor.com/224231-%DA%A9%D8%AA%D8%A7%D8%A8-%D9%87%D8%A7%DB%8C-%D8%AA%D9%88%D8%B3%D8%B9%D9%87-%D9%81%D8%B1%D8%AF%DB%8C/" target="__blank">
                        <div href="#" class="bann myshadow"
                            style="background-image:url('assist/img/1000012815.jpg');                           ">
                        </div></a>
                    </div>
                </div>
            </section>
            <section class="bestSel container mb-4">
                <div class="d-flex justify-content-between underline mb-4">
                    <div>
                        <h1 class="h4 mikhak underline2 p-1" style="padding: 0 0 10px 0 !important;
                        margin-bottom: -2px !important">محبوبترین کتاب ها</h1>
                    </div>
                    <div><a class="a mybg-dark mikhak h5 p-1 pr-2 pl-2" href="#">مشاهده همه</a></div>
                </div>
                <div class="row p-0 m-0">
                    <ul id="slider4" class="owl-carousel" style="list-style: none;"> 
                        
                    <?php 

                        $famous_book_data = $db->query("SELECT SUM(book_id) AS amount , book_id FROM lending_book GROUP BY book_id ORDER BY amount DESC");
                        if($famous_book_data->rowCount() > 0 ){
                            foreach ($famous_book_data as $key => $value) {
                                $book_row = selectOne('books', $value['book_id']);

                                $img = ( !is_file($book_row['img']) ) ? 'assist/img/bookimg.png' : $book_row['img'];

                                echo '
                                <li>
                                    <div class="col-md-12 contentbox2 p-0 m-0">
                                        <a href="book.php?id='.$book_row['id'].'" target="__blank">
                                            <div class="contentbox w-100 p-0 m-0">
                                                <header>
                                                    <figure class="d-flex justify-content-center">
        
                                                        <img width="600" height="600" src="'.$img.'"
                                                            class="attachment-articlethumb size-articlethumb wp-post-image"
                                                            sizes="(max-width: 600px) 100vw, 600px">
        
        
                                                    </figure>
                                                </header>
                                                <footer class="fotcan ">
                                                    <h2 class="h5 vazir"> '.$book_row['book_name'].' </h2>
                                                    <div class="pricebox">
        
                                                        <span class="woocommerce-Price-amount amount">  '.$book_row['author1'].' </span>
                                                    </div>
                                                    <a href="book.php?id='.$book_row['id'].'" target="__blank" class="add-to-cart "> <span
                                                            class="material-icons">
                                                            open_in_new
                                                        </span>
                                                    </a>
                                                </footer>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                ';

                            }
                        }else {

                    ?>

                        <li>
                            <div class="col-md-12 contentbox2 p-0 m-0">
                                <a href="#" target="__blank">
                                    <div class="contentbox w-100 p-0 m-0">
                                        <header>
                                            <figure class="d-flex justify-content-center">

                                                <img width="600" height="600" src="/assist/img/360-camers.png"
                                                    class="attachment-articlethumb size-articlethumb wp-post-image"
                                                    alt=""
                                                    srcset="/assist/img/360-camers.png 600w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-300x300.jpg 300w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-100x100.jpg 100w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-64x64.jpg 64w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-555x555.jpg 555w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-150x150.jpg 150w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-262x262.jpg 262w"
                                                    sizes="(max-width: 600px) 100vw, 600px">


                                            </figure>
                                        </header>
                                        <footer class="fotcan ">
                                            <h2 class="h5 vazir">اسزار ذهن موفق</h2>
                                            <div class="pricebox">

                                                <span class="woocommerce-Price-amount amount">تی هاور اکر</span>
                                            </div>
                                            <a href="#" target="__blank" class="add-to-cart "> <span
                                                    class="material-icons">
                                                    open_in_new
                                                </span>
                                            </a>
                                        </footer>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="col-md-12 contentbox2 p-0 m-0">
                                <a href="#" target="__blank">
                                    <div class="contentbox w-100 p-0 m-0">
                                        <header>
                                            <figure class="d-flex justify-content-center">

                                                <img width="600" height="600" src="/assist/img/360-camers.png"
                                                    class="attachment-articlethumb size-articlethumb wp-post-image"
                                                    alt=""
                                                    srcset="/assist/img/360-camers.png 600w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-300x300.jpg 300w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-100x100.jpg 100w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-64x64.jpg 64w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-555x555.jpg 555w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-150x150.jpg 150w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-262x262.jpg 262w"
                                                    sizes="(max-width: 600px) 100vw, 600px">


                                            </figure>
                                        </header>
                                        <footer class="fotcan ">
                                            <h2 class="h5 vazir">اسزار ذهن موفق</h2>
                                            <div class="pricebox">

                                                <span class="woocommerce-Price-amount amount">تی هاور اکر</span>
                                            </div>
                                            <a href="#" target="__blank" class="add-to-cart "> <span
                                                    class="material-icons">
                                                    open_in_new
                                                </span>
                                            </a>




                                        </footer>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="col-md-12 contentbox2 p-0 m-0">
                                <a href="#" target="__blank">
                                    <div class="contentbox w-100 p-0 m-0">
                                        <header>
                                            <figure class="d-flex justify-content-center">

                                                <img width="600" height="600" src="/assist/img/360-camers.png"
                                                    class="attachment-articlethumb size-articlethumb wp-post-image"
                                                    alt=""
                                                    srcset="/assist/img/360-camers.png 600w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-300x300.jpg 300w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-100x100.jpg 100w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-64x64.jpg 64w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-555x555.jpg 555w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-150x150.jpg 150w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-262x262.jpg 262w"
                                                    sizes="(max-width: 600px) 100vw, 600px">


                                            </figure>
                                        </header>
                                        <footer class="fotcan ">
                                            <h2 class="h5 vazir">اسزار ذهن موفق</h2>
                                            <div class="pricebox">

                                                <span class="woocommerce-Price-amount amount">تی هاور اکر</span>
                                            </div>
                                            <a href="#" target="__blank" class="add-to-cart "> <span
                                                    class="material-icons">
                                                    open_in_new
                                                </span>
                                            </a>




                                        </footer>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="col-md-12 contentbox2 p-0 m-0">
                                <a href="#" target="__blank">
                                    <div class="contentbox w-100 p-0 m-0">
                                        <header>
                                            <figure class="d-flex justify-content-center">

                                                <img width="600" height="600" src="/assist/img/360-camers.png"
                                                    class="attachment-articlethumb size-articlethumb wp-post-image"
                                                    alt=""
                                                    srcset="/assist/img/360-camers.png 600w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-300x300.jpg 300w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-100x100.jpg 100w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-64x64.jpg 64w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-555x555.jpg 555w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-150x150.jpg 150w, http://localhost:8080/af/wp-content/uploads/2020/03/156288-3-262x262.jpg 262w"
                                                    sizes="(max-width: 600px) 100vw, 600px">


                                            </figure>
                                        </header>
                                        <footer class="fotcan ">
                                            <h2 class="h5 vazir">اسزار ذهن موفق</h2>
                                            <div class="pricebox">

                                                <span class="woocommerce-Price-amount amount">تی هاور اکر</span>
                                            </div>
                                            <a href="#" target="__blank" class="add-to-cart "> <span
                                                    class="material-icons">
                                                    open_in_new
                                                </span>
                                            </a>




                                        </footer>
                                    </div>
                                </a>
                            </div>
                        </li>

                        <?php }?>
                    </ul>

                </div>
            </section>
            <section class="banners container mb-4">
                <div class="row p-0 m-0">
                    <div class="col-md-12 p-0">
                        <div href="#" class="bann myshadow"
                            style="background-image: url('assist/img/1000009413.jpg');                           ">
                        </div>
                    </div>
                </div>
            </section>
            <section class="ManyCat container mb-4">
                <div class="row p-0 m-0">
                    <div class="col-xs-12" style="padding: 0;">
                        <div class="row">
                            <div class="col-md-5" style="margin-bottom:1rem">
                                <div class="myshadow bg-white p-5 mt-3 rounded-lg   ">
                                    <a href="https://fidibo.com/" target="__blank" class="flx">
                                        <div>
                                            <div class="text-muted">_____</div>
                                            <img src="assist/img/1.svg" alt="" width="170">
                                        </div>
                                        <div class="p-3">
                                            <h2 class="h2 pb-2 mikhak">
                                                هزاران کتاب الکترونیک
                                            </h2>
                                            <h3 class="h6 mikhak">
                                                دانلود کتاب الکترونیک
                                            </h3>
                                            <h4 class="mikhak h5 pt-4">
                                                بیشتر
                                            </h4>

                                        </div>

                                    </a>
                                </div>

                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-6 pt-1 pb-1">
                                        <div class="myshadow bg-white rounded-lg p-3 m-2">
                                            <a href="https://taaghche.com/" target="__blank" class="flx">
                                                <div>
                                                    <div class="text-muted">_____</div>
                                                    <img src="assist/img/2.png" alt="" height="80px">
                                                </div>
                                                <div style="padding: 1rem;">
                                                    <h2 class="h5 mikhak">
                                                        کتاب ها الکترونیک
                                                    </h2>
                                                    <h4 class="h6 mikhak">
                                                        بیشتر
                                                    </h4>

                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-1 pb-1">
                                        <div class="myshadow bg-white rounded-lg p-3 m-2">
                                            <a href="https://manybooks.net/" target="__blank" class="flx">
                                                <div>
                                                    <div class="text-muted">_____</div>
                                                    <img src="assist/img/3.svg" alt="" height="80px">
                                                </div>
                                                <div style="padding: 1rem;">
                                                    <h2 class="h5 mikhak">
                                                        کتاب ها الکترونیک
                                                    </h2>
                                                    <h4 class="h6 mikhak">
                                                        بیشتر
                                                    </h4>

                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-1 pb-1">
                                        <div class="myshadow bg-white rounded-lg p-3 m-2">
                                            <a href="https://archive.org/details/texts" target="__blank" class="flx">
                                                <div>
                                                    <div class="text-muted">_____</div>
                                                    <img src="assist/img/4.gif" alt="" height="80px">
                                                </div>
                                                <div style="padding: 1rem;">
                                                    <h2 class="h5 mikhak">
                                                        کتاب ها الکترونیک
                                                    </h2>
                                                    <h4 class="h6 mikhak">
                                                        بیشتر
                                                    </h4>

                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-1 pb-1">
                                        <div class="myshadow bg-white rounded-lg p-3 m-2">
                                            <a href="https://wikipedia.org/" target="__blank" class="flx">
                                                <div>
                                                    <div class="text-muted">_____</div>
                                                    <img src="assist/img/5.png" alt="" height="80px">
                                                </div>
                                                <div style="padding: 1rem;">
                                                    <h2 class="h5 mikhak">
                                                        کتاب ها الکترونیک
                                                    </h2>
                                                    <h4 class="h6 mikhak">
                                                        بیشتر
                                                    </h4>

                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="team container mb-4">
                <div class="row p-0 m-0">
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css"
                        integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

                    <div class="container bootdey">
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="section-title mt-1 pb-1">
                                    <h4 class="title h1 mikhak mb-1">اساتید </h4>

                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row">

                            <?php 

                                $teachers_names = $db->query("SELECT * FROM `teachers` ORDER BY RAND() LIMIT 4 ");
                                if($teachers_names->rowCount()> 0) {
                                    foreach ($teachers_names as $key => $value) {

                                        $img = ( !is_file($value['photo']) ) ? 'assist/img/1.png' : $value['photo'];

                                        echo '
                                            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                                                <div class="team text-center rounded p-3 py-4">
                                                    <img src="'.$img.'"
                                                        class="img-fluid avatar avatar-medium shadow rounded-pill" alt="">
                                                    <div class="content mt-3">
                                                        <h4 class="title mb-0"> '.$value['full_name'].' </h4>
                                                        <small class="h5"> '.$value['note'].' </small>
                                                        <!--end icon-->
                                                    </div>
                                                </div>
                                            </div>
                                        ';
                                    }
                                }else {
                            ?>

                            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                                <div class="team text-center rounded p-3 py-4">
                                    <img src="assist/img/1.png"
                                        class="img-fluid avatar avatar-medium shadow rounded-pill" alt="">
                                    <div class="content mt-3">
                                        <h4 class="title mb-0">نجیب الرحمان حدید</h4>
                                        <small class="h5">رییس فاکولته</small>
                                        <!--end icon-->
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                                <div class="team text-center rounded p-3 py-4">
                                    <img src="assist/img/1.png"
                                        class="img-fluid avatar avatar-medium shadow rounded-pill" alt="">
                                    <div class="content mt-3">
                                        <h4 class="title mb-0">سعید منیرسادات</h4>
                                        <small class="h5">مسِول کتابخانه</small>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                                <div class="team text-center rounded p-3 py-4">
                                    <img src="assist/img/1.png"
                                        class="img-fluid avatar avatar-medium shadow rounded-pill" alt="">
                                    <div class="content mt-3">
                                        <h4 class="title mb-0">بصیراحمد دانشیار</h4>
                                        <small class="h5">آمر دیپارتمنت</small>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                                <div class="team text-center rounded p-3 py-4">
                                    <img src="assist/img/1.png"
                                        class="img-fluid avatar avatar-medium shadow rounded-pill" alt="">
                                    <div class="content mt-3">
                                        <h4 class="title mb-0">غلام حیدر تابش</h4>
                                        <small class="h5">آمر دیسیپلین</small>
                                    </div>
                                </div>
                            </div>

                            <?php }?>

                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </section>

        </section>

    </section>

    <footer class="footer text-ulight">



        <div class="container pt-3 mb-3">
            <div class="row mb-0">

                <div class="col-xs-12 col-sm-6 col-lg-6 border-left">
                    <div class="row p-5 text-ulight">
                        <h3 class="mikhak h3 p-2 pl-4 pr-3 rounded-sm ">در باره ما</h3>
                        <span class="vazir" style="font-family: iransans;"> آینده شناخت فراوان جامعه و متخصصان را می
                            طلبد تا با
                            نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در
                            زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام
                        </span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <div class="row p-5 text-ulight">
                        <h3 class="mikhak h3 p-2 pl-4 pr-3 rounded-sm ">در باره ما</h3>
                        <span class="vazir" style="font-family: iransansdn;"> آینده شناخت فراوان جامعه و متخصصان را می
                            طلبد تا با
                            نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در
                            زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام
                        </span>
                    </div>
                </div>

            </div>
        </div>
        <div class="footer-copyright">
            <p>© تمامی حقوق برای AfghanVTeam محفوظ است .</p>
        </div>
        <div class="footer-copyright2">
            <p>Design & developed by <a href="https://afghanvteam.github.io/" target="_blank"
                    style="cursor: pointer">AfghanVTeam</a> </p>
        </div>
    </footer>

    <section class="script">
        <!-- theme -->
        <script src="assist/js/jquery.js"></script>
        <!-- <script src="assist/js/popper.js"></script> -->
        <script src="assist/js/bootstrap.min.js"></script>

        <!-- auto suggest -->
        <script
            src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.7/dist/latest/bootstrap-autocomplete.min.js">
        </script>

        <!-- carousel -->
        <script src="assist/js/owl.carousel.min.js"></script>
        <script src="assist/js/script.js"></script>
        <script>
            $('.basicAutoComplete').autoComplete({
                resolverSettings: {
                    url: 'testdata/test-list.json'
                }
            });
        </script>
    </section>

</body>

</html>