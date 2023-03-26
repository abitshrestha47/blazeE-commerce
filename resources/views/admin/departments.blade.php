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


<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{asset('/admin/css/format.css')}}">
<input type="hidden" name="department12" value="departments" class="view">

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
                </button>
            </div>
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
                        </button>
                    </div>
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
            <div id="filter">
                <div class="table-responsive">
                    <table class="table table-success table-striped table-hover">
                        <thead>
                            <th>Sno.</th>
                            <th>Department Name</th>
                            <th>Department Image</th>
                            <th colspan='2'>Action</th>
                        </thead>

                        @if(isset($departments))
                        @foreach($departments as $departt)
                        <tr>
                            <td class="departid">{{$departt->id}}</td>
                            <td class="dname">{{$departt->departmentName}}</td>
                            <td class="dimage"><img src="{{asset('/storage/'.$departt->departmentImage)}}" alt=""
                                    height="50vh" width="50vw"></td>
                            <td><button type="button" class="btn btn-primary editdepart" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@mdo">Edit</button></button></td>
                            <form action="{{route('deldepartments')}}" method="POST">
                                @csrf
                                <td><button type="submit" value="{{$departt->id}}" class="del" name="idpass"><i
                                            class="fa fa-trash" aria-hidden="true"></i></button></td>
                            </form>

                        </tr>
                        @endforeach
                        @endif
                </div>
                </table>
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
                <form action="{{route('editdepartment')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <label for="departmentid" class="col-form-label">Department ID</label>
                        <input type="readonly" class="form-control departmentid" id="departmentid" name="departmentid"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="departmentname" class="col-form-label">Deparment Name:</label>
                        <input type="text" class="form-control" id="departmentname" name="departmentname">
                    </div>
                    <div class="form-group">
                        <label for="departmentimage" class="col-form-label">Department Image:</label>
                        <input class="form-control bg-dark" type="file" id="formFile" name="editdepartmentImage">
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
    $('.editdepart').click(function() {
        var departid = $(this).closest('tr').find('.departid').text();
        var dname = $(this).closest('tr').find('.dname').text();
        var departmentid = document.getElementById('departmentid');
        var departmentname = document.getElementById('departmentname');
        departmentid.value = departid;
        departmentname.value = dname;
    });
});
</script>
@if(Session::has('success'))
<script>
toastr.success("Department created successfully!");
</script>
@endif
@endsection