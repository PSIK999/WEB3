function validateForm() {
  const name = document.getElementsByName("name")[0].value;
  const email = document.getElementsByName("email")[0].value;
  const phone = document.getElementsByName("phone")[0].value;
  const inname = document.getElementById("inname");
  const inemail = document.getElementById("inemail");
  const inphone = document.getElementById("inphone");

  let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  let nameRegex = /^[a-zA-Z\s]*$/;

  let isValid = true;

  if (name.trim() === "" || !nameRegex.test(name)) {
    document.getElementsByName("name")[0].style.borderColor = "red";
    inname.innerHTML = "Enter a valid name.";
    inname.style.color = "red";
    isValid = false;
  } else {
    document.getElementsByName("name")[0].style.borderColor = "white";
    inname.innerHTML = "";
  }

  if (!emailRegex.test(email)) {
    document.getElementsByName("email")[0].style.borderColor = "red";
    isValid = false;
    inemail.innerHTML = "Enter a valid email.";
    inemail.style.color = "red";
  } else {
    document.getElementsByName("email")[0].style.borderColor = "white";
    inemail.innerHTML = "";
  }

  if (isNaN(phone) || phone.trim() === "") {
    document.getElementsByName("phone")[0].style.borderColor = "red";
    isValid = false;
    inphone.innerHTML = "Enter a valid phone number.";
    inphone.style.color = "red";
  } else {
    document.getElementsByName("phone")[0].style.borderColor = "white";
    inphone.innerHTML = "";
  }

  return isValid;
}
