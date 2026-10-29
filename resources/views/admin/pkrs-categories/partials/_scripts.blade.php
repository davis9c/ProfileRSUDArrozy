<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');

        if (!nameInput || !slugInput) {
            return;
        }

        function generateSlug(value) {
            return value
                .toString()
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        }

        nameInput.addEventListener('input', function () {
            slugInput.value = generateSlug(this.value);
        });
    });
</script>
