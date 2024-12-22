<div>
    @if ($this->record->tourism_ministry == null)

   <img src="{{ asset('site/images/image-not-found.jpg') }}" alt="" class="w-100">

    @else

    <iframe src="{{ $record->tourism_ministry_path }}" width="100%" height="600px">
         <a href="{{ $record->tourism_ministry_path }}">Download PDF</a>
    </iframe>
    @endif
</div>
