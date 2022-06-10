<?php

require_once ("_config.php");

// add query
if(isset($_POST['insert'])){


    $student_id = VD($_POST['student_id']);
    $book_id    = VD($_POST['book_id']);

    $is_lending = $db->query("SELECT * FROM `lending_book` WHERE `student_id` = '$student_id' and `book_id` = '$book_id' AND `is_deleted` = '0' LIMIT 1");
    if($is_lending->rowCount() > 0 ){
        header("location: lending_book.php?exitLending");
        exit();
    }

    $is_book_exit = $db->query("SELECT `book_quantity` FROM books WHERE `id` = '$book_id' LIMIT 1 ")->fetch();
    if($is_book_exit['book_quantity'] < 0 ){
        header("location: lending_book.php?notEnoughBook");
        exit();
    } 


    $data = [
        'student_id'         => VD($_POST['student_id']),
        'book_id'            => VD($_POST['book_id']),
        'date_lend'          => VD($_POST['date_lend']),
        'date_delivery'      => VD($_POST['date_delivery']),        
        'note'               => VD($_POST['note']),
        'user_id'            => $user_id
    ];

    $book_amount = selectOne('books',$_POST['book_id'])['book_quantity'];
    $update = edit('books',['book_quantity' => ($book_amount - 1)],$_POST['book_id']);

    $insert = insert('lending_book',$data);
    if($insert){
        header("location: lending_book.php?saved");
        exit();
    }else{
        header("location: lending_book.php?error");
        exit();
    }

}

// delete query

if(isset($_GET['delete']) && isset($_GET['id']) ){

    $id      = base64_decode($_GET['id']);
    
   $deleted = edit('lending_book',['is_deleted' => 1],$id);
   

    if($deleted){
        header("location: lending_book.php?deleted");
        exit();
    }else{
        header("location: lending_book.php?error");
        exit();
    }
}

// edit query
if (isset($_POST['edit']) AND isset($_POST['id'])) {

     $id         = base64_decode($_POST['id']);
     $user_id = '1';

    $edit_data = [

       'student_id'          => VD($_POST['student_id']),
        'book_id'            => VD($_POST['book_id']),
        'date_lend'          => VD($_POST['date_lend']),
        'date_delivery'      => VD($_POST['date_delivery']),        
        'note'               => VD($_POST['note']),
        'user_id'            => $user_id
        
    ];

    $query = edit('lending_book',$edit_data,$id);
    if ($query) {
        header("location: edit_lending_book.php?edit&id=".base64_encode($id));
        exit();
    }else{
        header("location: edit_lending_book.php?error&id=".base64_encode($id));
        exit();
    }
}

if(isset($_POST['alternative_book'])){

    $lending_book_id    = base64_decode($_POST['lending_book_id']);
    $note               = VD($_POST['note']);
    $row = $db->query("SELECT * FROM `lending_book` WHERE id = '$lending_book_id' ")->fetch();

    $data = [
        'note'          => $note,
        'lending_id'    => $lending_book_id,
        'book_id'       => $row['book_id'],
        'student_id'    => $row['student_id'],
        'user_id'       => $user_id,
        'date'          => $PDATE,
    ];

    $deleted_row = edit('lending_book',['is_deleted' => 1],$lending_book_id);


    $insert  = insert('alternative_books',$data);

    if($insert){
        header("location: return_book.php?save");
        exit();
    }else {
        header("location: return_book.php?save");
        exit();
    }

}





?>
