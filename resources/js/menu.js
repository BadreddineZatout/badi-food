const menuButton = document.querySelector("#menu-button");
const menu = document.querySelector("#menu");

menuButton.addEventListener("click", () => {
  if (menu.classList.contains("hidden")) {
    menu.classList.remove("hidden");
  } else {
    menu.classList.add("hidden");
  }
});