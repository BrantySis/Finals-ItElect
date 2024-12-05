import "./bootstrap";
import "preline";
import { Notyf } from 'notyf';
import 'notyf/notyf.min.css';
import Toastify from 'toastify-js';
import 'toastify-js/src/toastify.css';

// import Alpine from "alpinejs";

// window.Alpine = Alpine;
const notyf = new Notyf();

function showToast(message, type = 'success') {
    notyf.open({
        type: type,      // 'success' or 'error'
        message: message // The toast message to display
    });
}


document.addEventListener('livewire:load', function () {
    // Listen for a custom Livewire event (show-toast)
    window.addEventListener('show-toast', event => {
        showToast(event.detail.message);  // Show the toast with the message from Livewire
    });
});

// Alpine.start();

// This code should be added to <head>.
// It's used to prevent page load glitches.
if (
    localStorage.getItem("hs_theme") === "dark" ||
    (!localStorage.getItem("hs_theme") &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    document.documentElement.classList.add("dark");
} else {
    document.documentElement.classList.remove("dark");
}


