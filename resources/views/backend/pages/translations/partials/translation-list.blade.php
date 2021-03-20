<div class="row">
    <div class="col-{{ $type === 'word' ? 6 : 12 }}">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="30%">{{ $detail1->name }}</th>
                    <th scope="col" width="70%">{{ $detail2->name }}</th>
                </tr>
            </thead>
            <tbody>
                @if ($type === 'word' && Auth::user()->can('translation.word'))
                    @foreach ($words as $key => $word)
                        <tr>
                            <td>{{ !is_null($word->name1) ? $word->name1 : '-' }}</td>
                            <td>
                                <input type="text" class="form-control" placeholder="" aria-label="Word"
                                    value="{{ !is_null($word->name2) ? $word->name2 : '' }}"
                                    name="translations[{{ $word->id }}]" />
                            </td>
                        </tr>
                    @endforeach
                @endif

                @if ($type === 'sentence' && Auth::user()->can('translation.sentence'))
                    @foreach ($sentences as $key => $sentence)
                        <tr>
                            <td>{{ !is_null($sentence->name1) ? $sentence->name1 : '-' }}</td>
                            <td>
                                <input type="text" class="form-control" placeholder="" aria-label="Sentence"
                                    value="{{ !is_null($sentence->name2) ? $sentence->name2 : '' }}"
                                    name="translations[{{ $sentence->id }}]" />
                            </td>
                        </tr>
                    @endforeach
                @endif

                @if ($type === 'term' && Auth::user()->can('translation.term'))
                    @foreach ($terms as $key => $term)
                        <tr>
                            <td>{{ !is_null($term->name1) ? $term->name1 : '-' }}</td>
                            <td>
                                <input type="text" class="form-control" placeholder="" aria-label="Sentence"
                                    value="{{ !is_null($term->name2) ? $term->name2 : '' }}"
                                    name="translations[{{ $term->id }}]" />
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
</div>
