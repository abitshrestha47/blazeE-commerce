@extends('admin.dashboard')

@section('contents')
<div class="container" style='height:100vh;'>
    <div class="card">
        <div class="card-body">
            <form action="{{route('products')}}" method='post' enctype='multipart/form-data'>
              @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='name'>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Price</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name='price'>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name='image'>
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" class="form-control" id="brand" name='brand'>
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control" id="color" name='color'>
                </div>
                <div class="mb-3">
                    <label for="categoryid" class="form-label">CategoryId</label>
                    <input type="text" class="form-control" id="categoryid" name='categoryid'>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection