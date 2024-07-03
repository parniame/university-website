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
    <link rel="stylesheet" href="css/style.css">
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
        
        $user_name = $_SESSION['user_name']  ;
        $password = $_REQUEST['password'];
        $passwordR = $_REQUEST['password-repeat'];
        $sql = "UPDATE usersinformation
                SET password = '$password'
                WHERE userName = '$user_name'";
        
        if(mysqli_query($conn, $sql)){
            $url = "../index.html";
            header("Location: $url");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
        mysqli_close($conn);
        ?>
   
</body>

</html>