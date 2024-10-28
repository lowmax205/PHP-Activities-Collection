function editUser(id, userText, roleText) {
    document.getElementById('edit_user_id').value = id;
    document.getElementById('user_text').value = userText;
    document.getElementById('role_text').value = roleText;
    document.getElementById('editUserNotification').style.display = 'block';
}

function closeNotification() {
    document.getElementById('editUserNotification').style.display = 'none';
    document.body.style.filter = 'none'; // Remove blur effect from the body
}