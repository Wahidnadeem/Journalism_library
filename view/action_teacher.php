<?php

require_once ("_config.php");

// add query
if(isset($_POST['insert'])){


    // Validition teacher name
    $full_name = $_POST['full_name'];
    $query = $db->query("SELECT * FROM `teachers` WHERE `full_name` = '$full_name' AND `is_deleted` = '0'");
    if($query->rowCount()>0){
        header("location:add_teacher.php?Duplicate");
        exit();
    }

    $lasrId  = last_id('teachers') + 1;
    $file    = save_file('teachers',$lasrId);

    $data = [

        'teacher_id'         => VD($_POST['teacher_id']),
        'full_name'          => VD($_POST['full_name']),
        'father_name'        => VD($_POST['father_name']),
        'department'         => VD($_POST['department']),
        'phone'              => VD($_POST['phone']),
        'email'              => VD($_POST['email']),
        'note'               => VD($_POST['note']),
        'photo'              => $file,
        'date'               => VD($_POST['date']),
        'user_id'            => $user_id,
        
    ];


    $insert = insert('teachers',$data);
    if($insert){
        header("location: add_teacher.php?saved");
        exit();
    }else{
        header("location: add_teacher.php?error");
        exit();
    }

}

// delete query

if(isset($_GET['delete']) && isset($_GET['id']) ){

    $id      = base64_decode($_GET['id']);
    
   $deleted = edit('teachers',['is_deleted' => 1],$id);
   

    if($deleted){
        header("location: add_teacher.php?deleted");
        exit();
    }else{
        header("location: add_teacher.php?error");
        exit();
    }
}

// edit query
if (isset($_POST['edit']) AND isset($_POST['id'])) {

    $id         = base64_decode($_POST['id']);
    $file       = VD($_POST['lastphoto']); 

    if(!empty($_FILES['photo']['name'])){
        $file =  replace_file('teachers',$id,$file,'photo');
    }


    // Validition teacher name
    $full_name = $_POST['full_name'];
    $query = $db->query("SELECT * FROM `teachers` WHERE `full_name` = '$full_name' AND `is_deleted` = '0' AND `id` != '$id'");
    if($query->rowCount()>0){
        header("location:edit_teacher.php?Duplicate&id=".base64_encode($id));
        exit();
    }

    $edit_data = [

        'teacher_id'         => VD($_POST['teacher_id']),
        'full_name'          => VD($_POST['full_name']),
        'father_name'        => VD($_POST['father_name']),
        'department'         => VD($_POST['department']),
        'phone'              => VD($_POST['phone']),
        'email'              => VD($_POST['email']),
        'note'               => VD($_POST['note']),
        'date'               => VD($_POST['date']),
        'user_id'            => $user_id,
        'photo'              => $file,
        
    ];

    $query = edit('teachers',$edit_data,$id);
    if ($query) {
        header("location: edit_teacher.php?edit&id=".base64_encode($id));
        exit();
    }else{
        header("location: edit_teacher.php?error&id=".base64_encode($id));
        exit();
    }
}
?>
