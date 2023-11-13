var SuperPlaceholder = function (options) {
  this.options = options;
  this.element = options.element;
  this.placeholderIdx = 0;
  this.charIdx = 0;
  this.cursor = options.cursor;
  this.cursorIdx = 1;

  this.setPlaceholder = function () {
    placeholder = options.placeholders[this.placeholderIdx];
    var placeholderChunk = placeholder.substring(0, this.charIdx + 1);
    var cursorChunk = this.cursor.substring(0, this.cursorIdx);
    this.element.setAttribute(
      "placeholder",
      this.options.preText + " " + placeholderChunk + cursorChunk
    );
  };
  this.onTickReverse = function (afterReverse) {
    if (this.charIdx === 0) {
      afterReverse.bind(this)();
      clearInterval(this.intervalId);
      this.init();
    } else {
      this.setPlaceholder();
      this.charIdx--;
    }
    if (this.cursorIdx === 1) {
      this.cursorIdx = 0;
    } else {
      this.cursorIdx = 1;
    }
  };

  this.goReverse = function () {
    clearInterval(this.intervalId);
    this.intervalId = setInterval(
      this.onTickReverse.bind(this, function () {
        this.charIdx = 0;
        this.placeholderIdx++;
        if (this.placeholderIdx === options.placeholders.length) {
          // end of all placeholders reached
          this.placeholderIdx = 0;
        }
      }),
      this.options.speed
    );
  };

  this.onTick = function () {
    var placeholder = options.placeholders[this.placeholderIdx];
    if (this.charIdx === placeholder.length) {
      // end of a placeholder sentence reached
      setTimeout(this.goReverse.bind(this), this.options.stay);
    }
    setTimeout(() => {
      if (this.cursorIdx === 1) {
        this.cursorIdx = 0;
      } else {
        this.cursorIdx = 1;
      }
    }, this.options.speed * 2);
    this.setPlaceholder();
    this.charIdx++;
  };

  this.init = function () {
    this.intervalId = setInterval(this.onTick.bind(this), this.options.speed);
  };

  this.kill = function () {
    clearInterval(this.intervalId);
  };
};
const searchbars = document.querySelectorAll(".search-box .search-form");

searchbars.forEach((searchbar) => {
  const submit = searchbar.querySelector(".search-button");
  const clear = searchbar.querySelector(".clear-button");
  const field = searchbar.querySelector(".search-field");

  if (field.value !== "") {
    submit.classList.add("active");
    clear.classList.add("active");
  } else {
    submit.classList.remove("active");
    clear.classList.remove("active");
  }
  field.addEventListener("keyup", () => {
    if (field.value !== "") {
      submit.classList.add("active");
      clear.classList.add("active");
    } else {
      submit.classList.remove("active");
      clear.classList.remove("active");
    }
  });
  field.addEventListener("focus", () => {
    if (field.value !== "") {
      submit.classList.add("active");
      clear.classList.add("active");
    } else {
      submit.classList.remove("active");
      clear.classList.remove("active");
    }
  });
  clear.addEventListener("click", (event) => {
    field.value = "";
    submit.classList.remove("active");
    clear.classList.remove("active");
  });
  if (searchbar.getAttribute("name") === "searchform") {
    const placeholders = searchbar
      .querySelector(".search-field")
      .getAttribute("placeholder")
      .split(",")
      .map((value) => {
        return value.trim();
      });
    var sp = new SuperPlaceholder({
      placeholders: placeholders,
      preText: "",
      stay: 1000,
      speed: 150,
      element: field,
      cursor: "_",
    });
    sp.init();
  }
});

//search page sort
const sort = document.querySelector(".search-results-sort");
if (sort) {
  //on page load
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const orderby = urlParams.get("orderby");
  const search = urlParams.get("s");
  if (orderby) {
    sort.value = orderby;
  }
  //event
  sort.addEventListener("change", () => {
    const value = sort.value;
    const url = new URL(window.location.origin + window.location.pathname);
    if (search) {
      url.searchParams.append("s", search);
    }
    url.searchParams.append("orderby", value);
    window.location.href = url;
  });
}
