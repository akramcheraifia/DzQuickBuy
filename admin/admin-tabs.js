document.addEventListener("DOMContentLoaded", function () {
  let tabs = document.querySelectorAll(".nav-tab");
  let contents = document.querySelectorAll(".tab-content");

  tabs.forEach((tab) => {
    tab.addEventListener("click", function (e) {
      e.preventDefault();

      // Remove active class from all tabs
      tabs.forEach((t) => t.classList.remove("nav-tab-active"));
      this.classList.add("nav-tab-active");

      // Hide all content
      contents.forEach((content) => content.classList.remove("active"));

      // Show selected tab content
      document
        .getElementById(this.getAttribute("data-tab"))
        .classList.add("active");
    });
  });
});
