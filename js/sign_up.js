document.addEventListener("submit", function (e) {
  const message = document.getElementById("message");
  const passwordString = document.getElementById("password").value;
  const passwordRString = document.getElementById("password-repeat").value;

  if (CheckPass(passwordString, passwordRString)) {
    message.classList.remove("alert-danger");

    message.classList.add("alert-success");
    message.textContent = "موفقیت";

    return true;
  } else {
    message.textContent = " رمز یکسان نیست!\n";

    CheckClass(message, "alert-danger");
    e.preventDefault();
  }
});
function CheckPass(p, pR) {
  if (p == pR) {
    return true;
  } else if ("alert-danger" == message.classList[0]) {
    message.classList.remove("alert-danger");
  }
  return false;
}
function CheckClass(obj, class_) {
  if (!(class_ in obj.classList)) {
    obj.classList.add("alert-danger");
  }
}
