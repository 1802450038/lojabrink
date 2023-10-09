function openCard(elem) {
  let card = elem.parentElement.parentElement;

  let cl = card.classList.add("open");
}

function targetImage(elem) {
  document.getElementById("target").src = elem.src;
}

function paintStars(elem) {
  for (let index = 0; index < 5; index++) {
    elem.parentElement.children[index].style.color = "";
  }
  for (let index = 0; index < elem.classList[2]; index++) {
    elem.parentElement.children[index].style.color = "red";
  }
}




function showPassword() {
    passwordField = document.getElementById("password");
    toggleEye = document.getElementById("password-toggle");
    if(passwordField.type == "password"){
        toggleEye.classList.remove("fa-eye-slash");
        toggleEye.classList.add("fa-eye");
        passwordField.type = "text";
      
    } else {
        toggleEye.classList.add("fa-eye-slash");
        toggleEye.classList.remove("fa-eye");
        passwordField.type = "password";
     
    }
}