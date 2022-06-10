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

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                                    <a class="nav-link" href="index.php">کتاب ها</a>
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
            <div class="container p-3 mt-3 mb-3 rounded shadow">
                <div class="row p-0 m-0">
                    <?php 
                    
                    $id = VD($_GET['id']);
                    if(empty($id)){
                        header("location: index.php");
                        exit();
                    }

                    $book_data = $db->query("SELECT * FROM books WHERE id = '$id' ");
                    if($book_data->rowCount() < 0 ){
                        header("location: index.php");
                        exit();
                    } 

                    $book_row = $book_data->fetch();
                    $img = ( !is_file($book_row['img']) ) ? 'assist/img/bookimg.png' : $book_row['img'];
                    
                    ?>
                    <div class="col-md-3"><img src="<?=$img?>" width="300rem" alt="" sizes=""></div>
                    <div class="col-md-6">
                        <h3 class="font-width-bold mt-4"> <?= (empty($book_row['book_name'])) ? '': $book_row['book_name'] ?> </h3>
                        <h5 class="pt-3">نویسنده : <?= (empty($book_row['author1'])) ? '': $book_row['author1'] ?> </h5>
                        <h5>مترجم :  <?= (empty($book_row['book_translator'])) ? '': $book_row['book_translator'] ?> </h5>

                        <h5>زبان :<?= (empty($book_row['book_languge'])) ? '': $book_row['book_languge'] ?></h5>
                        <h5>تعداد : <?= (empty($book_row['book_quantity'])) ? '': $book_row['book_quantity'] ?> </h5>
                        <h5>تاریخ چاپ : <?= (empty($book_row['print_year'])) ? '': $book_row['print_year'] ?> </h5>
                        <h5>کتگوری :
                            <?php 
                                $categor_id = $book_row['category_id'];
                                $categor_data = $db->query("SELECT * FROM categories WHERE id = '$categor_id'");
                                if($categor_data->rowCount() > 0 ){
                                    $categor_row = $categor_data->fetch();
                                    echo $categor_row['name'];
                                }
                            ?>
                        </h5>

                        <h5>ردیف :<?= (empty($book_row['book_row'])) ? '': $book_row['book_row'] ?></h5>
                        <h5>ستون :<?= (empty($book_row['book_column'])) ? '': $book_row['book_column'] ?></h5>

                        <P class="pt-4">
                            <?= (empty($book_row['note'])) ? '': htmlspecialchars($book_row['note']) ?>
                        </P>
                    </div>
                    <div class="col-md-3 " style="margin-top: 15rem;">
                        <a href="#" target="__Blank">
                            <button class="btn bg-dark text-light w-100 btn-lg">دانلود</button></a>
                        <button class="btn bg-light border text-dark w-100 btn-lg mt-2">اشتراک</button>
                    </div>
                </div>


            </div>
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
            <p>Design & developed by <a href="https://afghanvteam.github.io/" target="_blank" style="cursor: pointer">AfghanVTeam</a> </p>
        </div>
    </footer>

    <section class="script">
        <!-- theme -->
        <script src="assist/js/jquery.js"></script>
        <!-- <script src="assist/js/popper.js"></script> -->
        <script src="assist/js/bootstrap.min.js"></script>

        <!-- auto suggest -->
        <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.7/dist/latest/bootstrap-autocomplete.min.js">
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