@extends('frontend.layouts.master')

@section('title')
Learn {{ $detail->name }} | {{ config('app.name') }}
@endsection

@section('main-content')
@php $id = $detail->id; @endphp

<div class="fres">
    <div class="view" style="background-image: url('../images/foto1.jpg'); min-height:400px; width:100%; background-repeat: no-repeat; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 g-2 p-2">
                    <div class="bg-light p-4">
                        <h1>Welcome to learn {{ $detail->name }}</h1>
                        <hr>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Choose your language</button>
                            <div class="dropdown-menu dropdown-menu-left languages p-1">
                               <x-language-list type="conversion" :ids="$id" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 g-2 p-2">
                    <div class="home1 opc-90 bg-dark p-4">
                        <h1>Info about this section</h1>
                        <p>DM words or dictionary with 1000 words is a project developed by Faton Media that aims to bring to the readers a special vocabulary dedicated specifically to immigrants worldwide.
                            This dictionary contains 1 000 words and over 200 sentences, including 7 categories divided into 30 different fields. Within this project, some grammar instructions are also included.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
