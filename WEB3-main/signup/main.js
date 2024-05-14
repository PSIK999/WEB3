document.addEventListener("DOMContentLoaded", function () {
  var togglePassword = document.querySelectorAll(".toggle-password");

  togglePassword.forEach(function (element) {
    element.addEventListener("click", function () {
      var input = document.querySelector(this.getAttribute("toggle"));
      if (input.getAttribute("type") === "password") {
        input.setAttribute("type", "text");
      } else {
        input.setAttribute("type", "password");
      }
      this.classList.toggle("fa-eye");
      this.classList.toggle("fa-eye-slash");
    });
  });
});
