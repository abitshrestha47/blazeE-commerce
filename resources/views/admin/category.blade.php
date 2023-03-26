@extends('admin.main')

@section('contents')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<input type="hidden" class='view' value='category'>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- category section start -->
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


            <h1 class='text-white'>Add Category</h1>
            <form action="{{route('category')}}" method='post'>
                @csrf
                <div class="mb-3">
                    <label for="category" class="form-label text-white">Category Name</label>
                    <input type="text" name='category' class="form-control" id="category">
                    <label for="belongstodepartment" class="form-label text-white">DepartmentName</label>
                    <select class="form-select" aria-label="Default select example" name='department_id'>
                        @foreach($departments as $departmentid)
                        <option value="{{$departmentid->id}}">{{$departmentid->departmentName}}</option>
                        @endforeach
                    </select>
                </div>
                <button type='submit' class='btn btn-danger'>Submit </button>
            </form>
        </div>
    </div>
</div>
<!-- category section end -->

<!-- table starts -->
<div id="filter">
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4" style="text-align:center">Category Table</h6>
            <div class="table-responsive">
                <table class="table table-success table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sno.</th>
                            <th scope="col">Category</th>
                            <th scope="col">Department</th>
                            <th scope="col" colspan='2'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($category))
                        @foreach($category as $category)
                        <tr>
                            <th scope="row" class="catid">{{$category->id}}</th>
                            <td class="catt">{{$category->categories}}</td>
                            <td>{{$category->departments->departmentName}}</td>
                            <!-- <td><a href="{{route('editcategory',$category->id)}}"><i class="fas fa-edit"></i></a></td> -->
                            <td><button type="button" class="btn btn-primary editcategory" data-toggle="modal"
                                data-target="#exampleModal" data-whatever="@mdo">Edit</button></button></td>
                            <td><a href="{{route('delete',$category->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                    </tbody>
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
                <form action="{{route('editcategory2')}}" method="POST"  enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <label for="categoryid" class="col-form-label">Category ID</label>
                        <input type="readonly" class="form-control categoryid" id="categoryid" name="categoryid" readonly>
                    </div>
                    <div class="form-group">
                        <label for="categoryname" class="col-form-label">Category Name:</label>
                        <input type="text" class="form-control" id="categoryname" name="categoryname">
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
<!-- table end -->
@if(Session::has('mssg'))
    <script>    
            toastr.success("Category Edited Successfully!");
    </script>
    @endif
@if(Session::has('msg'))
<script>    
    toastr.success("New Category Added Successfully!");
</script>
@endif
@if(Session::has('delmsg'))
<script>    
    toastr.error("Category Deleted Successfully!");
</script>
@endif

<script>
    $(document).ready(function(){
        $('.editcategory').click(function(){
            var categoryid=$(this).closest('tr').find('.catid').text();
            var catt=$(this).closest('tr').find('.catt').text();
            var catid=document.getElementById('categoryid');
            var catname=document.getElementById('categoryname');
            catid.value=categoryid;
            catname.value=catt;
        });
    });
</script>


@endsection