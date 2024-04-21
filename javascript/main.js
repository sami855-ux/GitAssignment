const like = document.querySelector(".like")
const dislike = document.querySelector(".dis")
const header = document.querySelector("header")
const serachFiled = document.querySelector(".serachi-filed")
const light = document.querySelector(".light")
const night = document.querySelector(".night")
const postli = document.querySelector("ul li a")
const mainTheme = document.querySelector(".main-theme")
const theme = document.querySelector(".theme")
const home = document.querySelector(".home")
const sideBar = document.querySelector(".sidebar")
const profile = document.querySelector(".profile")
const menu = document.querySelector(".menu")
const item = document.querySelectorAll(".item")
const textcontent = document.querySelector(".textcontent")
const postItem = document.querySelectorAll(".post-item")
const poster = document.querySelector(".poster")
const mainContent = document.querySelector(".main-content")
const status = document.querySelector(".status")
const body = document.body

console.log("hi")
like.addEventListener("click", function () {
  like.classList.add("clicked")
  dislike.classList.remove("clicked")
})
dislike.addEventListener("click", function () {
  dislike.classList.add("clicked")
  like.classList.remove("clicked")
})

night.addEventListener("click", function () {
  light.classList.remove("active")
  night.classList.add("active")
  home.style.backgroundColor = "rgba(0,0,0,0.5)"
  header.classList.add("dark")
  sideBar.classList.add("dark")
  textcontent.classList.add("dark")

  for (let i = 0; i < postItem.length; i++) {
    let view = postItem[i]
    view.classList.add("darkv2")
    view.style.boxShadow = "1px 2px 5px rgba(255, 255, 255, 0.4)"
  }
  for (let i = 0; i < item.length; i++) {
    let view = item[i]
    view.classList.add("light")
  }
  postli.style.color = "white"
})
light.addEventListener("click", function () {
  light.classList.add("active")
  night.classList.remove("active")
  home.style.backgroundImage = ""
  header.classList.remove("dark")
  sideBar.classList.remove("dark")
  textcontent.classList.remove("dark")

  for (let i = 0; i < postItem.length; i++) {
    let view = postItem[i]
    view.classList.remove("darkv2")
    view.style.boxShadow = ""
  }
  for (let i = 0; i < item.length; i++) {
    let view = item[i]
    view.classList.remove("light")
  }
  postli.style.color = ""
})

