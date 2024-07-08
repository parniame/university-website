const selectedCourses = [];
const selectedCoursesTable = document.getElementById("selected-courses-table");

// Add event listener to each "انتخاب" button
const selectButtons = document.querySelectorAll("table button.select-button");
selectButtons.forEach(function (button) {
  button.addEventListener("click", function () {
    const row = this.closest("tr");
    const ID = row.querySelector("td:nth-child(1)").textContent;
    const courseName = row.querySelector("td:nth-child(2)").textContent;
    const professorName = row.querySelector("td:nth-child(3)").textContent;
    const classDay = row.querySelector("td:nth-child(4)").textContent;
    const classTime = row.querySelector("td:nth-child(5)").textContent;

    // Check if the course is already selected or conflicts with another course
    if (!isSelectedCourse(courseName)) {
      if (!isConflict(classDay, classTime)) {
        // Add the course to the selectedCourses array
        selectedCourses.push({
          courseName: courseName,
          professorName: professorName,
          classDay: classDay,
          classTime: classTime,
        });

        // Create a new row in the selected courses table
        const newRow = document.createElement("tr");

        newRow.innerHTML = `
            <td>
              <textarea
              name="ID[]"
              readonly
            >${ID}</textarea>
          </td>
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
                      readonly>${classDay}</textarea>
                      
                      
            </td>
            
          <td>

                
                <textarea
                
                
                name= "class-time[]"
                readonly>${classTime}</textarea>
               
                
          </td>
          <td><button class="btn btn-danger btn-sm remove-button">حذف</button></td>
        `;
        selectedCoursesTable.appendChild(newRow);

        // Add event listener to the "حذف" button
        const removeButton = newRow.querySelector(".remove-button");
        removeButton.addEventListener("click", function () {
          removeSelectedCourse(courseName);
          newRow.remove();
        });
      } else {
        alert("درس مورد درخواست با دروس انتخاب شده تداخل دارد.");
      }
    } else {
      alert("این درس قبلاً انتخاب شده است.");
    }
  });
});

function isSelectedCourse(courseName) {
  return selectedCourses.some(function (course) {
    return course.courseName === courseName;
  });
}

function isConflict(classDay, classTime) {
  return selectedCourses.some(function (course) {
    return course.classDay === classDay && course.classTime === classTime;
  });
}

function removeSelectedCourse(courseName) {
  const index = selectedCourses.findIndex(function (course) {
    return course.courseName === courseName;
  });
  if (index !== -1) {
    selectedCourses.splice(index, 1);
  }
}
