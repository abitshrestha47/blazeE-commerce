@extends('admin.main')

@section('contents')
<!-- form start -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<div class="container-fluid pt-4 px-4">
    <div class="card bg-secondary w-100">
        <div class="card-body">
            @if(Session::has('msg'))
            <div class="alert alert-success " role="alert">
                {{Session::get('msg')}}
                <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(Session::has('delmg'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('delmg')}}
                <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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

                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">

                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
<!-- form end -->

<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4" style="text-align: center;">Delivery Man Table</h6>
            <div class="table-responsive">
                <table class="table table-success table-striped table-hover">
                    <thead>
                        <th>Sno.</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th colspan='2'>Action</th>
                    </thead>
                    
                    
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href=""><i class="fas fa-edit"></i></a></td>
                        <td><a href=""><i class="fa fa-trash" aria-hidden="true"></i></a></td>                
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection