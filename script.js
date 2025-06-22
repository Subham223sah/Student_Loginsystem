function validateRegister() {
  const pass = document.getElementById("reg-pass").value;
  const confirm = document.getElementById("confirm-pass").value;
  if (pass !== confirm) {
    alert("Passwords do not match!");
    return false;
  }
  return true;
}
function togglePassword(fieldId, iconElement) {
  const field = document.getElementById(fieldId);
  const isPassword = field.type === "password";
  field.type = isPassword ? "text" : "password";
  iconElement.textContent = isPassword ? "🙈" : "👁️";
}
