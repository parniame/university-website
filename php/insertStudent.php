<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Document</title>
</head>

<body>
   
        <?php

        session_start();
       
        require_once("connect.php");
        
        // Taking all 6 values from the form data(input)
        $user_name =  $_REQUEST['user-name'];
        $first_name =  $_REQUEST['first-name'];
        $last_name = $_REQUEST['last-name'];
        $date =  $_REQUEST['birth-date'];
        $code = $_REQUEST['student-code'];
        $email = $_REQUEST['email'];

        $_SESSION['user_name'] = $user_name;

       $stmt = "INSERT INTO usersinformation  (userName,firstName,LastName,birthDate
                ,studentCode,email,password)
                    VALUES ('$user_name' ,'$first_name', 
                    '$last_name','$date','$code','$email',?)";
        
        $_SESSION["insert_student_stmt"] = $stmt;
        
        $url = "http://localhost:80/university-website/insertpassword.htm";
        header("Location: $url");
        
        
        // Close connection
        mysqli_close($conn);
        ?>
   
</body>

</html>