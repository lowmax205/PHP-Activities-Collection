function toggleNotification(id, show = true) {
  document.getElementById(id).style.display = show ? "block" : "none";
  document.getElementById("overlay").style.display = show ? "block" : "none";
  if (!show) clearFormFields();
}

function clearFormFields() {
  document
    .querySelectorAll(".popup input, .popup select")
    .forEach((el) => (el.value = ""));
}

function editUser(id, userText, emailText, pwdText, roleText, statusText) {
  document.getElementById("edit_user_id").value = id;
  document.getElementById("edit_user_id_display").innerText = id;
  document.getElementById("new_user_text").value = userText;
  document.getElementById("new_email_text").value = emailText;
  document.getElementById("new_pwd_text").value = pwdText;
  document.getElementById("new_role_text").value = roleText;
  document.getElementById("new_status_text").value = statusText;
  toggleNotification("editUserNotification", true);
}

function showAddUserNotification() {
  toggleNotification("addUserNotification", true);
}

function closeNotification() {
  toggleNotification("editUserNotification", false);
  toggleNotification("addUserNotification", false);
}
