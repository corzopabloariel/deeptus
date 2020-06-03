scrollFunction = evt => {
    const nav = document.querySelector(".header__nav");
    const scrolled = window.scrollY;
    const top = 40;
    if (scrolled < top) {
        nav.classList.remove("header__scroll");
        return;
    }
    nav.classList.add("header__scroll");
}

window.onscroll = scrollFunction;