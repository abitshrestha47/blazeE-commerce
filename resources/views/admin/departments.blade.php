@extends('admin.main')

@section('contents')
           <!-- form start -->
           <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12">

                    <div class="bg-secondary rounded h-100 p-4">
                        <h1 class="mb-4" style="text-align:center">Add Departments</h1>
                        <form action="{{route('departments')}}" method='post' enctype='multipart/form-data'>
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">DepartmentName</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="deptname">
                                <label for="formFile" class="form-label">DepartmentImage</label>
                                <input class="form-control bg-dark" type="file" id="formFile" name="departmentImage">
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- form end -->
@endsection