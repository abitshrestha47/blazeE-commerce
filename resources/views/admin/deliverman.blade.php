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
            <h1 class="mb-4" style="text-align:center">Add DeliverMan</h1>
            <form action="{{route('deliver-man')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="mb-3">

                    <label for="name" class="form-label">Name</label>
                    <input class="form-control" type="text" id="name" name="name">

                    <label for="phone" class="form-label">Phone</label>
                    <input class="form-control" type="text" id="phone" name="phone">

                    <label for="address" class="form-label">Address</label>
                    <input class="form-control" type="text" id="address" name="address">

                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
<!-- form end -->

@endsection