@extends('admin.dashboard')

@section('contents')
<div class="container">
    <div class="card bg-secondary w-100">
        <div class="card-body">
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

<table class="table m-4">
    <thead>
        <th>Sno.</th>
        <th>Brand</th>
        <th colspan='2'>Action</th>
    </thead>
    @if(isset($brands))
    @foreach($brands as $brands)
    <tr>
        <td>{{$brands->brandId}}</td>
        <td>{{$brands->brandName}}</td>
    </tr>
    @endforeach
    @endif
</table>
@endsection

change