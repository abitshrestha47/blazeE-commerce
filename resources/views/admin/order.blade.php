@extends('admin.main')

@section('contents')
<!-- table starts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h3 class="mb-4" style="text-align:center">orders Table</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SNo.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Street</th>
                            <th scope="col">Town/City</th>
                            <th scope="col">Country</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Status</th>
                            <th scope="col">Photo.</th>
                            <th scope="col" colspan='2'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $orders)
                        <tr>
                            <th scope="row">{{$orders->id}}</th>
                            <td>{{$orders->firstName}}{{" ".$orders->lastName}}</td>
                            <td>{{$orders->street1}}</td>
                            <td>{{$orders->town}}{{" ".$orders->province}}</td>
                            <td>{{$orders->country}}</td>
                            <td>

                            </td>
                            <td>{{$orders->town}}</td>
                            <td>{{$orders->phone}}</td>
                            <td><a href="#" data-toggle="modal" class="modal-trigger" data-target="#productModal">View
                                    Products</a></td>
                            <div class="modal" id="productModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Product List</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            @foreach($products_decode as $product)
                                            <ul>
                                                Name:<li>{{$product['name']}}</li>
                                                Quantity:<li>{{$product['qty']}}</li>
                                                Price:<li>{{$product['price']}}</li>

                                            </ul>
                                            @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- <td><img height='70vh' width='70vh' src="{{$orders->email}}" alt=""></td> -->
<!-- <td><a href="{{route('productdelete',$orders->id)}}">Delete</a></td> -->
</tr>
</tbody>
@endforeach
</table>
</div>
</div>
</div>
</div>
<!-- table end -->

<script>
$(document).ready(function() {
    $('.modal-trigger').click(function() {
        $('#productModal').modal('show');
    });
});
</script>
@endsection