<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid position-relative d-flex p-0">
<div class="container-fluid pt-4 px-4">
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
</div>
</body>
</html>
         

