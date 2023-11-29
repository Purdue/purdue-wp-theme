//toggle function

const toggle = (e) => {
    let clicked = e;
    const width = document.body.clientWidth;
    const checkClassName = (el, term) => {
      return el.classList && [...el.classList].includes(term);
    };
    const getCurrDisplay = (el) => {
      return window.getComputedStyle(el).getPropertyValue("display");
    };
    switch (true) {
      case checkClassName(clicked, "accordion__heading--footer"): // specifically footer accordion so they won't other accordions  d
        document.querySelectorAll(".accordion__heading--footer").forEach((el) => {
          const contentId = el.getAttribute("aria-controls");
          let icons = el.querySelectorAll(".accordion__icon");
          let plusIcon;
          let minusIcon;
          if (icons && icons.length > 0) {
            plusIcon = el.querySelector(".accordion__icon__plus");
            minusIcon = el.querySelector(".accordion__icon__minus");
          }
  
          const content = document.querySelector("#" + contentId);
          const currAttr = getCurrDisplay(content);
          if (el.getAttribute("aria-expanded") && el !== clicked) {
            el.setAttribute("aria-expanded", "false");
            if (content.getAttribute("state-animating") === null) {
              if (plusIcon) {
                showFooter(plusIcon);
              }
              if (minusIcon) {
                hideFooter(minusIcon);
              }
              hideFooter(content);
              content.setAttribute("state-animating", "true");
              content.style.height = content.scrollHeight + "px";
              setTimeout(() => {
                hideFooter(content);
                content.removeAttribute("state-animating");
                content.style.height = 0;
              }, 200);
            }
          } else if (el === clicked) {
            const expanded =
              clicked.getAttribute("aria-expanded") === "false" ? true : false;
            clicked.setAttribute("aria-expanded", expanded);
            if (
              currAttr &&
              currAttr !== "none" &&
              content.getAttribute("state-animating") === null
            ) {
              if (icons && icons.length > 0) {
                icons.forEach((icon) => {
                  if (icon) {
                    swapIcon(icon);
                  }
                });
              }
              content.style.height = content.scrollHeight + "px";
  
              content.setAttribute("state-animating", "true");
              setTimeout(() => {
                content.style.height = 0;
                hideFooter(content);
                content.removeAttribute("state-animating");
              }, 200);
            } else if (content.getAttribute("state-animating") === null) {
              if (icons && icons.length > 0) {
                icons.forEach((icon) => {
                  if (icon) {
                    swapIcon(icon);
                  }
                });
              }
              showFooter(content);
              content.setAttribute("state-animating", "true");
              setTimeout(() => {
                content.removeAttribute("state-animating");
              }, 200);
              content.style.height = content.scrollHeight + "px";
              setTimeout(() => {
                content.style.height = "auto";
              }, 200);
            }
          }
        });
        break;
      case checkClassName(clicked, "accordion__heading"): // accordion
        clicked.parentElement
          .querySelectorAll(
            ".accordion__heading:not(.accordion__heading--footer)"
          )
          .forEach((el) => {
            const contentId = el.getAttribute("aria-controls");
            let icons = el.querySelectorAll(".accordion__icon");
            const content = document.querySelector("#" + contentId);
            const currAttr = content.classList.contains("show");
            if (
              el !== clicked &&
              el !==
                clicked.parentElement.parentElement.parentElement.parentElement
                  .parentElement.previousElementSibling
            ) {
              if (icons && icons.length > 0) {
                plusIcon = el.querySelector(".accordion__icon__plus");
                minusIcon = el.querySelector(".accordion__icon__minus");
                hideFooter(minusIcon);
                showFooter(plusIcon);
              }
              el.classList.remove("is-open");
              el.setAttribute("aria-expanded", "false");
              hideFooter(content);
            } else if (el === clicked) {
              const expanded =
                clicked.getAttribute("aria-expanded") === "false" ? true : false;
              clicked.setAttribute("aria-expanded", expanded);
              if (icons && icons.length > 0) {
                icons.forEach((icon) => {
                  swapIcon(icon);
                });
              }
  
              if (currAttr) {
                clicked.classList.remove("is-open");
                hideFooter(content);
              } else {
                clicked.classList.add("is-open");
                showFooter(content);
              }
            }
          });
        break;
    }
  };
  
  // Hide an footer element
  const hideFooter = function (elem) {
    if (elem.classList) {
      elem.classList.add("hide");
      elem.classList.remove("show");
    } else if (elem.nodeName === "svg") {
      if (elem.getAttribute("class").indexOf("hide") <= -1) {
        elem.setAttribute("class", elem.getAttribute("class") + " hide");
      } else if (elem.getAttribute("class").indexOf("show") > -1) {
        elem.setAttribute(
          "class",
          elem.getAttribute("class").replace("show", "")
        );
      }
    }
  };
  // show an footer element
  const showFooter = function (elem) {
    if (elem.classList) {
      elem.classList.add("show");
      elem.classList.remove("hide");
    } else if (elem.nodeName === "svg") {
      if (elem.getAttribute("class").indexOf("show") <= -1) {
        elem.setAttribute("class", elem.getAttribute("class") + " show");
      }
      if (elem.getAttribute("class").indexOf("hide") > -1) {
        elem.setAttribute(
          "class",
          elem.getAttribute("class").replace("hide", "")
        );
      }
    }
  };
  
  //Reset visibility
  const resetStyles = function (elems) {
    for (const elem of elems) {
      if ([...elem.classList].includes("dropdown-button"))
        elem.setAttribute("aria-expanded", "false");
      elem.classList.remove("hide", "show", "selected");
      const relatedMenu = elem.nextElementSibling;
      if (relatedMenu) relatedMenu.classList.remove("hide", "show", "selected");
      elem.removeAttribute("style");
    }
  };
  //Change element display
  const swapIcon = (el) => {
    const isShow = el.classList.contains("show");
    const isHide = el.classList.contains("hide");
    if ((!isHide && !isShow) || isShow) {
      hideFooter(el);
    } else {
      showFooter(el);
    }
  };
  //Collapse at the beginning on small screen
  const width = document.body.clientWidth;
  const headingButtons = document.querySelectorAll(".accordion__heading--footer");
  if (headingButtons.length > 0) {
    headingButtons.forEach((el) => {
      if (width < 1024) {
        el.setAttribute("aria-expanded", false);
        el.setAttribute("aria-disabled", false);
      }
    });
  }
  
  const assignListeners = () => {
    document.addEventListener("click", (event) => {
      const e = event.target;
      if (e.classList && e.classList.contains("accordion__heading")) {
        toggle(e);
      }
    });
  };
  
  //Reset
  window.addEventListener("resize", () => {
    const width = document.body.clientWidth;
    if (headingButtons.length > 0) {
      headingButtons.forEach((el) => {
        let content = document.querySelector(
          "#" + el.getAttribute("aria-controls")
        );
        let icons = el.querySelectorAll(".accordion__icon");
        const currAttr = window
          .getComputedStyle(content)
          .getPropertyValue("display");
        if (width >= 1024) {
          el.setAttribute("aria-expanded", true);
          el.setAttribute("aria-disabled", true);
          icons.forEach((el) => {
            if (el.getAttribute("class").indexOf("hide") > -1) {
              el.setAttribute(
                "class",
                el.getAttribute("class").replace("hide", "")
              );
            }
            if (el.getAttribute("class").indexOf("show") > -1) {
              el.setAttribute(
                "class",
                el.getAttribute("class").replace("show", "")
              );
            }
          });
          content.classList.remove("hide", "show");
          content.removeAttribute("style");
        } else if (currAttr !== "none") {
          el.setAttribute("aria-expanded", true);
          el.setAttribute("aria-disabled", false);
        } else {
          el.setAttribute("aria-expanded", false);
          el.setAttribute("aria-disabled", false);
        }
      });
    }
  });
  
  assignListeners();
  