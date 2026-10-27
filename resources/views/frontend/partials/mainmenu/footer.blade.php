<footer class="rz-footer-scope w-full text-white py-8 mt-1" style="background: #238792 !important;">

    <style>
        /* Font disamakan dengan section lain (Plus Jakarta Sans + Inter) */
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800;900&family=Inter:wght@400;500;600;700&display=swap');

        .rz-footer-scope,
        .rz-footer-scope *,
        .rz-footer-scope *::before,
        .rz-footer-scope *::after {
            box-sizing: border-box;
        }

        .rz-footer-scope {
            --profile-font-display: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
            --profile-font-body: 'Inter', system-ui, -apple-system, sans-serif;

            background: #238792 !important;
        }

        .rz-footer-scope,
        .rz-footer-scope * {
            font-family: var(--profile-font-body) !important;
            color: #ffffff !important;
        }

        /* Judul & tombol pakai font display */
        .rz-footer-scope h2,
        .rz-footer-scope .rz-footer-cta {
            font-family: var(--profile-font-display) !important;
        }

        .rz-footer-scope a.rz-footer-link:hover {
            color: #E8F5F7 !important;
        }

        .rz-footer-scope .rz-footer-cta,
        .rz-footer-scope a.rz-footer-cta {
            color: #238792 !important;
        }

        .rz-footer-scope .rz-footer-cta:hover {
            background: #E8F5F7 !important;
        }
    </style>

    <div class="max-w-5xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8 px-6">
        <!-- Contact Person -->
        <div class="flex flex-col items-start">
            <h2 class="text-2xl font-bold mb-2">Contact Person</h2>
            <p class="mb-1">WhatsApp: <a href="https://wa.me/6281130756662" class="rz-footer-link underline transition">+6281130756662</a></p>
            <p class="mb-1">Email: <a href="mailto:rsudarrozy@gmail.com" class="rz-footer-link underline transition">rsudarrozy@gmail.com</a></p>
            <p>Alamat: Jl. Prof. Dr. Hamka, Kec. Kedopok, Kota Probolinggo, Jawa Timur 67228</p>
        </div>
        <!-- Iklan Kerjasama -->
        <div class="flex flex-col items-start">
            <h2 class="text-2xl font-bold mb-2"></h2>
            <p class="mb-2">Thank You</p>
            <a href="mailto:rsudarrozy@gmail.com"
                class="rz-footer-cta bg-white font-semibold px-5 py-2 rounded-lg shadow transition">
                Hubungi Kami
            </a>
        </div>
    </div>
    <div class="text-center mt-8 text-sm opacity-80">
        &copy; {{ date('Y') }} IT Team. All rights reserved.
    </div>
</footer>