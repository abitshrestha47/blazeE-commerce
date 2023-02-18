@extends('admin.main')

@section('contents')

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{asset('/admin/css/format.css')}}">

<!-- form start -->
<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12">

        <div class="bg-secondary rounded h-100 p-5">
            <h1 class="mb-4" style="text-align:center">Add Departments</h1>
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible col-md-4">
                {{Session::get('success')}}
                <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form action="{{route('departments')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">DepartmentName</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="deptname">
                    @error('deptname')
                    <br>
                    <div class="alert alert-danger alerting">
                        {{$message}}
                        <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>
                    @enderror
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
@endsection