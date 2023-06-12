<?php
    if(!empty($_POST)){
        $db = new mysqli();
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        $email = $_POST["email"];
        $password = $_POST["password"];

        $q = "SELECT email, password FROM users WHERE email=\"" . $email . "\" AND password=\"" . $password . "\"";
        $response = $db->query($q);


        if($response == TRUE){
            $r = $response->fetch_assoc();
            if ($r["email"] == $email && $r["password"] == $password){
                session_start();
                $_SESSION["email"] = $email;
                header("Location: index.php");
            } else{
                header("Location: SignIn.html");
            }
            
            
        } else{
            
            echo $db->error;
            
        }

        $db->close();
    }

    



?>