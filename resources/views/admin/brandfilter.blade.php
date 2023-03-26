<div class="table-responsive">
                    <table class="table table-success table-striped table-hover">
                        <thead>
                            <th>Sno.</th>
                            <th>Brand</th>
                            <th colspan='2'>Action</th>
                        </thead>
                        @if(isset($brandsearched))
                        @foreach($brandsearched as $brands)
                        <tr>
                            <td class="brandid">{{$brands->id}}</td>
                            <td class="brandname">{{$brands->brandName}}</td>
                            <td><button type="button" class="btn btn-primary editbrands" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@mdo">Edit</button></button></td>
                            <td><a href="{{route('deletebrand',$brands->id)}}"><i class="fa fa-trash"
                                        aria-hidden="true"></i></a></td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>