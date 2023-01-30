@extends('admin.main')


@section('contents')
           <!-- form start -->
           <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12">

                    <div class="bg-secondary rounded h-100 p-4">
                        <h1 class="mb-4" style="text-align:center">Add Poster Details</h1>
                        <form action="{{route('bigposter')}}" method='post' enctype='multipart/form-data'>
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">For</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="for">
                                <label for="exampleInputEmail1" class="form-label">Offer</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="offer">
                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                <input type="text" class="form-control" id="brand" aria-describedby="emailHelp"
                                    name="description">
                                <label for="exampleInputEmail1" class="form-label">Offerprice</label>
                                <input type="text" class="form-control" id="color" aria-describedby="emailHelp"
                                    name="offerprice">
                                <label for="formFile" class="form-label">Photo</label>
                                <input class="form-control bg-dark" type="file" id="formFile" name="posterimg">
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- form end -->
@endsection