@extends('admin.main')

@section('contents')
          <!-- form start -->
          <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12">

                    <div class="bg-secondary rounded h-100 p-4">
                        <h1 class="mb-4" style="text-align:center">Add Deal Detail</h1>
                        <form action="{{route('deals')}}" method='post' enctype='multipart/form-data'>
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">DealTitle</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="dealTitle">
                                <label for="exampleInputEmail1" class="form-label">DealDescription</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="dealDescription">
                                <label for="exampleInputEmail1" class="form-label">DealPrice</label>
                                <input type="text" class="form-control" id="brand" aria-describedby="emailHelp"
                                    name="dealPrice">
                                <label for="formFile" class="form-label">DealBackgroundImage</label>
                                <input class="form-control bg-dark" type="file" id="formFile" name="dealBackgroundImage">
                                <label for="exampleInputEmail1" class="form-label">EndDate</label>
                                <input type="date" class="form-control" id="categoryid" aria-describedby="emailHelp"
                                name="endDate"><br>
                                <label for="exampleInputEmail1" class="form-label">Product</label>
                                <input type="text" class="form-control" id="categoryid" aria-describedby="emailHelp"
                                name="product"><br>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- form end -->
@endsection