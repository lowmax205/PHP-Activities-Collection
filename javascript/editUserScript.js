function editUser(id, userText, roleText) {
  document.getElementById("edit_user_id").value = id;
  document.getElementById("user_text").value = userText;
  document.getElementById("role_text").value = roleText;
  document.getElementById("editUserNotification").style.display = "block";
  document.getElementById("overlay").style.display = "block";
}

function closeNotification() {
  document.getElementById("editUserNotification").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}
