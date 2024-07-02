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
        echo "hand";
        // Performing insert query execution
        if(mysqli_query($conn, $sql)){
          ?>
          
          <form action="insertpass.php" method="post"  class="w-75 mx-auto">
        <img
        class="col-1  py-3   icon-large  "
        src="atu_logo.png"
        alt="allame icon"
      />
      <h1 class="h1 my-3  ">فرم عضویت</h1>
      
        <div class="border form-control my-2 ">
            <label class="form-label" for="password">

            </label><small class="text-muted">پسوردانتخابی</small> 
            </label>
            <input 
           
              class="border-0 form-control p-0"
              type="password"
              name="password"
              id="password"
              required
              minlength="3" 
            />
          </div>
          <div class="border form-control my-2 ">
            <label class="form-label" for="password-repeat">

            </label><small class="text-muted">تکرار پسورد</small> 
            </label>
            <input 
           
              class="border-0 form-control p-0"
              type="password"
              name="password-repeat"
              id="password-repeat"
              required
              minlength="3" 
            />
          </div>
          <button class="btn btn-primary w-100" type="submit">عضویت</button>
          <p class="my-5 text-muted"><small>&copy 2017-2024</small></p>
        <p id="message"></p>
        <script src="js/sign_up.js"></script>
        <?php
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
        
        

        
        
        
        
        

        
        
        
        // Close connection
        mysqli_close($conn);
        ?>
   
</body>

</html>