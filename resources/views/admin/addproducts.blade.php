@extends('admin.main')

@section('contents')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- form start -->
<div class="container-fluid pt-4 px-4 sizing">
    <div class="col-sm-12">

        <div class="bg-secondary rounded h-100 p-4">
            @if(Session::has('msg'))
            <div class="alert alert-success alert-dismissible">
                {{Session::get('msg')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style='border:none;background:none'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(Session::has('delmg'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('delmg')}}
            </div>
            @endif
            <h1 class="mb-4" style="text-align:center">Add Products</h1>
            <form action="{{route('products')}}" method='post' enctype='multipart/form-data'>
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
                                <input type="text" class="form-control" id="exampleInputEmail2"
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
                                <select name="brand" id="brand">
                                    @foreach($brand as $brand)
                                        <option value="{{$brand->id}}">{{$brand->brandName}}</option>
                                    @endforeach
                                </select>
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
                    <select name="categoryid" id="categoryid" class='form-select'>
                        @foreach($category as $select)
                            <option value="{{$select->id}}">{{$select->categories}}</option>
                        @endforeach
                    </select>
                    <!-- <input type="text" class="form-control" id="categoryid" aria-describedby="emailHelp"
                        name="categoryid"> -->
                    <label for="exampleInputEmail1" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="categoryid" aria-describedby="emailHelp"
                        name="quantity">
                    <label for="exampleInputEmail1" class="form-label">Size</label>
                    <input type="text" class="form-control" id="categoryid" aria-describedby="emailHelp"
                        name="size"><br>
                    <label for="specialproducts" class="form-label">SpecialProduct</label>
                    <select class="form-select" aria-label="Default select example" name='choices'>
                        <option selected>Special Product</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select> 
                    <label for="formFile" class="form-label">Photo</label>
                    <input class="form-control bg-dark" type="file" id="formFile" name="image">

                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
<!-- form end -->
@endsection