<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <script type="text/javascript" src="DynamicCounter.js"> </script>
        <title>Create Post</title>
    </head>

    <body>
        <div class="container">
            <div class="logo">
                <img src="banner.png" alt="Website Banner" class="banner"/>
            </div>
    <?php    
            session_start();       
            echo "<div class=\"navigation\">
                <a href=\"index.html\">Home</a> | <a href=\"SignOut.php\">Log Out   " .$_SESSION['email']. "</a>
            </div>";

            
            
            if(isset($_SESSION["email"])){

                echo "<div class=\"post\">
                    <h1>Create Post</h1>
                    <form id=\"Post\" action=\"Post.php\" method=\"post\">
                        
                        
                        <label for=\"title\">Title:</label>
                        <input class=\"textfieldsize\" type=\"text\" id=\"title\" name=\"title\"/>
                        <br>
                        <label id=\"counter\">Word Count: 0</label>
                        <br>
                        <label class=\"alignlable\" for=\"posttext\">Text:</label>
                        <textarea class=\"textfieldsize\" id=\"posttext\" name=\"posttext\" rows=\"10\" cols=\"65\"></textarea>
                        <br>
                        <br>
                        <input type=\"submit\" value=\"Create Post\"/>
                    </form>";

                    if(!empty($_POST)){
                        $db = new mysqli("localhost", "u702343149_tjl089", "Roy12345", "u702343149_users");
                        if($db->connect_error){
                            die("Connection failed: " . $db->connect_error);
                        }

                            $title = $_POST["title"];
                            $content = $_POST["posttext"];
                            if ($title != "" && $content != ""){
                                $q1 = "SELECT user_id FROM users WHERE email=\"" . $_SESSION["email"] . "\"";
                                $user_result = $db->query($q1);
                                $user_id = $user_result->fetch_assoc();
        
                                $q2 = "INSERT INTO posts (user_id, content, title) VALUES (" . $user_id["user_id"] . ", \"" . $content . "\", \"" . $title . "\")";
                                $result = $db->query($q2);
                                if($result == TRUE){
                                    header("Location: index.php");
                                } else{
                                    
                                }
                            }
                        


                    }

                    
                
            } else{
                header("Location: SignIn.html");
            }
                
            $db->close();
        ?>


                </body>
                <script type="text/javascript" src="DynamicCounter-r.js"></script>
            </div>
        </div>


</html>