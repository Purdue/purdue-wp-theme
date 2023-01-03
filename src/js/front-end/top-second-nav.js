const toggle = (button, secondNav) => {
  button.classList.toggle("open");
  secondNav.classList.toggle("expand");
};
const collapse = (secondNav) => {
  const nav = secondNav.querySelector(".navbar-items");
  const items = [...nav.querySelectorAll("li")];
  items.forEach((item) => {
    item.classList.remove("show", "open");
  });
  secondNav.classList.remove("expand");

  let width = nav.offsetWidth;
  let height = nav.offsetHeight;
  const maxheight = secondNav.offsetHeight;
  if (height > maxheight) {
    let navWidth = 68;
    for (let i = 0; i < items.length - 1; i++) {
      if (!items[i].classList.contains("more-less")) {
        navWidth = navWidth + items[i].offsetWidth;
        if (navWidth > width && i > 1) {
          items[i - 1].classList.add("show");
          break;
        }
        if (navWidth === width) {
          items[i + 1].classList.add("show");
          break;
        }
      }
    }
  }
};

const secondNav = document.querySelector(".purdue-navbar-second");
const currentpage = window.location.href;
if (secondNav) {
  window.addEventListener("load", () => {
    collapse(secondNav);
  });
  window.addEventListener("resize", () => collapse(secondNav));
  window.addEventListener("click", (e) => {
    if (
      (e.target.classList.contains("more") ||
        e.target.classList.contains("less")) &&
      e.target.parentElement.classList.contains("more-less")
    ) {
      toggle(e.target.parentElement, secondNav);
    }
  });
  const navbar_items = [...secondNav.querySelectorAll("a")];
  if (navbar_items.length > 0) {
    navbar_items.forEach((el) => {
      const href = el.getAttribute("href");
      if (currentpage === href) {
        el.parentElement.classList.add("is-current-page");
      }
    });
  }
  var sticky = secondNav.offsetTop;
  window.addEventListener("scroll", () => {
    if (window.pageYOffset >= sticky) {
      secondNav.classList.add("sticky");
    } else {
      secondNav.classList.remove("sticky");
    }
  });
}
