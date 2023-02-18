@extends('layout.app')


@section('contents')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>A.S.K Ecommerce</title>
    <link rel="stylesheet" href="home/css/style.css">
</head>
<body class="bod">

<div class="bod">
<div class="panda">
    <div class="ear"></div>
        <div class="face">
            <div class="eye-shade"></div>
            <div class="eye-white">
                <div class="eye-ball"></div>
            </div>
            <div class="eye-shade rgt"></div>
            <div class="eye-white rgt">
                <div class="eye-ball"></div>
            </div>
            <div class="nose"></div>
            <div class="mouth"></div>
        </div>
        <div class="body"></div>
        <div class="foot">
            <div class="finger"></div>
        </div>
        <div class="foot rgt">
            <div class="finger"></div>
        </div>
</div>
<form action="{{route('forgotit')}}" method='post' class='applythis'>
    @csrf
    <div class="hand"></div>
    <div class="hand rgt"></div>
    
    <p>Enter your details</p>
    <div class="form-group">
        <input type="text" required="required" class="form-control" name="email"/>
        <label class="form-label">Email</label>
    </div>
    <div class="form-group">
        <button class="btn" type="submit">Submit</button>
    </div>
</form>
</div>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="home/js/script.js"></script>
</body>
</html>
@endsection