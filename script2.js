document
  .getElementById("form-login")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    if (username === "CMU@2025" && password === "CMU@2025") {
      alert("succesful");
    } else {
      alert("Not succesful");
    }
  });

document.getElementById("username").addEventListener("keyup", function (event) {
  onType();
});

document.getElementById("password").addEventListener("keyup", function (event) {
  onType();
});

function onType() {
  let username = document.getElementById("username").value;
  let password = document.getElementById("password").value;
  if (username.length > 0 || password.length > 0) {
    document.getElementById("login-btn").removeAttribute("disabled");
  } else {
    document.getElementById("login-btn").setAttribute("disabled", "disabled");
  }
}
