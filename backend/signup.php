<?php
    include ('connection.php');
    // if($conn){
    //     echo "Good";
    // }
    // else echo "baad";

    if(isset($_POST['upBtn'])){
        $f_name = $_POST['fullName'];
        $c_name = $_POST['committeeName'];
        $phone = $_POST['number'];
        $u_email = $_POST['upEmail'];
        $pass = $_POST['password'];
        $img_name = $_FILES['file-upload-field']['name'];

        $target= 'Task/image/'.basename($img_name);

        if(empty($f_name)||empty($c_name)||empty($phone)||empty($u_email)||empty($pass))
            echo "<script> alert('You Did not set all the inputs');  window.location.href='../main.php';</script>";

        else{
            $record_phone= $conn->query("SELECT phone_number FROM signup WHERE phone_number='$phone'");
            $record_mail= $conn->query("SELECT email FROM signup WHERE email='$u_email'");
        

            if($record_phone->num_rows != 0)
                echo "<script> alert('Oops!, This Phone Number already Exists!');  window.location.href='../main.php';</script>";
            elseif($record_mail->num_rows != 0)   
                echo "<script> alert('Oops!, This Email already Exists!');  window.location.href='../main.php';</script>";
        
            else{
                $sql_insert="INSERT INTO signup (full_name,committee_name,phone_number,email,pass,personal_image_name)
                VALUES ('$f_name','$c_name','$phone','$u_email','$pass','$img_name');";

                move_uploaded_file($_FILES['file-upload-field']['temp_name'],$target);
        
                if (mysqli_query($conn,$sql_insert) )  
                    echo "<script> alert('Submitted <3'); window.location.href='signup.php';</script>";
            
                else 
                    echo "<script> alert('Failed!');  window.location.href='../main.php';</script>";          
            }
        }
    }



    
    
