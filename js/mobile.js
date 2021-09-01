const nav = document.querySelector(".nav");
const menu = document.querySelector(".menu-bar");

menu.addEventListener("click", () => {
  nav.classList.toggle("active");
});
