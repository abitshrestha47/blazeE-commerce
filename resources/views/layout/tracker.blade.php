@extends('layout.header')


@section('contents')
<link rel="stylesheet" href="{{asset('/home/css/tracker.css')}}">
<div class="card">
            <div class="title">Purchase Reciept</div>
            <div class="info">
                <div class="row">
                    <div class="col-7">
                        <span id="heading">Date</span><br>
                        <span id="details">10 October 2018</span>
                    </div>
                    <div class="col-5 pull-right">
                        <span id="heading">Order No.</span><br>
                        @foreach($gettrackdetails as $track)
                        <span id="details">
                        {{$track->orderId}}</span>
                        @endforeach
                    </div>
                </div>      
            </div>      
            <div class="pricing">
                @foreach($products as $p)
                <div class="row">
                    <div class="col-9">
                        <span>{{$p['name']}}</span>
                    </div>
                    <div class="col-3">
                        <span>{{"$".$p['price']}}</span>
                    </div>
                </div>
                @endforeach
                <!-- <div class="row">
                    <div class="col-9">
                        <span id="name">BEATS Solo 3 Wireless Headphones</span>  
                    </div>
                    <div class="col-3">
                        <span id="price">&pound;299.99</span>
                    </div>
                </div> -->
                <!-- <div class="row">
                    <div class="col-9">
                        <span id="name">Shipping</span>
                    </div>
                    <div class="col-3">
                        <span id="price">&pound;33.00</span>
                    </div>
                </div> -->
            </div>
            <div class="total">
                <div class="row">
                    <div class="col-9"></div>
                    <div class="col-3"><big>&pound;262.99</big></div>
                </div>
            </div>
            <div class="tracking">
                <div class="title">Tracking Order</div>
            </div>
            <div class="progress-track">
                <ul id="progressbar">
                    @if($getData=="processing")
                    <li class="step0 active" id="step1">Processing</li>
                    <li class="step0 text-center" id="step2">Shipped</li>
                    <li class="step0 text-right" id="step3">Picked from the warehouse</li>
                    <li class="step0 text-right" id="step4">Delivered</li> 
                    @elseif($getData=="shipping")
                    <li class="step0 active " id="step1">Processing</li>
                    <li class="step0 active text-center" id="step2">Shipped</li>
                    <li class="step0 text-right" id="step3">Picked from the warehouse</li>
                    <li class="step0 text-right" id="step4">Delivered</li> 
                    @elseif($getData=="Picked from warehouse")
                    <li class="step0 active" id="step1">Processing</li>
                    <li class="step0 active text-center" id="step2">Shipped</li>
                    <li class="step0 active text-right" id="step3">Picked from the warehouse</li>
                    <li class="step0 text-right" id="step4">Delivered</li> 
                    @elseif($getData=="Delivered")
                    <li class="step0 active" id="step1">Processing</li>
                    <li class="step0 active text-center" id="step2">Shipped</li>
                    <li class="step0 active text-right" id="step3">Picked from the warehouse</li>
                    <li class="step0 active text-right" id="step4">Delivered</li> 
                    @endif
                    <!-- <li class="step0 active " id="step1">Ordered</li>
                    <li class="step0 active text-center" id="step2">Shipped</li>
                    <li class="step0 active text-right" id="step3">On the way</li>
                    <li class="step0 text-right" id="step4">Delivered</li> -->
                </ul>
            </div>
            

            <div class="footer">
                <div class="row">
                    <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/YBWc55P.png"></div>
                    <div class="col-10">Want any help? Please &nbsp;<a> contact us</a></div>
                </div>
                
               
            </div>
        </div>

@endsection





