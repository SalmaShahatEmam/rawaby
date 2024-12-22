@if ($imageUrls && $imageUrls->isNotEmpty())
    <div>
        @foreach ($imageUrls as $imageUrl)
            <img src="{{ $imageUrl }}" alt="Image Preview" style="max-width: 100px; height: auto; margin-right: 10px;" />
        @endforeach
    </div>
@else
    <div>No images uploaded.</div>
@endif
