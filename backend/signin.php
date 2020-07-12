<?php
    include ('connection.php');

    if(isset($_POST['inBtn'])){
        $email = $_POST['inEmail'];
        $pass = $_POST['inPass'];

        if(empty($email)||empty($pass))
            echo "<script> alert('You Did not set all the inputs');  window.location.href='../main.php';</script>";

        else{
            $record_mail= $conn->query("SELECT email FROM signup WHERE email='$email'");
            $record_pass= $conn->query("SELECT pass FROM signup WHERE pass='$pass'");
        

            if($record_mail->num_rows == 0)   
                echo "<script> alert('Oops! This Email Does Not Exists! Please, sign up first');  window.location.href='../main.php';</script>";
            
            elseif($record_pass->num_rows == 0)
                echo "<script> alert('Oops! This Password is not correct!');  window.location.href='../main.php';</script>";
        
            else
                echo "<script> alert('Signed Succefully <3'); window.location.href='../main.php';</script>";
        }
    }



    
    
