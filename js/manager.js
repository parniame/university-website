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
    console.log(courseName);
    messageDiv.textContent = "لطفا تمام فیلدهای الزامی را پر کنید.";
    messageDiv.style.color = "red";
  } else {
    const newRow = courseTable.insertRow();

    newRow.innerHTML = `
              
              <td>
                  <input
                  type="text"
                  value = "${courseName}"
                  name="course-name[]"
                  
                  readonly/>
            
              </td>
              <td>
                  <input
                  type="text"
                  value = "${professorName}"
                  name= "professor-name[]"
                  
                  readonly/>
              </td>
              <td>
                  <input
                  type="text"
                  value = "${getClassday(
                    classDay1,

                    classDay2
                  )}"
                  name= "class-day[]"
                  
                  readonly/>
              </td>
              <td>
                  <input
                  type="text"
                  value = "${getClasstime(
                    classTime1,

                    classTime2
                  )}"
                  name= "class-time[]"
                  
                  readonly/>
              
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
  console.log(schedule);
  return schedule;
}
function getClasstime(time1, time2) {
  let schedule = time1;

  if (time2) {
    schedule += " و " + time2;
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
  e.preventDefault();
  let tableRowCount = courseTable.childNodes.length;

  if (tableRowCount > 2) {
    return true;
  } else {
    alert("   هیچ درسی انتخاب نشده است! ");
  }
});
