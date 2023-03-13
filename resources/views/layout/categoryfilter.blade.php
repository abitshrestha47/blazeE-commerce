<div class="row" id='tbody'>
    @foreach($goods as $goods)
    <!-- Single gallery Item -->
    <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.2s">
        <!-- Product Image -->
        <div class="product-img">
            <img src="{{asset('/storage/'.$goods->photo)}}" alt="" style="width:40vw; height:40vh">
            <div class="product-quicview">
                <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
            </div>
        </div>
        <!-- Product Description -->
        <div class="product-description">
            <h4 class="product-price">{{'$'.$goods->price}}</h4>
            <p>{{$goods->name}}</p>
            <p>{{$goods->brand->brandName}}</p>
            <p>{{$goods->category->categories}}</p>
            <!-- Add to Cart -->
            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
        </div>
    </div>
    @endforeach
</div>

