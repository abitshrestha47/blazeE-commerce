@extends('admin.main')

@section('contents')
<!-- table starts -->
<style>
    thead, tbody, tfoot, tr, td, th {
    border-color: inherit;
    border-style: none !important;
    border-width: 0;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                            <th scope="col">Town/City/Country</th>
                            <th scope="col">Province</th>
                            <th scope="col">DateofPlaced</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col" colspan='2'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $orders)
                        <tr>
                            <th scope="row" class='orderid'>{{$orders->id}}</th>
                            <td>{{$orders->firstName}}{{" ".$orders->lastName}}</td>
                            <td>{{$orders->street1}}{{"/".$orders->town}}{{"/".$orders->country}}</td>
                            <td>{{" ".$orders->province}}</td>
                            <td>{{$orders->created_at}}</td>
                            <td>{{$orders->email}}</td>
                            <td>{{$orders->phone}}</td>
                            <td><a href="#" data-toggle="modal" class="modal-trigger viewing"
                                    data-target="#productModal" id="viewing"><i class="fas fa-eye idgive"></i>
                                </a></td>
                            <td><a href="#" data-toggle="modal" class="modal-tracker addingorder"
                                    data-target="#trackModal"><i class="fas fa-plus-circle"></i>
                                </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="productModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    {{$orders->firstName}}{{" ".$orders->lastName." "}}Products List</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class='table inserting'>
                                    <thead>
                                        <tr>
                                            <th>ProductId</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="trackModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Track List</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <table class='table addingorder'>
                                    <thead>
                                        <tr>
                                            <th>OrderID</th>
                                            <th>UserID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="oid"></td>
                                            <td class='userid'></td>
                                            <td class="fullNamee"></td>
                                            <td class="address"></td>
                                            <td class="phone"></td>
                                            <td class="email"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="orderproducts table" style="border-style:none !important;">
                                </table>
                                <!-- <div class="table-responsive">
                                    @foreach($order as $orderbott)
                                    Name:<span class="firstNamee">{{$orderbott->firstName}}</span><span
                                    class="lastNamee">{{$orderbott->lastName}}</span><br>
                                    Address:<span
                                        class="address">{{$orderbott->street1}},{{$orderbott->country}}</span><br>
                                    Phone:<span class="phone">{{$orderbott->phone}}</span><br>
                                    Email:<span class="email">{{$orderbott->email}}</span><br>
                                    OrderNo:<span class="order">{{$orderbott->id}}</span>
                                    @endforeach
                                </div> -->
                                <label>DeliverBoy</label>
                                <select name="deliverman" id="deliverman">
                                    @foreach($deliverman as $del)
                                    <option value="{{$del->id}}">{{$del->name}}</option>
                                    @endforeach
                                </select>
                                <br><button class="btn btn-primary addnow">Add Now</button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <td><img height='70vh' width='70vh' src="{{$orders->email}}" alt=""></td> -->
            <!-- <td><a href="{{route('productdelete',$orders->id)}}">Delete</a></td> -->

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
    $('.modal-tracker').click(function() {
        $('#trackModal').modal('show');
    });
});
</script>
<script>
$(document).ready(function() {
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $(".addingorder").click(function() {
        var orderid = $(this).closest('tr').find('.orderid').text();
        $.ajax({
            url: '/addingorder',
            type: 'GET',
            data: {
                orderid: orderid,
            },
            success: function(order) {
                console.log(order);
                for (var key in order) {
                    const addingorder = document.querySelector('.addingorder');
                    addingorder.innerHTML = "";
                    $('.oid').text(order[key].id);
                    $('.userid').text(order[key].userid);
                    $('.fullNamee').text(order[key].firstName + " " + order[key].lastName);
                    $('.address').text(order[key].town + "," + order[key].province + "," +
                        order[key].country);
                    $('.phone').text(order[key].phone);
                    $('.email').text(order[key].email);

                    const productObj = JSON.parse(order[key].products);
                    const orderproducts = document.querySelector('.orderproducts');
                    orderproducts.innerHTML = "";
                    let row = orderproducts.insertRow();

                    let cell1 = row.insertCell();
                    cell1.innerHTML = "ProductID";

                    let cell2 = row.insertCell();
                    cell2.innerHTML = "Name";

                    let cell3 = row.insertCell();
                    cell3.innerHTML = "Quantity";

                    let cell4 = row.insertCell();
                    cell4.innerHTML = "Total Price";

                    let cell5 = row.insertCell();
                    cell5.innerHTML = "Image";
                    for (let key in productObj) {
                        window.assetUrl = "{{ asset('/storage/') }}";
                        let row = orderproducts.insertRow();

                        let cell1 = row.insertCell();
                        cell1.innerHTML = productObj[key].id;

                        let cell2 = row.insertCell();
                        cell2.innerHTML = productObj[key].name;

                        let cell3 = row.insertCell();
                        cell3.innerHTML = productObj[key].qty;

                        let cell4 = row.insertCell();
                        cell4.innerHTML =productObj[key].price;

                        let imageUrl = window.assetUrl + '/' + productObj[key].img;
                        let cell5 = row.insertCell();
                        let img = document.createElement('img');
                        img.src = imageUrl;
                        img.width = 100;
                        cell5.appendChild(img);
                    }
                }
            }
        });
    });
    $(".idgive").click(function() {
        var orderid = $(this).closest('tr').find('.orderid').text();
        $.ajax({
            url: '/giveorderid',
            type: 'GET',
            data: {
                orderid: orderid,
            },
            success: function(pr) {
                var body = $('.modal-body');
                window.assetUrl = "{{ asset('/storage/') }}";
                const table = document.querySelector('.inserting');
                table.innerHTML = "";
                let row = table.insertRow();

                let cell1 = row.insertCell();
                cell1.innerHTML = "SNo.";

                let cell2 = row.insertCell();
                cell2.innerHTML = "Name";

                let cell3 = row.insertCell();
                cell3.innerHTML = "Quantity";

                let cell4 = row.insertCell();
                cell4.innerHTML = "Price";

                let cell5 = row.insertCell();
                cell5.innerHTML = "Image";
                for (let key in pr) {
                    let row = table.insertRow();

                    let cell1 = row.insertCell();
                    cell1.innerHTML = pr[key].id;

                    let cell2 = row.insertCell();
                    cell2.innerHTML = pr[key].name;

                    let cell3 = row.insertCell();
                    cell3.innerHTML = pr[key].qty;

                    let cell4 = row.insertCell();
                    cell4.innerHTML ="$"+ pr[key].price;

                    let imageUrl = window.assetUrl + '/' + pr[key].img;
                    let cell5 = row.insertCell();
                    let img = document.createElement('img');
                    img.src = imageUrl;
                    img.width = 100;
                    cell5.appendChild(img);
                }
                console.log(pr[2].name);
            }
        });
    });
});
</script>
<script src="{{asset('/admin/js/order.js')}}"></script>
@endsection