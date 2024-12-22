<div>
    <!-- Preview existing images -->
    <div class="mb-4">
        <h4>Existing Images:</h4>
        <div class="grid grid-cols-4 gap-4">
            @foreach($existingImages as $image)
                <div class="border p-2">
                    <img src="{{ $image['url'] }}" alt="{{ $image['name'] }}" class="w-full h-auto">
                    <p>{{ $image['name'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- File upload input -->
    <input type="file" wire:model="newImages" multiple>

    @error('newImages') <span class="error">{{ $message }}</span> @enderror

    <!-- Save button -->
    <button wire:click="saveImages" class="mt-4 btn btn-primary">Save Images</button>
</div>
