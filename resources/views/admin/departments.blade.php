@extends('admin.main')

@section('contents')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{asset('/admin/css/format.css')}}">

<!-- form start -->
<div class="container-fluid pt-4 px-4">
    <div class="card bg-secondary w-100">
        <div class="card-body">
            <h1 class="mb-4" style="text-align:center">Add Departments</h1>
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                {{Session::get('success')}}
                <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @error('deptname')
                    <br>
                    <div class="alert alert-danger alerting">
                        {{$message}}
                        <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>
                    @enderror
            <form action="{{route('departments')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">DepartmentName</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="deptname">
                    
                    <label for="formFile" class="form-label">DepartmentImage</label>
                    <input class="form-control bg-dark" type="file" id="formFile" name="departmentImage">
                    @error('departmentImage')
                    <br>
                    <div class="alert alert-danger alerting">
                        {{$message}}
                        <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>
                    @enderror
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
            <h6 class="mb-4" style="text-align: center;">Departments Table</h6>
            <div class="table-responsive">
                <table class="table table-success table-striped table-hover">
                    <thead>
                        <th>Sno.</th>
                        <th>Department Name</th>
                        <th>Department Image</th>
                        <th colspan='2'>Action</th>
                    </thead>
                    
                    
                    <tr>
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
@if(Session::has('success'))
    <script>    
            toastr.success("Department created successfully!");
    </script>
    @endif
@endsection