<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <script type="text/javascript" src="LikeSystem.js"> </script>
        <title>Posts</title>
    </head>

    <body>
        <div class="container2">
            <div class="logo">
                <img src="banner.png" alt="Website Banner" class="banner"/>
            </div>
            
            <?php
            session_start();
            
            if (isset($_SESSION["email"])){
                echo "<div class=\"navigation\">
                    <a href=\"index.html\">Home</a> | <a href=\"SignOut.php\">Log Out   ". $_SESSION["email"] ."</a>
                </div>";
                
            } else{
                echo "<div class=\"navigation\">
                    <a href=\"index.html\">Home</a> | <a href=\"SignIn.html\">Sign in</a>
                </div>"; 
            }
            $db = new mysqli("localhost", "u702343149_tjl089", "Roy12345", "u702343149_users");
            if($db->connect_error){
                die("Connection failed: " . $db->connect_error);
            }

            $q = "SELECT posts.content, posts.title, users.username FROM posts INNER JOIN users ON posts.user_id=users.user_id ORDER BY post_id DESC LIMIT 20";

            $response = $db->query($q);
            $row = $response->fetch_assoc();

            echo "<div class=\"column11\">
                <h2>". $row["title"] . "</h2>
                <a href=\"User.html\"> ". $row["username"] . "</a>
                <p>" . $row["content"] . "</p>

            </div>";
            
            

            echo "<div class=\"column2\">
                <h2>If you want to contribute please consider <a href=\"Post.php\">posting!</a></h2>
            
            </div>
        </div>";
        //$row = $response->fetch_assoc();
        while($row = $response->fetch_assoc()){

            echo "<div class=\"column11\">
            <h2>". $row["title"] . "</h2>
            <a href=\"User.html\"> ". $row["username"] . "</a>
            <p>" . $row["content"] . "</p>

            </div>";
        }
            
        $db->close();


       
?>

        <script type="text/javascript" src="LikeSystem-r.js"> </script>
    </body>


</html>