@extends('frontend.layouts.master')

@php
$termRepository = new App\Repositories\TermRepository();
$question_and_answer_translation = $termRepository::get_term_detail_by_key($detail1->code, $detail2->code, 'question_and_answer');
$chapter_translation = $termRepository::get_term_detail_by_key($detail1->code, $detail2->code, $chapter->id, 'category');
@endphp

@section('title')
    Learn Words {{ $chapter->name }} | {{ $detail1->name }} in {{ $detail2->name }} | {{ config('app.name') }}
@endsection

@section('main-content')

    <div class="fres">
        <div class="view"
            style="background-image: url('../img/foto2.jpg'); min-height:400px; width:100%; background-repeat: no-repeat; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 g-2 p-2">
                        <div class="home1 bg-info p-4">
                            <div class="row">
                                <div class="col-md-5 g-0 p-2">
                                    <div class="words bg-warning p-2">
                                        <h2>
                                            {{ !is_null($chapter_translation->name1) ? $chapter_translation->name1 : $chapter_translation->default }}
                                            -
                                            {{ $chapter_translation->name2 }}
                                        </h2>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ $detail1->name }}</th>
                                                    <th scope="col">{{ $detail2->name }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($words as $word)
                                                    <tr>
                                                        <td>{{ !is_null($word->name1) ? $word->name1 : '-' }}</td>
                                                        <td>{{ !is_null($word->name2) ? $word->name2 : '-'  }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-7 g-0 p-2">
                                    <div class="sentences bg-light g-2 p-2">
                                        <h1>
                                            {{ $question_and_answer_translation->name1 }} <br>
                                            {{ $question_and_answer_translation->name2 }}
                                        </h1>
                                        <ol class="p-4">
                                            @foreach ($sentences as $sentence)
                                                <li>
                                                    <h2>{{ $sentence->name1 }}</h2>
                                                    <h3>{{ $sentence->name2 }}</h3>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                    <hr>
                                    <div class="sentences bg-light g-2 p-2">
                                        <div class="bg-light p-4">
                                            @include('frontend.includes.category-acordion')
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 g-2 p-2">
                        <div class="bg-light p-4">
                            <a href="https://www.fres.fi" target="_blank"><img
                                    src="{{ asset('public/images/fres.png') }}" width="100%"></a>
                        </div>
                        <hr>
                        <div class="bg-light p-4">
                            <a href="https://www.edufif.com" target="_blank"><img
                                    src="{{ asset('public/images/edufif500.png') }}" width="100%"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
