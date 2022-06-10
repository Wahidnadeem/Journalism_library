<?php


require_once ("_config.php");

if(isset($_GET['returnBook'])){

    $id     = base64_decode($_GET['id']);

    $book_id        = $db->query("SELECT `book_id` FROM lending_book WHERE id = $id ")->fetch()['book_id'];
    $book_amount    = $db->query("SELECT `book_quantity` FROM `books` WHERE `id` = $book_id ")->fetch()['book_quantity'] + 0;
    $update         = edit('books',['book_quantity' => ($book_amount + 1 ) ] , $book_id);
    $update = edit('lending_book',['status' => 'done','return_date' => $PDATE ],$id);

    if($update) {
        header("location: return_book.php?update");
        exit();
    }else {
        header("location: return_book.php?error");
        exit();
    }
}

if(isset($_GET['deleted'])){

    $id     = base64_decode($_GET['id']);

    $book_id        = $db->query("SELECT `book_id` FROM lending_book WHERE id = $id ")->fetch()['book_id'];
    $book_amount    = $db->query("SELECT `book_quantity` FROM `books` WHERE `id` = $book_id ")->fetch()['book_quantity'] + 0;
    $update         = edit('books',['book_quantity' => ($book_amount - 1 ) ] , $book_id);

    $update = edit('lending_book',['status' => 'pending','return_date' => $PDATE ],$id);

    echo  $id;

    if($update) {
        header("location: return_book.php?update");
        exit();
    }else {
        header("location: return_book.php?error");
        exit();
    }

}






?>