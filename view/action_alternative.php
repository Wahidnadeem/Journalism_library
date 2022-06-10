<?php

require_once "_config.php";

if(isset($_GET['deleted']) && !empty($_GET['id'])){

    $id     = base64_decode($_GET['id']);
    $row    = selectOne('alternative_books',$id);

    $lending_id = $row['lending_id'];

    $update_lending_table = edit('lending_book',['is_deleted' => 0],$lending_id);


    $deleted = edit('alternative_books',['is_deleted' => 1],$id);

    if($deleted){
        header("location: list_alternative_book.php?deleted");
        exit();
    }else {
        header("location: list_alternative_book.php?error");
        exit();
    }

}


















?>
