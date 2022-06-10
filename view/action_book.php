<?php

require_once ("_config.php");

// insert query

if(isset($_POST['insert'])){

    // Validition book name
    $book_name = $_POST['book_name'];
    $query = $db->query("SELECT * FROM `books` WHERE `book_name` = '$book_name' AND `is_deleted` = '0'");
    if($query->rowCount()>0){
        header("location:add_book.php?Duplicate");
        exit();
    }


    $user_id = '1';
    $lasrId  = last_id('books') + 1;
    $file         = save_file('books',$lasrId,'book_factor'); 
    sleep(1);
    $soft_file    = save_file('books',$lasrId,'book_soft_file');
    $photo        = save_file('books',$lasrId);


    $data = [
        'isbn'               => VD($_POST['isbn']),
        'book_code'          => VD($_POST['book_code']),
        'book_name'          => VD($_POST['book_name']),
        'num_page'           => VD($_POST['num_page']),
        'book_languge'       => VD($_POST['book_languge']),
        'author1'            => VD($_POST['author1']),
        'author2'            => VD($_POST['author2']),
        'author3'            => VD($_POST['author3']),
        'book_quantity'      => VD($_POST['book_quantity']),
        'print_year'         => VD($_POST['print_year']),
        'book_translator'    => VD($_POST['book_translator']),
        'category_id'        => VD($_POST['category_id']),
        'book_row'           => VD($_POST['book_row']),
        'book_column'        => VD($_POST['book_column']),
        'photo'              => $photo,
        'book_factor'        => $file,
        'book_soft_file'     => $soft_file,
        'note'               => ($_POST['note']),
        'date'               => VD($_POST['date']),
        'user_id'            => $user_id,
        
    ];


    $insert = insert('books',$data);
    if($insert){
        header("location: add_book.php?saved");
        exit();
    }else{
        header("location: add_book.php?error");
        exit();
    }

}

// delete query

if(isset($_GET['delete']) && isset($_GET['id']) ){

    $id      = base64_decode($_GET['id']);

    // Validition delete book
    $query = $db->query("SELECT * FROM `lending_book` WHERE `book_id` = '$id' AND `is_deleted` = '0'");
    if($query->rowCount()>0){
        header("location:add_book.php?Use_info&id=".base64_encode($id));
        exit();
    }

    $deleted = edit('books',['is_deleted' => 1],$id);
   
    if($deleted){
        header("location: add_book.php?deleted");
        exit();
    }else{
        header("location: add_book.php?error");
        exit();
    }
}

// edit query
if (isset($_POST['edit']) AND isset($_POST['id'])) {

    $id = base64_decode($_POST['id']);
    $path       = VD($_POST['lastphoto']);
    
    if (!empty($_FILES['photo']['name'])){
        $path  = replace_file('books',$id,$path);
    }

    // Validition book name
    $book_name = $_POST['book_name'];
    $query = $db->query("SELECT * FROM `books` WHERE `book_name` = '$book_name' AND `is_deleted` = '0' AND `id` != '$id'");
    if($query->rowCount()>0){
        header("location:edit_book.php?Duplicate&id=".base64_encode($id));
        exit();
    }

    $user_id = '1';

     $edit_data = [
        'isbn'               => VD($_POST['isbn']),
        'book_code'          => VD($_POST['book_code']),
        'book_name'          => VD($_POST['book_name']),
        'num_page'           => VD($_POST['num_page']),
        'book_languge'       => VD($_POST['book_languge']),
        'author1'            => VD($_POST['author1']),
        'author2'            => VD($_POST['author2']),
        'author3'            => VD($_POST['author3']),
        'book_quantity'      => VD($_POST['book_quantity']),
        'print_year'         => VD($_POST['print_year']),
        'book_translator'    => VD($_POST['book_translator']),
        'category_id'        => VD($_POST['category_id']),
        'book_row'           => VD($_POST['book_row']),
        'book_column'        => VD($_POST['book_column']),
        'photo'              => $path,
        'book_factor'        => $file,
        'book_soft_file'     => VD($_POST['book_soft_file']),
        'note'               => VD($_POST['note']),
        'date'               => VD($_POST['date']),
        'user_id'            => $user_id,
        
    ];

    $query = edit('books',$edit_data,$id);
    if ($query) {
        header("location: edit_book.php?edit&id=".base64_encode($id));
        exit();
    }else{
        header("location: edit_book.php?error&id=".base64_encode($id));
        exit();
    }
}
?>
