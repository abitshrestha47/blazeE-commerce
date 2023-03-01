@extends('layout.header')


@section('contents')
<table>
    <tr>
        <th>Name of the recipient</th> 
        <th>Address</th>
        <th>Phone</th>
        <th>Email</th>
    </tr>
    <tr>
        @foreach($gettrackdetails as $track)
        <td>{{$track->nameRecipient}}</td>
        <td>{{$track->street}}</td>
        <td>{{$track->phone}}</td>
        <td>{{$track->email}}</td>
        @endforeach
    </tr>
</table>


@endsection





