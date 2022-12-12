@extends('admin.dashboard')
@section('contents')
<div class="container">
    <div class="card bg-secondary w-100">
        <div class="card-body">
            <h1 class='text-white'>Edit Category</h1>
            <form action="{{route('categoryedit')}}" method='post'>
                @csrf
                <div class="mb-3">
                    <label for="category" class="form-label text-white">Category Name</label>
                    <input type="text" name='category' class="form-control" id="category" value="{{$category->categories}}">
                    <input type="hidden" name='id' class='form-control' value='{{$category->id}}'>
                </div>
                <button type='submit' class='btn btn-danger'>Submit </button>
            </form>
        </div>
    </div>
</div>
@endsection