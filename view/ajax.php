<?php

require_once "_config.php";

$type = VD($_POST['type']);

if($type == "check_is_student_get_book"){

    $book_id    = VD($_POST['book_id']);
    $student_id = VD($_POST['student_id']);
    $is_exit = $db->query("SELECT * FROM lending_book WHERE `student_id` = $student_id AND book_id = $book_id AND status = 'pending' AND is_deleted = 0 LIMIT 1 ");

    if($is_exit->rowCount() > 0 ){
        echo  "true";
        exit();
    }else {
        echo "false";
        exit();
    }

}else if ($type == "BARCODE"){
    $key = $_POST['key']; 
    $id  =  substr($key, 2);
    $outPut = base64_decode($id)."##";

    $books = $db->query("SELECT * FROM books WHERE is_deleted = 0 ORDER BY id DESC");
    foreach ($books as $book_row){
        if ($book_row['id'] == base64_decode($id))
            $outPut .='<option selected value="'.$book_row['id'].'"> '.$book_row['book_name'].' </option>';
        else 
            $outPut .='<option value="'.$book_row['id'].'"> '.$book_row['book_name'].' </option>';
    }


    echo $outPut; 
    exit;
}








