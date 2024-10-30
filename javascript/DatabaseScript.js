function editUser(id, userText, pwdText, roleText) {
  document.getElementById("edit_user_id").value = id;
  document.getElementById("edit_user_id_display").innerText = id;
  document.getElementById("user_text").value = userText;
  document.getElementById("pwd_text").value = pwdText;

  // Set the role text in the dropdown
  const roleSelect = document.getElementById("role_text");
  roleSelect.value = roleText;

  document.getElementById("editUserNotification").style.display = "block";
  document.getElementById("overlay").style.display = "block";
}

function showAddUserNotification(id, userText, pwdText, cpwdText, roleText) {
  document.getElementById("new_user_text").value = userText;
  document.getElementById("new_pwd_text").value = pwdText;
  document.getElementById("confirm_pwd_text").value = cpwdText;
  document.getElementById("new_role_text").value = roleText;

  document.getElementById("addUserNotification").style.display = "block";
  document.getElementById("overlay").style.display = "block";
}

function closeNotification() {
  document.getElementById("editUserNotification").style.display = "none";
  document.getElementById("addUserNotification").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}
