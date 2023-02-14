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
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Name</label>
                            </div>
                            <div class="row">
                                <div class="col-11">
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label space">Price</label>
                            <div class="col-11">
                                <input type="text" class="form-control" id="originalPrice"
                                    aria-describedby="emailHelp" name="price">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <label for="exampleInputEmail1" class="form-label">Brand</label>
                            </div>
                            <div class="row">
                                <div class="col-11">
                                    <input type="text" class="form-control" id="brand" aria-describedby="emailHelp"
                                        name="brand">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="exampleInputEmail1" class="form-label">Color</label>
                            <div class="col-11">
                                <input type="text" class="form-control" id="color" aria-describedby="emailHelp"
                                    name="color">
                            </div>
                        </div>
                    </div>

                    <label for="exampleInputEmail1" class="form-label">CategoryID</label>
                    <input type="text" class="form-control" id="categoryid" aria-describedby="emailHelp"
                        name="categoryid">

                    <label for="exampleInputEmail1" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="categoryid" aria-describedby="emailHelp"
                        name="quantity">
                    <label for="exampleInputEmail1" class="form-label">Size</label>
                    <input type="text" class="form-control" id="categoryid" aria-describedby="emailHelp"
                        name="size"><br>
                    <label for="formFile" class="form-label">Photo</label>
                    <input class="form-control" type="file" id="formFile" name="image">

                    <label for="Description" class="form-label">Description</label>
                    <input class="form-control" type="text" id="description" name="description">

                    <label for="discountif" class="form-label">DiscountOffer(%)</label>
                    <input class="form-control" type="text" id="discountPercent" name="discountoffer">

                    <label for="discountprice" class="form-label">DiscountPrice</label>
                    <input class="form-control" type="text" id="discountPrice" name="discountprice">

                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
<!-- form end -->

<script src="{{asset('admin/js/specialproducts.js')}}"></script>
@endsection