document.addEventListener("DOMContentLoaded", function() {
    const courseNameSearch = document.getElementById("courseNameSearch");
    const professorNameSearch = document.getElementById("professorNameSearch");
    const coursesTable = document.getElementById("courses-table");
  
    function filterTable() {
      const courseNameFilter = courseNameSearch.value.toLowerCase();
      const professorNameFilter = professorNameSearch.value.toLowerCase();
  
      Array.from(coursesTable.getElementsByTagName("tr")).forEach(function(row, index) {
        if (index === 0) return; // Skip the header row
        const courseNameCell = row.getElementsByTagName("td")[0];
        const professorNameCell = row.getElementsByTagName("td")[1];
  
        if (courseNameCell && professorNameCell) {
          const courseName = courseNameCell.textContent.toLowerCase();
          const professorName = professorNameCell.textContent.toLowerCase();
  
          if (courseName.includes(courseNameFilter) && professorName.includes(professorNameFilter)) {
            row.style.display = "";
          } else {
            row.style.display = "none";
          }
        }
      });
    }
  
    courseNameSearch.addEventListener("keyup", filterTable);
    professorNameSearch.addEventListener("keyup", filterTable);
  });
  