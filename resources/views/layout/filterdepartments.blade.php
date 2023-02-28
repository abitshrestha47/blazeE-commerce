@extends('layout.header')


@section('contents')
<div class="col-12 col-md-8 col-lg-9">
    <div class="shop_grid_product_area p-5">
        <div id="productData">
            <div class="row">
                @foreach($productsArray as $productsArray)
                <!-- Single gallery Item -->
                <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.2s">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src="{{asset('/storage/'.$productsArray->photo)}}" alt="">
                        <!-- <img src="{{asset('/storage/' .$productsArray->photo)}}" alt=""> -->
                        <div class="product-quicview">
                            <a href="#" data-toggle="modal" data-target="#quickview" class='productdatamodal'
                                data-id='{{$productsArray->id}}'><i class="ti-plus"></i></a>
                        </div>
                    </div>
                    <!-- Product Description -->
                    <div class="product-description">
                        <h4 class="product-price">{{'$'.$productsArray->price}}</h4>
                        <p>{{$productsArray->name}}</p>
                        <p>{{$productsArray->brand->brandName}}</p>
                        <p>{{$productsArray->category->categories}}</p>
                        <!-- Add to Cart -->
                        <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script src="{{asset('home/js/department.js')}}"></script>
@endsection