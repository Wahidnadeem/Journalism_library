<?php
     require_once ("_config.php");

    if (isset($_POST['student_id'])) {
        $student_id         = $_POST['student_id'];
        $student_row     	= $db->query("SELECT * FROM `students` WHERE `id` = '$student_id' LIMIT 1");
        $student_row     	= $student_row->fetch();

        echo '<tr>
                    <th class="center cfont" style="font-size:12px;"  >'.$student_row['student_id'].'</th>
                    <th class="center cfont" style="font-size:12px;"  >'.$student_row['full_name'].'</th>
                    <th class="center cfont" style="font-size:12px;"  >'.$student_row['father_name'].'</th>
            </tr>';

    }

     if (isset($_POST['book_id'])) {
        $book_id        = $_POST['book_id'];
        $book_row     	= $db->query("SELECT * FROM `books` WHERE `id` = '$book_id' LIMIT 1");
        $book_row     	= $book_row->fetch();
	$category_id = $book_row['category_id'];
	$category_name = $db->query(" SELECT * FROM `categories` WHERE `id` = $category_id LIMIT 1  ")->fetch()['name'];

        echo '<tr>
                    <th class="center cfont" style="font-size:12px;"  >'.$book_row['book_name'].'</th>
                    <th class="center cfont" style="font-size:12px;"  >'.$book_row['book_quantity'].'</th>
                    <th class="center cfont" style="font-size:12px;"  >'.$book_row['author1'].' , '.$book_row['author2'].' , '.$book_row['author3'].'</th>
                    <th class="center cfont" style="font-size:12px;"  >'.$book_row['print_year'].'</th>
                    <th class="center cfont" style="font-size:12px;"  >'.$book_row['book_languge'].'</th>
                    <th class="center cfont" style="font-size:12px;width:50px;" dir ="ltr" >'.$book_row['book_row'].' X '.$book_row['book_column'].' </th>
		    <th class="center cfont" style="font-size:12px;"  >'.$category_name.'</th>
            </tr>';

    }

?>