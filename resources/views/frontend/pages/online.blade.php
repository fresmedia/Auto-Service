@extends('frontend.layouts.master')
@section('title')
Online | {{ config('app.name') }}
@endsection
@section('styles')
   <link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
   <link href="{{ asset('plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet">
   <link href="{{ asset('plugins/time-picker/css/timepicki.css') }}" rel="stylesheet">
@endsection
@section('main-content')
<div class="fres">
    <div class="view" style="background-image: url('../images/foto1.jpg'); min-height:400px; width:100%; background-repeat: no-repeat; background-position: top center;">
       <div class="container top2">
          <div class="row">
             <div class="col-md-8 g-0 p-2 lang2">
                <div class="bg-light p-3">
                   <h1>Step 1</h1>
                   <p>You choose location</p>
                   <div class="form-group">                  
                      <select class="custom-select custom-select-lg">
                        <option selected>Choose location</option>
                        @if($locations)
                           @foreach($locations as $location)
                              @if(app()->getLocale() == 'fi')
                                 <option value="{{$location->id}}">{{$location->location_name_fi}}</option>
                              @else
                                 <option value="{{$location->id}}">{{$location->location_name}}</option>
                              @endif
                           @endforeach
                        @endif
                      </select>
                   </div>
                </div>
                <div class="bg-info p-3">
                   <h1>Step 2</h1>
                   <h2>Helsinki <small>(choosen place)</small></h2>
                   <p>After location, you choose dhe date and time</p>
                   <hr>
                   <p>Calendar is coming here to pick up date and time</p>
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" id="scheduleDate" class="datepicker form_global">
                        </div>
                        <div class="col-md-6">
                           <input id="serviceTime" class="form_global" type="text">
                        </div>
                     </div>
                </div>
                <div class="bg-light p-3">
                   <h1>Step 3</h1>
                   <h1>Online reservation</h1>
                   <p>From the list below, choose "book" and add the services you want to reserve.</p>
                   <div class="accordion" id="accordionExample">
                      @if($primaryServices)
                        @foreach($primaryServices as $pservice)
                           <div class="accordion-item">
                              <h2 class="accordion-header" id="heading{{$pservice->id}}">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$pservice->id}}" aria-expanded="false" aria-controls="collapse{{$pservice->id}}">
                                    <div class="container">
                                       <div class="row auto">
                                          <div class="col-8">
                                             @if(app()->getLocale() == 'fi')
                                                <h1>{{$pservice->service_title_fi}}</h1>
                                             @else
                                                <h1>{{$pservice->service_title}}</h1>
                                             @endif
                                          </div>
                                          <div class="col">
                                             <h3> book</h3>
                                          </div>
                                       </div>
                                    </div>
                                 </button>
                              </h2>
                              <div id="collapse{{$pservice->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$pservice->id}}" data-bs-parent="#accordionExample">
                                 <div class="accordion-body">
                                    <div class="container">
                                       <div class="row auto">
                                          <div class="col-8">
                                             @if(app()->getLocale() == 'fi')
                                                <h1>{!! $pservice->service_description_fi !!}</h1>
                                             @else
                                                <h1>{!! $pservice->service_description !!}</h1>
                                             @endif
                                          </div>
                                          <div class="col">
                                             <h2> {{ $pservice->service_price }} €</h2>
                                             <h2>
                                                <a href="#">
                                                   Add 
                                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                                      <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                                      <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                                   </svg>
                                                </a>
                                             </h2>
                                          </div>
                                       </div>
                                    </div>
                                    <hr>
                                    <div class="btn-group">
                                       <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add more services</button>
                                       <div class="dropdown-menu dropdown-menu-left autocard">
                                          <table class="table">
                                             <tbody>
                                                @if($secondaryServices)
                                                   @foreach($secondaryServices as $sservice)
                                                      <tr>
                                                         <td>
                                                            @if(app()->getLocale() == 'fi')
                                                               {{$sservice->service_title_fi}}
                                                            @else
                                                               {{$sservice->service_title}}
                                                            @endif
                                                         </td>
                                                         <td>{{ $sservice->service_price }} €</td>
                                                         <td>
                                                            <a href="#">
                                                               Add 
                                                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                                                  <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                                                  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                                               </svg>
                                                            </a>
                                                         </td>
                                                      </tr>
                                                   @endforeach
                                                @endif
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        @endforeach
                     @endif   
                   </div>
                </div>
                <div class="bg-info p-3">
                   <h1>Step 4</h1>
                   <h2>Cart with choosen services</h2>
                   <p>You check services, accept the terms and conditions then send</p>
                </div>
                <div class="bg-light p-3">
                   <h1>Step 5</h1>
                   <h2>Order registred in database</h2>
                   <p>System reseiv the order and customer receive also the order in e-mail and link to confirm.</p>
                   <p>After congirmation, he get a message and order is active in database.</p>
                </div>
                <div class="bg-info p-3">
                   <h1>Step 6</h1>
                   <h2>Company and customer</h2>
                   <p>Company and registred customer can have options to edit the order and make changes.</p>
                   <p>If there is changes, both they get notification through e-mail about changes or latest update.</p>
                   <hr>
                   <p>Thank you</p>
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
@section('scripts')
   <script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('plugins/time-picker/js/timepicki.js') }}"></script>
   <script>
      $(document).ready(function(){
         $('#serviceTime').timepicki();
         var date = new Date();
         var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
         $('#scheduleDate').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy',
            todayHighlight: true,
            startDate: today,
         });
      });
   </script>
@endSection
