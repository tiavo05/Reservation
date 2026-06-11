import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const toggle = document.getElementById("theme-toggle");

if (toggle) {
    toggle.addEventListener("click", () => {
        document.documentElement.classList.toggle("dark");

        if (document.documentElement.classList.contains("dark")) {
            localStorage.theme = "dark";
        } else {
            localStorage.theme = "light";
        }
    });
}

// load saved theme
if (
    localStorage.theme === "dark" ||
    (!("theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    document.documentElement.classList.add("dark");
} else {
    document.documentElement.classList.remove("dark");
}