<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Document</title>
</head>

<body>
   
        <?php
        
            require_once("connect.php");
            session_start();
            $user_name = $_REQUEST['user-name']  ;
            $_SESSION["user_name"] = $user_name;
            
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
                      if($isAdmin){
                        $url = "http://localhost:80/university-website/manager.php";
                        header("Location: $url");
                      }
                      else{
                        $url = "http://localhost:80/university-website/php/student.php";
                        header("Location: $url");
                      }

                        
                    }
                    else{
                      
                      $url = "http://localhost:80/university-website/error_signIN.html";
                      header("Location: $url");

                    }
              } else {
                  $url = "http://localhost:80/university-website/error_signIN.html";
                  header("Location: $url");

              }
            
            // Close connection
            mysqli_close($conn);
        ?>
        
   
</body>

</html>