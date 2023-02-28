@extends('layout.header')

@section('contents')
    <form action="{{route('changepass')}}" method="post">
        @csrf
        <label for="email" class="form-label">Email:</label>
        <input type="text" name="email" class="form-control">
        <label for="password">Old password:</label>
        <input type="text" name="oldpassword" class="form-control"> 
        <label for="newpassword">New Password:</label>
        <input type="password" name="newpassword" class="form-control"> 
        <label for="newpassword">Retypepassword</label>
        <input type="password" name="retypepassword" class="form-control">
        <button type='submit'>Change Password</button>
    </form>
@endsection