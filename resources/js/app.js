import './bootstrap';

// Alpine.js
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// AOS - Animate On Scroll
import AOS from 'aos';
import 'aos/dist/aos.css';

document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true,
        offset: 50,
    });
});

window.newsImageForm = function () {
    return {
        rows: [],

        addRow() {
            this.rows.push({
                id: Date.now() + Math.random()
            });
        },

        removeRow(index) {
            this.rows.splice(index, 1);
        }
    };
};