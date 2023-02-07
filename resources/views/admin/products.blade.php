@extends('admin.main')

@section('contents')
<!-- form start -->
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


<!-- table starts -->
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h3 class="mb-4" style="text-align:center">Products Table</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SNo.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">CategoryId</th>
                            <th scope="col">Color</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Photo.</th>
                            <th scope="col" colspan='2'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $products)
                        <tr>
                            <th scope="row">{{$products->id}}</th>
                            <td>{{$products->name}}</td>
                            <td>{{$products->price}}</td>
                            <td>{{$products->categoryid}}</td>
                            <td>{{$products->color}}</td>
                            <td>{{$products->brand->brandName}}</td>
                            <td><img height='70vh' width='70vh' src="{{$products->photo}}" alt=""></td>
                            <td><a href="{{route('productdelete',$products->id)}}">Delete</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<!-- table end -->

@endsection