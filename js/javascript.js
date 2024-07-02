document.addEventListener("submit", function (e) {
  console.log("submit");
  const message = document.getElementById("message");
  const birthDateString = document.getElementById("birth-date").value;

  age = CheckAge(birthDateString, message);

  if (!("alert-danger" == message.classList[0])) {
    const firstName = document.getElementById("first-name").value;
    const lastName = document.getElementById("last-name").value;

    message.classList.add("alert-success");
    message.textContent = "موفقیت";
    return true;
  } else {
    e.preventDefault();
  }
});
function CheckAge(birthDateString, message) {
  if (birthDateString) {
    const birthDate = new Date(birthDateString);

    const today = new Date();
    const age = today.getFullYear() - birthDate.getFullYear();
    console.log(age);

    if (age < 16) {
      message.textContent = " شما باید حداقل 16 سال داشته باشید!\n";

      CheckClass(message, "alert-danger");
    } else if ("alert-danger" == message.classList[0]) {
      message.classList.remove("alert-danger");
    }
    console.log(message.classList);
    return age;
  }
}

function CheckClass(obj, class_) {
  if (!(class_ in obj.classList)) {
    obj.classList.add("alert-danger");
  }
}
