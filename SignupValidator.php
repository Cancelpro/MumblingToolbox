<?php
    $username_Regex = "/[a-zA-Z]+/";
    $email_Regex = "/^[a-zA-Z0-9-_]+@[a-zA-Z0-0-_]+\.[a-zA-Z]+$/";
    $bday_Regex = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/";
    $password_Regex = "/[a-zA-Z]\.*/";
    
    echo "bady";
    if(!empty($_POST)){
        $email = $_POST["email"];
        $username = $_POST["username"];
        $bday = $_POST["birthday"];
        $password = $_POST["password"];
        
        $emailValid = preg_match($email_Regex, $email);
        $usernameValid = preg_match($username_Regex, $username);
        $bdayValid = preg_match($bday_Regex, $bday);
        $passwordValid = preg_match($password_Regex, $password);

        if($emailValid && $usernameValid && $bdayValid && $passwordValid
            && $email != "" && $username != "" && $bday != "" && $password != ""){
                $StoreImage = "uploads/" . $_FILES["image"]["name"]; 
                echo $StoreImage;

                move_uploaded_file($_FILES["image"]["tmp_name"], $StoreImage);

                $db = new mysqli();
                if($db->connect_error){
                    die("Connection failed: " . $db->connect_error);
                }

                $q = "INSERT INTO users (email, password, username, DoB) VALUES ( \"" . $email . "\", \"" . $password . "\", \"" . $username . "\", \"" . $bday . "\")";
                $response = $db->query($q);

                if($response == TRUE){
                    header("Location: index.php");
                } else{
                    echo $db->error;
                }
            } else{
                header("Location: SignUp.html");
            }

            $db->close();

    }
?>
