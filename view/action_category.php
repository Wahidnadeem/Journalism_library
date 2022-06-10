<?php

require_once ("_config.php");


// add sick
if(isset($_POST['insert'])){

    // Validition category name
    $name = $_POST['name'];
    $query = $db->query("SELECT * FROM `categories` WHERE `name` = '$name' AND `is_deleted` = '0'");
    if($query->rowCount()>0){
        header("location:add_category.php?Duplicate");
        exit();
    }
   

    $user_id = 1;
    $data = [
        'name'          => VD($_POST['name']),
        'note'          => VD($_POST['note']),
        'date'          => VD($_POST['date']),
        'user_id'       => $user_id,
        
    ];



    $insert = insert('categories',$data);
    if($insert){
        header("location: add_category.php?saved");
        exit();
    }else{
        header("location: add_category.php?error");
        exit();
    }

}

// delete query

// deldte sick
if(isset($_GET['delete']) && isset($_GET['id']) ){

    $id      = base64_decode($_GET['id']);

    // Validition delete category
    $query = $db->query("SELECT * FROM `books` WHERE `category_id` = '$id' AND `is_deleted` = '0'");
    if($query->rowCount()>0){
        header("location:add_category.php?Use_info&id=".base64_encode($id));
        exit();
    }
    
   $deleted = edit('categories',['is_deleted' => 1],$id);
   

    if($deleted){
        header("location: add_category.php?deleted");
        exit();
    }else{
        header("location: add_category.php?error");
        exit();
    }
}

// edit sick
if (isset($_POST['edit']) AND isset($_POST['id'])) {
    $id = base64_decode($_POST['id']);

    // Validition category name
    $name = $_POST['name'];
    $query = $db->query("SELECT * FROM `categories` WHERE `name` = '$name' AND `is_deleted` = '0' AND `id` != '$id'");
    if($query->rowCount()>0){
        header("location:edit_category.php?Duplicate&id=".base64_encode($id));
        exit();
    }

    $edit_data = [
        'name'          => VD($_POST['name']),
        'note'          => VD($_POST['note']),
        'date'          => VD($_POST['date'])
        
    ];

    $query = edit('categories',$edit_data,$id);
    if ($query) {
        header("location: edit_category.php?edit&id=".base64_encode($id));
        exit();
    }else{
        header("location: edit_category.php?error&id=".base64_encode($id));
        exit();
    }
}
?>
