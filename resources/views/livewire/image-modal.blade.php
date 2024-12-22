<div x-data="{ open: false }" x-show="open" style="display: none;">
    <div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-black bg-opacity-50">
        <div class="bg-white p-4 rounded shadow-lg">
            <span class="cursor-pointer" x-on:click="open = false">&times;</span>
            <img :src="imageSrc" class="max-w-full max-h-full" x-bind:src="imageSrc" />
        </div>
    </div>

    <script>
        window.addEventListener('open-modal', () => {
            open = true;
        });
    </script>
</div>
