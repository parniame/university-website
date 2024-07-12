<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="http://localhost:80/university-website/css/style.css">
    <title>Document</title>
</head>

<body>
   
        <?php
        session_start();
        require_once("connect.php");
        
        $user_name = $_SESSION['user_name']  ;
        
        $insert_stmt = $_SESSION["insert_student_stmt"];
        $password = $_REQUEST['password'];
       
        
        
         try 
         {  
            if ($bind_stmt = $conn->prepare($insert_stmt)) {
            $bind_stmt->bind_param("s",$password);
            //echo $bind_stmt;
                if($bind_stmt->execute()){
                    $message = "نام کاربری "."'$user_name'". "با موفقیت وارد شد \n" ;
                    echo $message;
                    $url = "http://localhost:80/university-website/sign_in_student.htm";
                    header("Location: $url");

                
                } 

                
            }
            else{
                $message  = "سرور به مشکل خورد";
            }
             
             
             echo $message;
         } 
     catch(Throwable $e)
         {   
            
             if (mysqli_errno($conn) == 1062) {
                 $message =   "نام کاربری تکراری است!";
             }
             else{
                 $message =   "نام کاربری "."'$user_name'"."در ورود به مشکل خورد \n";
                 
             }
             echo $message;

         }       
            
        
        mysqli_close($conn);
        ?>
   
</body>

</html>