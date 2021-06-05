@extends('frontend.layouts.master')
@section('title')
Offers | {{ config('app.name') }}
@endsection
@section('main-content')
<div class="fres">
    <div class="view" style="background-image: url('../images/foto3.jpg'); min-height:400px; width:100%; background-repeat: no-repeat; background-position: top center;">
       <div class="container top2">
          <div class="row">
             <div class="col-md-8 g-0 p-2 lang2">
                <div class="bg-light p-3">
                   <h1>Offers</h1>
                   <p>Slogan with more content here...</p>
                   <div class="container top2">
                      <div class="row">
                         <div class="col-md-6 g-2">
                            <div class="offers bg-success p-2">
                               <h1>50 €</h1>
                               <ul>
                                  <li>Service 1</li>
                                  <li>Service 2</li>
                                  <li>Service 3</li>
                                  <li>Service 4</li>
                               </ul>
                               <hr>
                               <h2><a href="#" style="text-align: center" class="btn bg-light border-secondary">Choose offer</a></h2>
                            </div>
                         </div>
                         <div class="offer col-md-6 g-2">
                            <div class="offers bg-info p-2">
                               <h1>120 €</h1>
                               <ul>
                                  <li>Service 1</li>
                                  <li>Service 2</li>
                                  <li>Service 3</li>
                                  <li>Service 4</li>
                               </ul>
                               <hr>
                               <h2><a href="#" style="text-align: center" class="btn bg-light border-secondary">Choose offer</a></h2>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-md-4 g-1 p-2">
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
