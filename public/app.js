document.addEventListener("DOMContentLoaded", function () {
    var tabs = document.querySelectorAll(".box");
    tabs.forEach(function (tab) {
        tab.addEventListener("click", function () {
            tabs.forEach(function (t) {
                t.style.backgroundColor = "#f6f6f6";
            });
            tab.style.backgroundColor = "lightblue";
            tab.style.borderBottom = "none";
        });
    });
});
