@extends('admin.dashboard')

@section('contents')
<div class="container" style='height:80vh;'>
    <div class="card bg-secondary w-100 p-5">
        <h1 class='text-center'>Add Products</h1>
        <div class="card-body">
            <form action="{{route('products')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" id="exampleInputEmail1" aria-describedby="emailHelp" name='name'>
                    <label for="exampleInputPassword1" class="form-label">Price</label>
                    <input type="text" name='price' id='price'>
                </div>
                <!-- <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Price</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name='price'>
                </div> -->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Photo</label>
                    <input type="file" id="exampleInputPassword1" name='image'>
                    <label for="brand" class="form-label">Brand</label>
                    <select name="brand" id="brand">
                        <option selected>Select Brand</option>
                        @foreach($products as $brandid)
                        <option value="{{$brandid->brand->id}}">{{$brandid->brand->brandName}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" class="form-control" id="brand" name='brand'>
                </div> -->
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" id="color" name='color'>
                </div>
                <div class="mb-3">
                    <label for="categoryid" class="form-label">CategoryId</label>
                    <select name="categoryid" id="categoryid">
                        <option selected>Select Category</option>
                        @foreach($products as $categoryid)
                            <option value="{{$categoryid->id}}">{{$categoryid->category->categories}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="categoryid" class="form-label">quantity</label>
                    <input type="number" id="categoryid" name='quantity' min='1'>
                </div>
                <div class="mb-3">
                    <label for="categoryid" class="form-label">size</label>
                    <input type="text" id="categoryid" name='size'>
                </div>
                <select class="form-select" aria-label="Default select example" name='choices'>
                    <option selected>Special Product</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>
                <button type="submit" class="btn btn-danger">Submit</button>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <table class="table">
        <thead>
            <th>SNo.</th>
            <th>Name</th>
            <th>Price</th>
            <th>CategoryId</th>
            <th>Color</th>
            <th>Brand</th>
            <th>Photo</th>
            <th colspan='2'>Action</th>
        </thead>
        @foreach($products as $products)
        <tr>
            <td>{{$products->id}}</td>
            <td>{{$products->name}}</td>
            <td>{{$products->price}}</td>
            <td>{{$products->categoryid}}</td>
            <td>{{$products->color}}</td>
            <td>{{$products->brand->brandName}}</td>
            <td><img height='100vh' width='100vh' src="{{asset('/storage/'.$products->photo)}}" alt=""></td>
            <td><a href="{{route('productdelete',$products->id)}}">Delete</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection