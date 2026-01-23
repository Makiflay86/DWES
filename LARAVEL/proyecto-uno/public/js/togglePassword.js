// -----------------------
// --- Ver la password ---
// -----------------------

function togglePassword() 
{
    const input = document.getElementById('password');
    const icon = document.getElementById('toggleIconLogin');

    const isPassword = input.type === "password";
    input.type = isPassword ? "text" : "password";

    icon.classList.toggle("bi-eye-fill", !isPassword);
    icon.classList.toggle("bi-eye-slash-fill", isPassword);
}