@extends('admin.dashboard')

@section('contents')
<div class="container">
    <div class="card bg-secondary w-100">
        <div class="card-body">
            <h1 class='text-white'>Add Category</h1>
            <form action="{{route('category')}}" method='post'>
                @csrf
                <div class="mb-3">
                    <label for="category" class="form-label text-white">Category Name</label>
                    <input type="text" name='category' class="form-control" id="category">
                </div>
                <button type='submit' class='btn btn-danger'>Submit </button>
            </form>
        </div>
    </div>
</div>


<table class="table m-4">
    <thead>
        <th>Sno.</th>
        <th>Category</th>
        <th colspan='2'>Action</th>
    </thead>
    @if(isset($category))
    @foreach($category as $category)
    <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->categories}}</td>
        <td><a href="{{route('editcategory',$category->id)}}">Edit</a></td>
        <td><a href="{{route('delete',$category->id)}}">Delete</a></td>
    </tr>
    @endforeach
    @endif
</table>
@endsection