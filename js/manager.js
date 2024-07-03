document.addEventListener('DOMContentLoaded', function() {
    const addCourseButton = document.getElementById('add-course');
    const courseTable = document.getElementById('course-list');
    const messageDiv = document.getElementById('message');

    addCourseButton.addEventListener('click', function() {
        alert("hi");
        const courseName = document.getElementById('course-name').value;
        const professorName = document.getElementById('professor-name').value;
        const classDay1 = document.getElementById('class-day-1').value;
        const classTime1 = document.getElementById('class-time-1').value;
        const classDay2 = document.getElementById('class-day-2').value;
        const classTime2 = document.getElementById('class-time-2').value;

        if (!courseName || !professorName || !classDay1 || !classTime1) {
            messageDiv.textContent = 'لطفا تمام فیلدهای الزامی را پر کنید.';
            messageDiv.style.color = 'red';
            return;
        }

        const newRow = courseTable.insertRow();
        newRow.innerHTML = `
            <td>${courseName}</td>
            <td>${professorName}</td>
            <td>${getClassSchedule(classDay1, classTime1, classDay2, classTime2)}</td>
            <td><button onclick="deleteCourse(this)">حذف</button></td>
        `;

        // Clear form fields
        document.getElementById('course-name').value = '';
        document.getElementById('professor-name').value = '';
        document.getElementById('class-day-1').value = '';
        document.getElementById('class-time-1').value = '';
        document.getElementById('class-day-2').value = '';
        document.getElementById('class-time-2').value = '';

        messageDiv.textContent = 'درس با موفقیت اضافه شد.';
        messageDiv.style.color = 'green';
    });
});

function getClassSchedule(day1, time1, day2, time2) {
    let schedule = `${getDayName(day1)} ${time1}`;
    if (day2 && time2) {
        schedule += ` و ${getDayName(day2)} ${time2}`;
    }
    return schedule;
}

function getDayName(day) {
    const days = {
        'saturday': 'شنبه',
        'sunday': 'یکشنبه',
        'monday': 'دوشنبه',
        'tuesday': 'سه شنبه',
        'wednesday': 'چهارشنبه'
    };
    return days[day] || day;
}

function deleteCourse(button) {
    const row = button.closest('tr');
    row.remove();
}