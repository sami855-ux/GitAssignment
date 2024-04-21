const username = document.getElementById("username")
const password = document.getElementById("password")
const loginBtn = document.querySelector(".btn")

// loginBtn.disabled = true
const formValidater = (e) => {
  let value = e.target.value
  if (value === "") {
    e.target.style.borderColor = "red"
    e.target.classList.add("error")
  } else {
    e.target.style.borderColor = "green"
    e.target.classList.remove("error")
  }
}
username.addEventListener("keyup", formValidater)

password.addEventListener("keyup", formValidater)

if (
  username.classList.contains("error") ||
  password.classList.contains("error")
) {
  loginBtn.disabled = true
} else {
  loginBtn.disabled = false
}

loginBtn.addEventListener("click", function () {
  console.log("hi")
})
