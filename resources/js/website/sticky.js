window.addEventListener("scroll", function () {
    const header = document.querySelector(".main-header");
    const scroll = document.documentElement.scrollTop;

    if (scroll > 250) {
        header.classList.add("sticky-header");
    } else {
        header.classList.remove("sticky-header");
    }
});
