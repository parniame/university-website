<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Document</title>
</head>

<body>
   
        <?php
        $conn = mysqli_connect("localhost", "root", "", "University");
        
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
        $user_name = $_REQUEST['user-name']  ;
        $password = $_REQUEST['password'];
        
       
        $isAdmin = $_COOKIE["Admin"]  ;
        // delete cookie
        setcookie("Admin", "", time() - 3600); 
        $sql = "SELECT userName, password,isAdmin
                    FROM  usersinformation
                    WHERE userName = '$user_name' AND isAdmin = $isAdmin

            ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result -> fetch_array(MYSQLI_ASSOC);
            
            if($row["password"] == $password){
                echo "You logged in!";
            }
          } else {
            echo "0 results";
          }
        
        // Close connection
        mysqli_close($conn);
        ?>
   
</body>

</html>