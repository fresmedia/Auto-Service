@extends('frontend.layouts.master')
@section('title')
Prices | {{ config('app.name') }}
@endsection
@section('main-content')
<div class="fres">
    <div class="view" style="background-image: url('../images/foto2.jpg'); min-height:400px; width:100%; background-repeat: no-repeat; background-position: top center;">
       <div class="container top2">
          <div class="row">
             <div class="col-md-8 g-0 p-2 lang2">
                <div class="bg-light p-3">
                   <h1>Price list</h1>
                   <p>Below you find prcie list and content of the services are listed under the price.</p>
                   <div class="accordion" id="accordionExample">
                      <div class="accordion-item">
                         <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                               <div class="container">
                                  <div class="row auto">
                                     <div class="col-8">
                                        <h1>First service</h1>
                                     </div>
                                     <div class="col">
                                        <h2> 17,00 €</h2>
                                     </div>
                                  </div>
                               </div>
                            </button>
                         </h2>
                         <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               <ul>
                                  <li>contain 1</li>
                                  <li>contain 2</li>
                                  <li>contain 3</li>
                                  <li>contain 4</li>
                               </ul>
                               <hr>
                               if you want to book online 
                               <a href="#" style="text-align: center" class="btn bg-primary border-white">
                                  Add 
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                     <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                     <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                  </svg>
                               </a>
                            </div>
                         </div>
                      </div>
                      <div class="accordion-item">
                         <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                               <div class="container">
                                  <div class="row auto">
                                     <div class="col-8">
                                        <h1>Second service</h1>
                                     </div>
                                     <div class="col">
                                        <h2> 30,00 €</h2>
                                     </div>
                                  </div>
                               </div>
                            </button>
                         </h2>
                         <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               <p>contain 1, contain 2, contain 3, contain 4</p>
                               <hr>
                               if you want to book online 
                               <a href="#" style="text-align: center" class="btn bg-primary border-white">
                                  Add 
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                     <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                     <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                  </svg>
                               </a>
                            </div>
                         </div>
                      </div>
                      <div class="accordion-item">
                         <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                               <div class="container">
                                  <div class="row auto">
                                     <div class="col-8">
                                        <h1>Third service</h1>
                                     </div>
                                     <div class="col">
                                        <h2> 75,00 €</h2>
                                     </div>
                                  </div>
                               </div>
                            </button>
                         </h2>
                         <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               <ul>
                                  <li>contain 1</li>
                                  <li>contain 2</li>
                                  <li>contain 3</li>
                                  <li>contain 4</li>
                               </ul>
                            </div>
                         </div>
                      </div>
                      <div class="accordion-item">
                         <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                               <div class="container">
                                  <div class="row auto">
                                     <div class="col-8">
                                        <h1>Fourth service</h1>
                                     </div>
                                     <div class="col">
                                        <h2> 125,00 €</h2>
                                     </div>
                                  </div>
                               </div>
                            </button>
                         </h2>
                         <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               <p>contain 1, contain 2, contain 3, contain 4</p>
                            </div>
                         </div>
                      </div>
                      <div class="accordion-item">
                         <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                               <div class="container">
                                  <div class="row auto">
                                     <div class="col-8">
                                        <h1>Other services</h1>
                                     </div>
                                     <div class="col">
                                        <h2> 15,00 €</h2>
                                     </div>
                                  </div>
                               </div>
                            </button>
                         </h2>
                         <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               <p>contain 1, contain 2, contain 3, contain 4</p>
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
