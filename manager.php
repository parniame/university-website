
<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta http-equiv="Pragma" content="no-cache" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Document</title>
    <link
      rel="stylesheet"
      href="http://localhost:80/university-website/css/normalize.css"
    />
    <link
      rel="stylesheet"
      href="http://localhost:80/university-website/css/style50.css"
    />
    <link
      rel="stylesheet"
      href="http://localhost:80/university-website/css/manager.css"
    />
    <link
      rel="stylesheet"
      href="http://localhost:80/university-website/css/manager-student.css"
    />
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.7.1.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap"
      rel="stylesheet"
    />

    <title>Document</title>
  </head>
  <body>
    <header>
      <div class="top-nav-bar">
        <div class="pagetop">
          <h1>دانشکده آمار، ریاضی و رایانه</h1>
          <img
            class="atu_logo"
            src="http://localhost:80/university-website/atu_logo.png"
            alt="atu_logo"
          />
        </div>
      </div>
      <nav class="subtopnav">
        <a
          href="http://localhost:80/university-website/index.html"
          class="item-nav right"
        >
          صفحه &zwnj;اصلی</a
        >
        <a
          href="http://localhost:80/university-website/manager_delete.php"
          class="item-nav right"
        >
          صفحه &zwnj;دروس تعریف شده</a
        >
      </nav>
    </header>

    <main>
      <section class="course-creation">
        <h2>بخش افزودن کلاس</h2>
        <form class="course-form" >
          <label for="course-name">نام درس:</label>
          <input
            required
            type="text"
            id="course-name"
            name="course-name"
            required
          />

          <label for="professor-name">نام استاد:</label>
          <input
            type="text"
            id="professor-name"
            name="professor-name"
            required
          />

          <div class="class-schedule">
            <h3>برنامه کلاس</h3>
            <div class="class-day-time">
              <label for="class-day-1">روز کلاس:</label>
              <select required id="class-day-1" name="class-day-1" required>
                <option value="">یک روز را انتخاب کنید</option>
                <option value="saturday">شنبه</option>
                <option value="sunday">یکشنبه</option>
                <option value="monday">دوشنبه</option>
                <option value="tuesday">سه شنبه</option>
                <option value="wednesday">چهارشنبه</option>
              </select>

              <label for="class-time-1">ساعت کلاس:</label>
              <input
                type="time"
                id="class-time-1"
                name="class-time-1"
                required
              />
            </div>

            <div class="class-day-time">
              <label for="class-day-2">روز دوم کلاس (اختیاری):</label>
              <select id="class-day-2" name="class-day-2">
                <option value="">یک روز را انتخاب کنید</option>
                <option value="saturday">شنبه</option>
                <option value="sunday">یکشنبه</option>
                <option value="monday">دوشنبه</option>
                <option value="tuesday">سه شنبه</option>
                <option value="wednesday">چهارشنبه</option>
              </select>

              <label for="class-time-2">زمان کلاس :</label>
              <input type="time" id="class-time-2" name="class-time-2" />
            </div>
          </div>

          <div id="message" class="message"></div>
          <button  id="add-course">افزودن درس</button>
        </form>
      </section>

      <section class="course-table">
        <form method="post" action="" id="insertCourse" onsubmit="return false;">
          <h2>کلاس های تعریف شده</h2>
          <table id="course-table">
            <tr>
              <th>نام درس</th>
              <th>نام استاد</th>
              <th>روز کلاس</th>
              <th>ساعت کلاس</th>
              <th>عملیات</th>
            </tr>
          </table>
          <button  name="SubmitButton" id="backend-coures">تایید</button>
        </form>
      </section>
      
      
      
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
