@extends('admin.dashboard')

@section('contents')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{route('category')}}" method='post'>
                @csrf
                <input type="text" name='category' class='form-control'>
                <button type='submit'>Submit </button>
            </form>
        </div>
    </div>
</div>
@endsection