const addCourseButton = document.getElementById("add-course");

const courseTable = document.getElementById("course-table");
const messageDiv = document.getElementById("message");

addCourseButton.addEventListener("click", function () {
  const courseName = document.getElementById("course-name").value;
  const professorName = document.getElementById("professor-name").value;
  const classDay1 = document.getElementById("class-day-1").value;
  const classTime1 = document.getElementById("class-time-1").value;
  const classDay2 = document.getElementById("class-day-2").value;
  const classTime2 = document.getElementById("class-time-2").value;

  if (!courseName || !professorName || !classDay1 || !classTime1) {
    messageDiv.textContent = "لطفا تمام فیلدهای الزامی را پر کنید.";
    messageDiv.style.color = "red";
  } else {
    console.log(courseName);
    console.log(professorName);
    console.log(getClassday(classDay1, classDay2));
    console.log(getClasstime(classDay1, classDay2, classTime1, classTime2));

    const newRow = courseTable.insertRow();

    newRow.innerHTML = `
    <td>
    <textarea
    name="course-name[]"
    readonly
  >${courseName}</textarea>
</td>
<td>  
      <textarea
      
      name= "professor-name[]"
      readonly>${professorName}</textarea>
</td>

<td>
      <textarea
            
            name= "class-day[]"
            readonly>${getClassday(classDay1, classDay2)}</textarea>
            
            
  </td>
  
<td>

      
      <textarea
      
      
      name= "class-time[]"
      readonly>${getClasstime(
        classDay1,
        classDay2,
        classTime1,
        classTime2
      )}</textarea>
     
      
</td>
              


              
              <td><button onclick="deleteCourse(this)">حذف</button></td>
          `;

    // Clear form fields
    document.getElementById("course-name").value = "";
    document.getElementById("professor-name").value = "";
    document.getElementById("class-day-1").value = "";
    document.getElementById("class-time-1").value = "";
    document.getElementById("class-day-2").value = "";
    document.getElementById("class-time-2").value = "";

    messageDiv.textContent = "درس با موفقیت اضافه شد.";
    messageDiv.style.color = "green";
  }
});

function getClassday(day1, day2) {
  let schedule = getDayName(day1);

  if (day2) {
    schedule += " و " + getDayName(day2);
  }

  return schedule;
}
function getClasstime(day1, day2, time1, time2) {
  let schedule = getDayName(day1) + " : " + time1;

  if (time2) {
    schedule += " و \n" + getDayName(day2) + " : " + time2;
  }

  return schedule;
}

function getDayName(day) {
  const days = {
    saturday: "شنبه",
    sunday: "یکشنبه",
    monday: "دوشنبه",
    tuesday: "سه شنبه",
    wednesday: "چهارشنبه",
  };
  return days[day];
}

function deleteCourse(button) {
  const row = button.closest("tr");
  row.remove();
}
let secondForm = document.getElementById("insertCourse");
secondForm.addEventListener("submit", function (e) {
  let tbody = courseTable.childNodes[1];
  let tableRowCount = tbody.childNodes.length;

  e.preventDefault();

  if (tableRowCount >= 3) {
    var formData = $(this).serialize();
    // Make AJAX request
    $.post("php/insertCourse.php", formData, function (data) {
      alert(" پیام:" + data);
      $("form").trigger("reset");
    });
  } else {
    alert("   هیچ درسی انتخاب نشده است! ");
  }
});
