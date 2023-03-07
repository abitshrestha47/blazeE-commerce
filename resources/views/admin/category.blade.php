@extends('admin.main')

@section('contents')

<input type="text" class='view' value='category'>
<!-- category section start -->
<div class="container-fluid pt-4 px-4">
    <div class="card bg-secondary w-100">
        <div class="card-body">
            @if(Session::has('msg'))
            <div class="alert alert-success" role="alert">
                {{Session::get('msg')}}
            </div>
            @endif
            @if(Session::has('delmsg'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('delmsg')}}
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
            <h6 class="mb-4">Category Table</h6>
            <div class="table-responsive">
                <table class="table">
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
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->categories}}</td>
                            <td>{{$category->departments->departmentName}}</td>
                            <td><a href="{{route('editcategory',$category->id)}}">Edit</a></td>
                            <td><a href="{{route('delete',$category->id)}}">Delete</a></td>
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
<!-- table end -->

@endsection