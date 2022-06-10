<?php
    require_once ("_config.php");
    $type = VD(trim($_POST['type'])); 
    $data = VD(trim($_POST['data'])); 

     // =========================  Check Double Book Code =============================== 

    if ($type == "is_doblicate_book_id") {
        $book_idd        	= $db->query("SELECT book_code FROM `books` WHERE `book_code` = '$data' AND is_deleted = '0' LIMIT 1");
       
        if($book_idd->rowCount() > 0 ){
            echo "true";
            exit();
        }else{
            echo "false";
            exit();
        }
    }

     // =========================  Check Double Book Name =============================== 

     else  if ($type == "is_doblicate_book_name") {

        $book_name            = $db->query("SELECT book_name FROM `books` WHERE `book_name` = '$data' AND is_deleted = '0' LIMIT 1");
       
        if($book_name->rowCount() > 0 ){
            echo "true";
            exit();
        }else{
            echo "false";
            exit();
        }

      
    }

    // =========================  Check Double student id ===============================

    else  if ($type == "is_doblicate_student_id") {

        $student_idd            = $db->query("SELECT student_id FROM `students` WHERE `student_id` = '$data' AND is_deleted = '0' LIMIT 1");
       
        if($student_idd->rowCount() > 0 ){
            echo "true";
            exit();
        }else{
            echo "false";
            exit();
        }

      
    }

    // =========================  Check Double teacher id ===============================

    else  if ( $type == "is_doblicate_teacher_id" ) {

        $teacher_idd           = $db->query("SELECT teacher_id FROM `teachers` WHERE `teacher_id` = '$data' AND is_deleted = '0' LIMIT 1");
       
        if($teacher_idd->rowCount() > 0 ){
            echo "true";
            exit();
        }else{
            echo "false";
            exit();
        }

      
    }

     // =========================  Check Double Category Name ===============================

    else  if ( $type == "is_doblicate_category_name" ) {

        $category_name           = $db->query("SELECT name FROM `categories` WHERE `name` = '$data' AND is_deleted = '0' LIMIT 1");
       
        if($category_name->rowCount() > 0 ){
            echo "true";
            exit();
        }else{
            echo "false";
            exit();
        }

      
    }


?>