<div class="row" id="tbody">
    @foreach($goods as $goods)
    <div class="col-lg-4 col-sm-6">
        <div class="product-item">
            <div class="pi-pic">
                <img height='250vh' width='250vh' src="{{asset('/storage/' .$goods->photo)}}" alt="">
                <div class="icon">
                    <i class="icon_heart_alt"></i>
                </div>
                <ul>
                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a>
                    </li>
                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                </ul>
            </div>
            <div class="pi-text">
                <div class="catagory-name">Shoes</div>
                <a href="#">
                    <h5>{{$goods->name}}</h5>
                </a>
                <div class="product-price">
                    {{$goods->price}}
                    <span>$35.00</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>