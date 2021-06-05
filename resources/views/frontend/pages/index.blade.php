@extends('frontend.layouts.master')
@section('main-content')
<div class="fres">
    <div class="view" style="background-image: url('{{ asset("images/foto1.jpg") }}'); min-height:400px; width:100%; background-repeat: no-repeat; background-position: top center;">
        <div class="container top2">
            <div class="row">
                <div class="col-md-4 g-0 p-2 lang2">
                    <div class="bg-light p-3">
                        <h2>Welcome to Online reservice system</h2>
                        <p>Slogan with more content here...</p>
                    </div>
                </div>
                <div class="col-md-8 g-1 p-2">
                    <div class="home1 opc-90 bg-dark p-4">
                        <h1>Online reservation</h1>
                        <p>Online reservation is a system which makes easier to manage services provided by small and mid-size companies on reservation issues. This product includes as well a CRM system to manage customers, prices and other services offered by the company.</p>
                        <hr>
                        <p>This product is developed by FRES Media Oy. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
