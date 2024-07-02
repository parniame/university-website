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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  </head>
   
        <?php
        $conn = mysqli_connect("localhost", "root", "", "University");
        
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
        
        $isAdmin = $_COOKIE["Admin"]  ;
        ?>

        
        <div class="container mt-5  p-5 pb-2 bg-light border border-dark w-50">
      
      <form action="php/checkPassword.php" method="post"  class="w-75 mx-auto">
        <img
        class="col-1  py-3   icon-large  "
        src="atu_logo.png"
        alt="allame icon"
      /> 
      <?php 
            if
      ?>
      <h1 class="h1 my-3  ">ورود کاربر</h1>
      <div class="border form-control my-2 ">
        <label class="form-label" for="user-name">

        </label><small class="text-muted">نام کاربری</small> 
        </label>
        <input 
       
          class="border-0 form-control p-0"
          type="text"
          name="user-name"
          id="user-name"
          required
          minlength="3" 
        />
      </div>
      <div class="border form-control my-2 ">
        <label class="form-label" for="password">

        </label><small class="text-muted">پسورد</small> 
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
      
      <button class="btn btn-primary w-100" type="submit">ورود</button>

      <a href="sign-up.html" class=" d-block my-3 text-decoration-none link-danger">عضو نشدید؟ به اینجا کلیک کنید</a>




          <p class="my-5 text-muted"><small>&copy 2017-2024</small></p>
      </form>
      <p id="message"></p>
      </div>
    <script > 
        $(":button").click(function (){
          document.cookie = "Admin= 1;  path=/;";
        })
      </script>
      

        <?php
        // Close connection
        mysqli_close($conn);
        ?>
   
</body>

</html>