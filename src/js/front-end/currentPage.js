//Highlight current page/folder on top nav

const currentpage = window.location.href;
const topnavs = [...document.querySelectorAll(".menu-items")];
if (topnavs && topnavs.length > 0) {
  topnavs.forEach((topnav) => {
    const navbar_items = [...topnav.querySelectorAll("a")];
    if (navbar_items.length > 0) {
      navbar_items.forEach((el) => {
        const href = el.getAttribute("href");
        if (currentpage === href) {
          el.classList.add("is-active-page");
          if (
            el.parentElement.parentElement.classList.contains("navbar-dropdown")
          ) {
            el.parentElement.parentElement.previousElementSibling.classList.add(
              "is-active-page"
            );
          } else if (
            el.parentElement.parentElement.classList.contains(
              "navbar-dropdown-submenu"
            ) &&
            el.parentElement.classList.contains("submenu") &&
            el.parentElement.parentElement.parentElement.parentElement
              .previousElementSibling
          ) {
            el.parentElement.parentElement.parentElement.parentElement.previousElementSibling.classList.add(
              "is-active-page"
            );
          } else if (
            el.parentElement.parentElement.classList.contains(
              "navbar-dropdown-submenu"
            ) &&
            !el.parentElement.classList.contains("submenu") &&
            el.parentElement.parentElement.parentElement.parentElement
              .parentElement.parentElement.previousElementSibling
          ) {
            el.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.previousElementSibling.classList.add(
              "is-active-page"
            );
          }
        }
      });
    }
  });
}
