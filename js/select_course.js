document.addEventListener("DOMContentLoaded", function () {
  const selectedCourses = [];
  const selectedCoursesTable = document.getElementById(
    "selected-courses-table"
  );

  // Add event listener to each "انتخاب" button
  const selectButtons = document.querySelectorAll("table button.select-button");
  selectButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const row = this.closest("tr");
      const courseName = row.querySelector("td:nth-child(1)").textContent;
      const professorName = row.querySelector("td:nth-child(2)").textContent;
      const classDay = row.querySelector("td:nth-child(3)").textContent;
      const classTime = row.querySelector("td:nth-child(4)").textContent;

      // Check if the course is already selected
      if (!isSelectedCourse(courseName)) {
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
            <td>${courseName}</td>
            <td>${professorName}</td>
            <td>${classDay}</td>
            <td>${classTime}</td>
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
        alert("این درس قبلاً انتخاب شده است.");
      }
    });
  });

  function isSelectedCourse(courseName) {
    return selectedCourses.some(function (course) {
      return course.courseName === courseName;
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
});
