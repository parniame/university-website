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
      readonly>${getClasstime(classTime1, classTime2)}</textarea>
     
      
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
  let tbody = courseTable.childNodes[1];
  let tableRowCount = tbody.childNodes.length;
  // tbody.childNodes.forEach((element) => {
  //   console.log(element);
  // });
  // alert(tableRowCount);
  if (tableRowCount >= 3) {
    return true;
  } else {
    alert("   هیچ درسی انتخاب نشده است! ");
    e.preventDefault();
  }
});
