<?php
    require_once("connect.php");
    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);
       
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../css/style50.css" />
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
        <a href="http://localhost:80/university-website/university-website/index.html" class="item-nav right"> صفحه &zwnj;اصلی</a>
        <a href="http://localhost:80/university-website/university-website/index.html" class="item-nav right"> دروس &zwnj;انتخاب شده</a>
      </nav>
    </header>

    <main>
      <div class="container bg-light text-dark my-5">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h2 class="h2 text-center">دروس تعریف شده</h2>
              </div>
              <div
                class="card-body table-responsive d-flex justify-content-center"
              >
                <table class="table table-bordered text-center w-75">
                  <tr class="bg-dark bg-gradient text-light">
                    <th>نام درس</th>
                    <th>نام استاد</th>
                    <th>روز درس</th>
                    <th>ساعت درس</th>
                  </tr>
                  <!-- cc -->
                  <tr>
                      <?php 
                          while($row = $result -> fetch_array(MYSQLI_ASSOC)){
                      ?>
                      <td><?php echo $row["courseName"] ?></td>
                      <td><?php echo $row["professorName"] ?></td>
                      <td><?php echo $row["classDay"] ?></td>
                      <td><?php echo $row["classTime"] ?></td>
                      
                      
                  </tr>
                        <?php
                          }
                        ?>
                  <!-- cc -->
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
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
    <script src="http://localhost:80/university-website/js/manager.js"></script>
  </body>
</html>
