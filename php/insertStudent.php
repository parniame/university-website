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
       
        $conn = mysqli_connect("localhost", "root", "", "University");
        
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
        
        // Taking all 6 values from the form data(input)
        $user_name =  $_REQUEST['user-name'];
        $first_name =  $_REQUEST['first-name'];
        $last_name = $_REQUEST['last-name'];
        $date =  $_REQUEST['birth-date'];
        $code = $_REQUEST['student-code'];
        $email = $_REQUEST['email'];

        $_SESSION['user_name'] = $user_name;

        $sql = "INSERT INTO usersinformation  (userName,firstName,LastName,birthDate
                ,studentCode,email)
        VALUES ('$user_name' ,'$first_name', 
            '$last_name','$date','$code','$email')";
        
        // Performing insert query execution
        if(mysqli_query($conn, $sql)){
          $url = "insertpassword.htm";
          header("Location: $url");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
            
        
        // Close connection
        mysqli_close($conn);
        ?>
   
</body>

</html>