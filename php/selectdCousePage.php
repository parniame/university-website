<?php
    session_start();
    
    $userName = $_SESSION["user_name"];
    require_once("connect.php");
    $sql = "SELECT selectedcourse.ID,courses.courseName
    ,courses.professorName,courses.classDay,courses.classTime
            FROM selectedcourse
           
            INNER JOIN courses ON selectedcourse.ID = courses.ID
            WHERE userName = '$userName'"
            
           ;
            
    $result = $conn->query($sql);
       
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>دروس انتخاب شده مختص دانشجو</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="http://localhost:80/university-website/css/normalize.css" />
    <link rel="stylesheet" href="http://localhost:80/university-website/css/style50.css" />
    <link rel="stylesheet" href="http://localhost:80/university-website/css/manager-student.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <style>
      .btn-danger {
    
    background-color: #dc3545 !important;
    
          }

          .btn-primary {
  background-color: #dc3545 !important;
  border-color: #dc3545 !important;
  color: #fff !important;
}

.btn-primary:hover {
  background-color: #c82333 !important;
  border-color: #bd2130 !important;
}

h2 {
  text-align: center;
}

    </style>

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
        <a href="http://localhost:80/university-website/php/student.php" class="item-nav right"> صفحه &zwnj;دروس تعریف شده</a>
      </nav>
    </header>

    
    <main>
  <h2>دروس انتخاب شده مختص دانشجو</h2>
  <div class="container bg-light text-dark my-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h2 class="h2 text-center">جستجو</h2>
            <!-- Search Fields -->
            <div class="d-flex justify-content-center my-3">
              <input type="text" id="courseNameSearch" placeholder="جستجو نام درس" class="form-control mx-2" style="width: 250px;">
              <input type="text" id="professorNameSearch" placeholder="جستجو نام استاد" class="form-control mx-2" style="width: 250px;">
            </div>
          </div>
          <div class="card-body table-responsive d-flex justify-content-center">
            <table class="table table-bordered text-center w-75" id="courses-table">
              <tr class="bg-dark bg-gradient text-light">
                <th>آیدی درس</th>
                <th>نام درس</th>
                <th>نام استاد</th>
                <th>روز درس</th>
                <th>ساعت درس</th>
                <th>عملیات</th>
              </tr>
              <!-- cc -->
              <tr>
                <?php
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                ?>
                  <td><?php echo $row["ID"] ?></td>
                  <td><?php echo $row["courseName"] ?></td>
                  <td><?php echo $row["professorName"] ?></td>
                  <td><?php echo $row["classDay"] ?></td>
                  <td><?php echo $row["classTime"] ?></td>
                  <td><button class="btn btn-primary btn-sm select-button">حذف</button></td>
                </tr>
                <?php
                }
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <h2>دروس انتخاب شده برای حذف</h2>
    <div class="container bg-light text-dark my-5">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body table-responsive d-flex justify-content-center">
            <form
          method="post"
          action="http://localhost:80/university-website/php/deleteCourse.php"
          id="insertCourse">
              <table class="table table-bordered text-center w-75" id="selected-courses-table">
                <tr class="bg-dark bg-gradient text-light">
                  <th>آیدی درس</th>
                  <th>نام درس</th>
                  <th>نام استاد</th>
                  <th>روز درس</th>
                  <th>ساعت درس</th>
                  <th>عملیات</th> 
                </tr>
              </table>
             
            </div>
            <button type="submit" id="backend-coures" class="btn btn-primary">تایید</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="http://localhost:80/university-website/js/selected_course_review.js"></script>
  <script src="http://localhost:80/university-website/js/filter_courses.js"></script>


    
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
