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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<input type="hidden" value="brands" class="view">

<div class="container-fluid pt-4 px-4">
    <div class="card bg-secondary w-100">
        <div class="card-body">
            @if(Session::has('msg'))
            <div class="alert alert-success" role="alert">
                {{Session::get('msg')}}
                <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(Session::has('delmsg'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('delmsg')}}
                <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <h1 class='text-white'>Add Brand</h1>
            <form action="{{route('brander')}}" method='post'>
                @csrf
                <div class="mb-3">
                    <label for="brand" class="form-label text-white">Brand Name</label>
                    <input type="text" name='brand' class="form-control" id="brand">
                </div>
                <button type='submit' class='btn btn-danger'>Submit </button>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4" style="text-align: center;">Brand Table</h6>
            <div id="filter">
                <div class="table-responsive">
                    <table class="table table-success table-striped table-hover">
                        <thead>
                            <th>Sno.</th>
                            <th>Brand</th>
                            <th colspan='2'>Action</th>
                        </thead>
                        @if(isset($brands))
                        @foreach($brands as $brands)
                        <tr>
                            <td class="brandid">{{$brands->id}}</td>
                            <td class="brandname">{{$brands->brandName}}</td>
                            <td><button type="button" class="btn btn-primary editbrands" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@mdo">Edit</button></button></td>
                            <td><a href="{{route('deletebrand',$brands->id)}}"><i class="fa fa-trash"
                                        aria-hidden="true"></i></a></td>
                        </tr>
                        @endforeach
                        @endif
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Departments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('editbrand')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <label for="brandid" class="col-form-label">Brand ID</label>
                        <input type="readonly" class="form-control brandid" id="brandid" name="brandid" readonly>
                    </div>
                    <div class="form-group">
                        <label for="brandname" class="col-form-label">Brand Name:</label>
                        <input type="text" class="form-control" id="brandname" name="brandname">
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
<script>
$(document).ready(function() {
    $('.editbrands').click(function() {
        var brandid = $(this).closest('tr').find('.brandid').text();
        var brandname = $(this).closest('tr').find('.brandname').text();
        var brid = document.getElementById('brandid');
        var brname = document.getElementById('brandname');
        brid.value = brandid;
        brname.value = brandname;
    });
});
</script>
@if(Session::has('msg'))
<script>
toastr.success("Brand Name Added Successfully!");
</script>
@endif
@if(Session::has('delmsg'))
<script>
toastr.error("Brand Deleted Successfully!");
</script>
@endif
@endsection