<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Category Table</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sno.</th>
                            <th scope="col">Category</th>
                            <th scope="col">Department</th>
                            <th scope="col" colspan='2'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($category))
                        @foreach($category as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->categories}}</td>
                            <td>{{$category->departments->departmentName}}</td>
                            <td><a href="{{route('editcategory',$category->id)}}">Edit</a></td>
                            <td><a href="{{route('delete',$category->id)}}">Delete</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>