@extends('admin.main')

@section('contents')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- table starts -->
<input type="text" value="products" class="view">
<div class="container-fluid pt-4 px-4 tabulous1">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h3 class="mb-4" style="text-align:center">Products Table</h3>
            <div id="filter">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="tabulous">
                            <tr>
                                <th scope="col">SNo.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Color</th>
                                <th scope="col">Size</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Photo.</th>
                                <th scope="col">Status</th>
                                <th scope="col" colspan='2'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $products)
                            <tr class="table-success">
                                <th scope="row" class="productsid">{{$products->id}}</th>
                                <td class="productsname">{{$products->name}}</td>
                                <td class="productsprice">{{$products->price}}</td>
                                <td>{{$products->category->categories}}</td>
                                <td class="productscolor">{{$products->color}}</td>
                                <td class="productssize">{{$products->size}}</td>
                                <td class="productsqty">{{$products->quantity}}</td>
                                <td>{{$products->brand->brandName}}</td>
                                <td><img height='70vh' width='70vh' src="{{asset('/storage/'.$products->photo)}}"
                                        alt=""></td>
                                <td></td>
                                <td><button type="button" class="btn btn-primary editproducts" data-toggle="modal"
                                        data-target="#exampleModal" data-whatever="@mdo">Edit</button></button></td>
                                <td><a href="{{route('productdelete',$products->id)}}"><i
                                            class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('editprods')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <label for="productid" class="col-form-label">Product ID</label>
                        <input type="readonly" class="form-control pid" id="pid" name="pid" readonly>
                    </div>
                    <div class="form-group">
                        <label for="productname" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="pname" name="pname">
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-form-label">Price:</label>
                        <input type="text" class="form-control" id="pprice" name="pprice">
                    </div>
                    <label for="category" class="col-form-label">Category:</label>
                    <select name="cateid" id="cateid" class='form-select'>
                        @foreach($category as $select)
                        <option value="{{$select->id}}">{{$select->categories}}</option>
                        @endforeach
                    </select>

                    <label for="brands" class="col-form-label">Brand:</label>
                    <select name="brandedit" id="brandedit" class='form-select'>
                        @foreach($brand as $select)
                        <option value="{{$select->id}}">{{$select->brandName}}</option>
                        @endforeach
                    </select>

                    <div class="form-group">
                        <label for="color" class="col-form-label">Color:</label>
                        <input type="text" class="form-control" id="pcolor" name="pcolor">
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <input type="text" class="form-control" id="pdescription" name="pdescription">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- table end -->

<script>
$(document).ready(function() {
    $('.editproducts').click(function() {
        var prid = $(this).closest('tr').find('.productsid').text();
        var name = $(this).closest('tr').find('.productsname').text();
        var price = $(this).closest('tr').find('.productsprice').text();
        var color = $(this).closest('tr').find('.productscolor').text();
        var pid = document.getElementById('pid');
        var pname = document.getElementById('pname');
        var pprice = document.getElementById('pprice');
        var pcolor = document.getElementById('pcolor');
        pid.value = prid;
        pname.value = name;
        pprice.value = price;
        pcolor.value = color;
    });
});
</script>

@endsection