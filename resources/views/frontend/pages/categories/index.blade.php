@extends('frontend.layouts.master')

@section('title')
    Learn 1000 Words of {{ $detail1->name }} in {{ $detail2->name }} | {{ config('app.name') }}
@endsection

@section('main-content')
    <div class="fres">
        <div class="view"
            style="background-image: url('../img/foto2.jpg'); min-height:400px; width:100%; background-repeat: no-repeat; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 g-2 p-2">
                        <div class="home1 bg-info p-4">
                            <div class="row">
                                @foreach ($categories as $category)
                                    <div class="col-md-{{ $loop->index == 0 ? 12 : 6 }} g-0 p-2">
                                        <div class="words p-2"
                                            style="background-color: #{{ $category['bg_color'] }}!important">
                                            <h1>
                                                {{ $category['translation']->name1 }} -
                                                {{ $category['translation']->name2 }}
                                            </h1>
                                            <hr>
                                            <ul>
                                                @php
                                                    $total_words = 0;
                                                    $total_sentences = 0;
                                                @endphp
                                                @foreach ($category['childs'] as $child_category)
                                                    <li>
                                                        <a href="{{ route('category.show', [$detail1->code, $detail2->code, $child_category['slug']]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-chevron-right"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                                            </svg>
                                                            {{ $child_category['translation']->name1 }} -
                                                            {{ $child_category['translation']->name2 }}
                                                            ({{ $child_category['total_words'] }})
                                                        </a>
                                                    </li>
                                                    @php
                                                        $total_words += $child_category['total_words'];
                                                        $total_sentences += $child_category['total_sentences'];
                                                    @endphp
                                                @endforeach

                                            </ul>
                                            <hr>
                                            <h3>
                                                {{ $total_words }} words / {{ $total_sentences }}
                                                sentences
                                            </h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 g-2 p-2">
                        <div class="bg-light p-4">
                            <a href="https://www.fres.fi" target="_blank"><img src="{{ asset('images/fres.png') }}" width="100%"></a>
                        </div>
                        <hr>
                        <div class="bg-light p-4">
                            <a href="https://www.gjiganti.com" target="_blank"><img src="{{ asset('images/gjiganti.png') }}"
                                    width="100%"></a>
                        </div>
                        <hr>
                        <div class="bg-light p-4">
                            <a href="https://www.edufif.com" target="_blank"><img src="{{ asset('images/edufif500.png') }}"
                                    width="100%"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
