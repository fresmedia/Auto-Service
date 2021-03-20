@extends('frontend.layouts.master')

@php
$termRepository = new App\Repositories\TermRepository();
$sentence_translation = $termRepository::get_term_detail_by_key($detail1->code, $detail2->code, 'sentences');
$words_translation = $termRepository::get_term_detail_by_key($detail1->code, $detail2->code, 'words');
$chapter_translation = $termRepository::get_term_detail_by_key($detail1->code, $detail2->code, $chapter->id, 'category');
@endphp

@section('title')
    Translation {{ $chapter->name }} | {{ $detail1->name }} in {{ $detail2->name }} | {{ config('app.name') }}
@endsection

@section('main-content')

    <div class="fres">
        <div class="view"
            style="background-image: url('../images/foto1.jpg'); min-height:400px; width:100%; background-repeat: no-repeat; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 g-2 p-2 lang2">
                        <div class="bg-light p-3 translation">
                            <h2>Education</h2>
                            <ol>
                                <li><a href="test1.html">Greetings</a></li>
                                <li><a href="test2.html">School</a></li>
                                <li><a href="test3.html">Technology</a></li>
                                <li><a href="test4.html">Applications</a></li>
                            </ol>
                            <hr>
                            <h1>
                                {{ !is_null($words_translation) ? $words_translation->name1 : '' }} -
                                {{ !is_null($words_translation) ? $words_translation->name2 : '' }}
                            </h1>

                            <form class="row g-3 p-3 needs-validation" method="POST"
                                action="{{ route('category.translation.store', [$detail1->code, $detail2->code]) }}">
                                @csrf
                                <input type="hidden" name="type" value="word" />
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ $detail1->name }}</th>
                                            <th scope="col">{{ $detail2->name }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($words as $key => $word)
                                            <tr>
                                                <td>{{ !is_null($word->name1) ? $word->name1 : '-' }}</td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="" aria-label="City"
                                                        value="{{ !is_null($word->name2) ? $word->name2 : '' }}"
                                                        name="translations[{{ $word->id }}]" />
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="col-6">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-7 g-2 p-2">
                        <div class="translation bg-light p-4">
                            <h1>
                                {{ !is_null($sentence_translation) ? $sentence_translation->name1 : '' }} -
                                {{ !is_null($sentence_translation) ? $sentence_translation->name2 : '' }}
                            </h1>
                            <form class="row g-3 p-3 needs-validation" method="POST"
                                action="{{ route('category.translation.store', [$detail1->code, $detail2->code]) }}">
                                @csrf
                                <input type="hidden" name="type" value="sentence" />
                                <ol>
                                    @foreach ($sentences as $sentence)
                                        <li>
                                            <p>{{ $sentence->name1 }}</p>
                                            <input type="text" class="form-control" placeholder="" aria-label="City"
                                                        value="{{ !is_null($sentence->name2) ? $sentence->name2 : '' }}"
                                                        name="translations[{{ $sentence->id }}]" />
                                        </li>
                                    @endforeach
                                </ol>
                                <div class="">
                                    <button class="btn btn-primary btn-block" type="submit">Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
