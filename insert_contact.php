<?php
    include "php/config/db.connect.php";
    session_start();
    $user = $_POST['user'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];
    echo $user,$username,$email,$feedback;

    if(isset($_POST['submit'])){
        $sql = "INSERT INTO feedback (user, username, email, feedback, created_date) VALUES ('$user', '$username', '$email', '$feedback', now())";
        $result = mysqli_query($conn,$sql);
        if($result){
            $_SESSION['contact'] = "Send Successfully";
            header("location: /contact.php");
        }else{
            echo mysqli_error($conn);
            $_SESSION['contact'] = "Failture";
        }
    }else{
        echo mysqli_error($conn); 
    }

?>