<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('image');
        const preview = document.getElementById('image-preview');
        const error = document.getElementById('image-error');

        if (!input) return;

        input.addEventListener('change', function () {
            if (error) {
                error.textContent = '';
                error.classList.add('hidden');
            }

            if (!this.files.length) {
                return;
            }

            const file = this.files[0];
            const maxSize = Number(this.dataset.maxSize || 0);

            if (maxSize && file.size > maxSize * 1024) {
                if (error) {
                    error.textContent = 'Ukuran gambar terlalu besar. Maksimal 20 MB.';
                    error.classList.remove('hidden');
                }

                this.value = '';
                return;
            }

            if (preview) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('hidden');
            }
        });
    });
</script>
