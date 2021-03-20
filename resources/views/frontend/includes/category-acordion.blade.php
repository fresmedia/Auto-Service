<div class="accordion" id="accordionExample">
    @foreach ($categories as $category)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $loop->index + 1 }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index + 1 }}" aria-expanded="false" aria-controls="collapse{{ $loop->index + 1 }}">
                    {{ $category['translation']->name1 }} -
                    {{ $category['translation']->name2 }}
                </button>
            </h2>
            <div id="collapse{{ $loop->index + 1 }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $loop->index + 1 }}" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ol>
                        @foreach ($category['childs'] as $child_category)
                            <li>
                                {{ $child_category['translation']->name1 }} -
                                {{ $child_category['translation']->name2 }}
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    @endforeach
</div>
