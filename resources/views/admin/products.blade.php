@extends('admin.main')

@section('contents')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- table starts -->
<input type="text" value="products" class="view">
<div id="filter">
<div class="container-fluid pt-4 px-4 tabulous1">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h3 class="mb-4" style="text-align:center">Products Table</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead class="tabulous">
                        <tr>
                            <th scope="col">SNo.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Color</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Status</th>
                            <th scope="col">Photo.</th>
                            <th scope="col" colspan='2'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $products)
                        <tr class="table-success">
                            <th scope="row">{{$products->id}}</th>
                            <td>{{$products->name}}</td>
                            <td>{{$products->price}}</td>
                            <td>{{$products->category->categories}}</td>
                            <td>{{$products->color}}</td>
                            <td>{{$products->brand->brandName}}</td>
                            <td></td>
                            <td><img height='70vh' width='70vh' src="{{asset('/storage/'.$products->photo)}}" alt=""></td>
                            <td><a href="{{route('productdelete',$products->id)}}"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- table end -->

@endsection