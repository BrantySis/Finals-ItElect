import "./bootstrap";
import "preline";
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
import Notifications from 'vue-notification';
import velocity from 'velocity-animate';
// import Alpine from "alpinejs";

// window.Alpine = Alpine;

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
Vue.use(Notifications, { velocity });
Vue.component('toaster-group', require('laralabs-vue-toaster/src/ToasterGroupComponent.vue'));
Vue.component('toaster-logic', require('laralabs-vue-toaster/src/ToasterLogicComponent.vue'));

let app = new Vue({
  el: '#app',
});