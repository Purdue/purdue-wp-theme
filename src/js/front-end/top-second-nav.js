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

const secondNav = document.querySelectorAll(".purdue-second-nav");
const currentpage = window.location.href;
if (secondNav) {  
  window.addEventListener("scroll", () => {
    const header = document.getElementById('header'); 
    const headerHeight = header.offsetHeight;
    secondNav.forEach(element => {
      const computedStyle = window.getComputedStyle(element);
      const isDisplayNone = computedStyle.display === 'none';
      if(!isDisplayNone){
        const navbar = element;
        if (window.scrollY >= headerHeight) {
          navbar.classList.add("sticky");
        } else {
          navbar.classList.remove("sticky");
        }
      }
    });       
  });
}
