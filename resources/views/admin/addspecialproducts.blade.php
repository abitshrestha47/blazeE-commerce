@extends('admin.main')

@section('contents')
<!-- form start -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container-fluid pt-4 px-4 sizing">
    <div class="col-sm-12">

        <div class="bg-secondary rounded h-100 p-4">
            @if(Session::has('msg'))
            <div class="alert alert-success" role="alert">
                {{Session::get('msg')}}
            </div>
            @endif
            @if(Session::has('delmg'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('delmg')}}
            </div>
            @endif
            <h1 class="mb-4" style="text-align:center">Add Products</h1>
            <form action="{{route('special-products')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="mb-3">

                    <label for="Description" class="form-label">Description</label>
                    <input class="form-control" type="text" id="description" name="description">

                    <label for="discountif" class="form-label">DiscountOffer(%)</label>
                    <input class="form-control" type="text" id="discountPercent" name="discountoffer">

                    <label for="discountprice" class="form-label">DiscountPrice</label>
                    <input class="form-control" type="text" id="discountPrice" name="discountprice">

                    <label for="products" class="form-label">ProductName</label>
                    <select name="productId" id="productId">
                    @foreach($products as $producting)
                        <option value="{{$producting->id}}" data-price="{{$producting->price}}">{{$producting->name}}</option>
                    @endforeach
                    </select>
                    <label for="productprice" class='form-label'>Price</label>
                    <input type="text" name='productprice' id='originalPrice' class='form-control' readonly>

                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
<!-- form end -->

<script src="{{asset('admin/js/specialproducts.js')}}"></script>
@endsection