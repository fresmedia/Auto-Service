@foreach ($languages as $language)
    <h1>
        <a href="{{ $language->url }}">
            <img src="{{ $language->flag }}" width="20%" />
            {{ $language->code_upper_case }} ({{ $language->name }})
        </a>
    </h1>
@endforeach
