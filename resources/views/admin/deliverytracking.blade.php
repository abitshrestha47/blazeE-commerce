@extends('admin.main')

@section('contents')
<!-- table starts -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h3 class="mb-4" style="text-align:center">delivertrack Table</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SNo.</th>
                            <th scope="col">NameofRecipient</th>
                            <th scope="col">Street</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date/Time</th>
                            <th scope="col">Status</th>
                            <th scope="col" colspan='2'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($delivertrack as $delivertrack)
                        <tr>
                            <th scope="row" class='id'>{{$delivertrack->id}}</th>
                            <td>{{$delivertrack->nameRecipient}}</td>
                            <td>{{$delivertrack->street}}</td>
                            <td>{{$delivertrack->phone}}</td>
                            <td>{{$delivertrack->email}}</td>
                            <td>{{$delivertrack->date}}</td>
                            <td>
                            <select name="status" id="status">
                                <option value="processing">Processing</option>
                                <option value="shipping">Shipping</option>
                                <option value="Picked from warehouse">Picked form warehouse</option>
                                <option value="Delivered">Delivered</option>
                            </select>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<!-- table end -->
<script src="{{asset('/admin/js/deliverytracking.js')}}"></>

@endsection