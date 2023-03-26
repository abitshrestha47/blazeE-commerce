<div class="table-responsive">
    <div id="filter">
        <table class="table table-success table-striped table-hover">
            <thead>
                <th>Sno.</th>
                <th>Department Name</th>
                <th>Department Image</th>
                <th colspan='2'>Action</th>
            </thead>

            @if(isset($departsearched))
            @foreach($departsearched as $departt)
            <tr>
                <td class="departid">{{$departt->id}}</td>
                <td class="dname">{{$departt->departmentName}}</td>
                <td class="dimage"><img src="{{asset('/storage/'.$departt->departmentImage)}}" alt="" height="50vh"
                        width="50vw"></td>
                <td><button type="button" class="btn btn-primary editdepart" data-toggle="modal"
                        data-target="#exampleModal" data-whatever="@mdo">Edit</button></button></td>
                <form action="{{route('deldepartments')}}" method="POST">
                    @csrf
                    <td><button type="submit" value="{{$departt->id}}" class="del" name="idpass"><i class="fa fa-trash"
                                aria-hidden="true"></i></button></td>
                </form>

            </tr>
            @endforeach
            @endif
    </div>
    </table>
</div>