<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/26e56465ea.js"
      crossorigin="anonymous"
    ></script>
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost:80/university-website/css/normalize.css" />
    <link rel="stylesheet" href="http://localhost:80/university-website/css/style50.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>Document</title>
  </head>
  <body>
    <header>
      <div class="top-nav-bar">
        <div class="pagetop">
          <h1>دانشکده آمار، ریاضی و رایانه</h1>
          <img class="atu_logo" src="http://localhost:80/university-website/atu_logo.png" alt="atu_logo" />
        </div>
      </div>
      <nav class="subtopnav">
        <a href="http://localhost:80/university-website/index.html" class="item-nav right"> صفحه &zwnj;اصلی</a>
      </nav>
    </header>
    <main>
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
                    
                    

                
                } 

                
            }
            else{
                $message  = "سرور به مشکل خورد";
            }
             
             
             echo "<h1 class='alert alert-danger text-center' role='alert'>
             $message
           </h1>";
         } 
     catch(Throwable $e)
         {   
            
             if (mysqli_errno($conn) == 1062) {
                 $message =   "نام کاربری تکراری است!";
             }
             else{
                 $message =   "نام کاربری "."'$user_name'"."در ورود به مشکل خورد \n";
                 
             }
             echo "<h1 class='alert alert-danger text-center' role='alert'>
             $message
           </h1>";

         }  
         echo '<a class= "text-decoration-none" href="http://localhost:80/university-website/sign_in_student.htm"><p class= "text-center ">به صفحه عضویت منتقل شوید</p></a>';
         
        
        mysqli_close($conn);
        ?>
      

    </main>
    
    <footer>
    
      <div class="footer-menu">
        <p class="title">دسترسی مفید</p>
        <ul>
          <li>
            <a href="https://sanjesh.org/">سایت سازمان سنحش</a>
          </li>
          <li>
            <a
              href="https://atu.ac.ir/fa/grid/13/%D8%AF%D9%81%D8%AA%D8%B1%DA%86%D9%87-%D8%AA%D9%84%D9%81%D9%86-%D8%AF%D8%A7%D9%86%D8%B4%DA%AF%D8%A7%D9%87"
              >دفترچه تلفن دانشگاه</a
            >
          </li>
          <li>
            <a href="https://atu.ac.ir/">سایت دانشگاه</a>
          </li>
        </ul>
      </div>
      <ul class="info">
        <li>
          <p class="title">دانشکده آمار،ریاضی و رایانه</p>
          <i class="fa-solid fa-location-dot right"></i>
          <p><span class="right"> :نشانی </span></p>
          <p class="right">
            بلوار غربی استادیوم آزادی،رو به روی هتل المپیک،پردیس 2 دانشگاه علامه
            طباطبائی،دانشکده آمار،ریاضی ورایانه
          </p>
        </li>
        <div class="clear"></div>

        <li>
          <i class="fa-solid fa-envelope right"></i>
          <p><span class="right"> :کد پستی </span></p>
          <p class="right last">1485643449</p>
        </li>
      </ul>
    </footer>
  </body>
</html>
