<?php

require_once ("_config.php");

// add query
if(isset($_POST['insert'])){


    // Validition student id
    $student_id = $_POST['student_id'];
    $query = $db->query("SELECT * FROM `students` WHERE `student_id` = '$student_id' AND `is_deleted` = '0'");
    if($query->rowCount()>0){
        header("location:add_student.php?Duplicate");
        exit();
    }


    $lasrId  = last_id('students') + 1;
    $file    = save_file('students',$lasrId);

    $data = [
        'student_id'         => VD($_POST['student_id']),
        'full_name'          => VD($_POST['full_name']),
        'father_name'        => VD($_POST['father_name']),
        'graduate_year'      => VD($_POST['graduate_year']),
        'phone'              => VD($_POST['phone']),
        'email'              => VD($_POST['email']),
        'note'               => VD($_POST['note']),
        'date'               => VD($_POST['date']),
        'photo'              => $file ,
        'user_id'            => $user_id,
    ];


    $insert = insert('students',$data);
    if($insert){
        header("location: add_student.php?saved");
        exit();
    }else{
        header("location: add_student.php?error");
        exit();
    }

}

// delete query

if(isset($_GET['delete']) && isset($_GET['id']) ){

    $id      = base64_decode($_GET['id']);
    
   $deleted = edit('students',['is_deleted' => 1],$id);
   

    if($deleted){
        header("location: add_student.php?deleted");
        exit();
    }else{
        header("location: add_student.php?error");
        exit();
    }
}

// edit query
if (isset($_POST['edit']) AND isset($_POST['id'])) {

    $id         = base64_decode($_POST['id']);
    
    $file       = VD($_POST['lastphoto']); 

    if(!empty($_FILES['photo']['name'])){
        $file =  replace_file('students',$id,$file,'photo');
    }

    // Validition student id
    $student_id = $_POST['student_id'];
    $query = $db->query("SELECT * FROM `students` WHERE `student_id` = '$student_id' AND `is_deleted` = '0' AND `id` != '$id'");
    if($query->rowCount()>0){
        header("location:edit_student.php?Duplicate&id=".base64_encode($id));
        exit();
    }


    $edit_data = [
        'student_id'         => VD($_POST['student_id']),
        'full_name'          => VD($_POST['full_name']),
        'father_name'        => VD($_POST['father_name']),
        'graduate_year'      => VD($_POST['graduate_year']),
        'phone'              => VD($_POST['phone']),
        'email'              => VD($_POST['email']),
        'note'               => VD($_POST['note']),
        'date'               => VD($_POST['date']),
        'photo'              => $file,
        'user_id'            => $user_id,
        
    ];

    $query = edit('students',$edit_data,$id);
    if ($query) {
        header("location: edit_student.php?edit&id=".base64_encode($id));
        exit();
    }else{
        header("location: edit_student.php?error&id=".base64_encode($id));
        exit();
    }
}
?>
