
<?php 

    $sender_id = 1;
    $sender_type="کاربر";

    $select_messages = $db->query("SELECT * FROM un_users WHERE id='1' AND has_messages !='' ")->fetch();
    $messages = '';

     $message_arrays = explode(",", $messages);
    
    if($messages==""){

            $message_Count =0;
    }else{

        $message_Count = sizeof($message_arrays);

    }
?>
    <a class="dropdown-toggle" data-close-others="false"  data-toggle="dropdown" href="#">
        <i class="clip-bubble-3"></i>
        <span class="badge"><?= $message_Count; ?></span>
    </a>

    <ul class="dropdown-menu posts">
        <li>
            <span class="dropdown-menu-title" style="text-align: right;">  پیام ها و اعلانات  <?= $message_Count; ?></span>
        </li>
        <li>
            <div class="drop-down-wrapper">
                <ul>
                    <?php 

                        foreach ($message_arrays as $msg) {
                                
                                if($msg !="" AND $msg !=0 ){

                                    $messagesData = $db->query("SELECT m_messages.* FROM m_messages WHERE m_messages.deleted=0    AND m_messages.id='$msg'    $hh_system_type  GROUP BY m_messages.id   ORDER BY id DESC");
                        
                                        if($messagesData->rowCount()>0){
                                            while ($message = $messagesData->fetch()) {

                                                $date = explode(" ", $message['idate'])[0];
                                                $time = explode(" ", $message['idate'])[1];
                                                $to_day= date("Y-m-d");    
                                                $last_day        = date( "Y-m-d", strtotime(  $to_day."-1 day"));

                                                $message_date="";
                                                if($date==DATE('Y-m-d')){
                                                    $message_date = "امروز";
                                                }elseif($date==$last_day){
                                                    $message_date = "دیروز";
                                                }else{
                                                        $message_date =persionData($date);
                                                }

                                                $sender_id  = $message['sender'];
                                                $senderInfo = $db->query(" SELECT * FROM un_users WHERE id ='$sender_id' LIMIT 1 ")->fetch();

                                                echo '<li>
                                                        <a href="messages.php#'.$message['id'].'" target="_blank" style="text-align: right;">
                                                         <span class="label label-success"><i class="fa fa-comment"></i></span>
                                                        <span class="message">'.$senderInfo['name'].'</span>
                                                        <span class="time">'.$message_date.' | '.$time.'</span>
                                                         <p> <i>'.$message['subject'].'</i> </p>
                                                        </a>
                                                     </li>';
                                            }
                                        }
                                }
                         } 
                    ?>
                    <li class="active" >
                        <a href="messages.php" target="_blank" style="text-align: right;">
                            ارسال پیام جدید 
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <?php
            if($messages !=""){
                echo ' <li class="view-all" >
            <a href="messages.php" target="_blank" style="font-weight: bold; text-align: right;">دیدن تمام پیغام ها
              <i class="fa fa-arrow-circle-o-right"></i>
            </a>
        </li>';
            }
         ?>
       
       
    </ul>