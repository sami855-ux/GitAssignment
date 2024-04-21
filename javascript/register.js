//Select all Elements
const userName = document.getElementById("username")
const email = document.getElementById("email")
// const createPass = document.getElementById("createpass")
const confirmPass = document.getElementById("confiPass")
const eduValue = document.querySelector(".edvalue")
const bDate = document.querySelector("#bDate")
const registerBtn = document.querySelector(".btn")
//Checker of email
function isEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
    email
  )
}
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
const emialChecker = (e) => {
  let value = e.target.value
  if (isEmail(value)) {
    e.target.style.borderColor = "green"
    e.target.classList.remove("error")
  } else {
    e.target.style.borderColor = "red"
    e.target.classList.add("error")
  }
}
const passwordChecker = (e) => {
  if (password()) {
    e.target.style.borderColor = "green"
    e.target.classList.remove("error")
  } else {
    e.target.style.borderColor = "red"
    e.target.classList.add("error")
  }
}
function password() {
  let pass1Value = createPass.value.trim()
  let pass2Value = confirmPass.value.trim()

  if (pass1Value === pass2Value) {
    return true
  } else {
    return false
  }
}
userName.addEventListener("keyup", formValidater)
bDate.addEventListener("keyup", formValidater)

email.addEventListener("keyup", function (e) {
  formValidater(e)
  emialChecker(e)
})
// createPass.addEventListener("keyup", formValidater)
confirmPass.addEventListener("keyup", function (e) {
  formValidater(e)
  passwordChecker(e)
})
registerBtn.addEventListener("click", function (e) {
  e.preventDefault()
  console.log(bDate.value)
  console.log(eduValue.value)
})
