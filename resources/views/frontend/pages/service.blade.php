@extends('frontend.layouts.master')
@section('title')
    Services | {{ config('app.name') }}
@endsection
@section('main-content')
    <div class="fres">
        <div class="view"
            style="background-image: url('{{ asset('images/foto1.jpg') }}'); min-height:400px; width:100%; background-repeat: no-repeat; background-position: top center;">
            <div class="container top2">
                <div class="row">
                    <div class="col-md-8 g-0 p-2 lang2">
                        <div class="bg-light p-3">
                            <h2>Services</h2>
                            <p>Auto Service offer a dedicated team whose ultimate goal is creating an excellent experience
                                for our clients when it comes to the world of technology. Clients are provided a variety of
                                services to choose from, depending on their needs.</p>
                            <p>Online reservation is a system which makes easier to manage services provided by small and
                                mid-size companies on reservation issues. This product includes as well a CRM system to
                                manage customers, prices and other services offered by the company.</p>
                        </div>
                    </div>
                    <div class="col-md-4 g-1 p-2">
                        <div class="home1 opc-90 bg-dark p-4">
                            <h1>Online reservation</h1>
                            <p>Online reservation is a system which makes easier to manage services provided by small and
                                mid-size companies on reservation issues.
                                This product includes as well a CRM system to manage customers, prices and other services
                                offered by the company.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
