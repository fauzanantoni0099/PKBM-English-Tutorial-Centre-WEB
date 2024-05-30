@foreach($employees as $employee)
<div class="modal fade" id="showModal-{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="card mb-3" style="max-width: 900px;">
                        <div class="row g-0">
                            <div class="col-md-6">
                                @forelse($employee->images as $image)
                                    <a href="/{{$image->name_path}}"><img src="/{{$image->name_path}}" class="img-fluid rounded-start" alt="Card image" style="width: 500px"></a>
                                @empty
                                    <img src="/assets/images/orang.jpg" class="img-fluid rounded-start " alt="Card image" style="width: 500px">
                                @endforelse
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title font-18">{{$employee->name}}</h5>
                                    <p class="card-text">{{$employee->gender}}</p>
                                    <p class="card-text">
                                        {{\Carbon\Carbon::parse($employee->birth_date)->isoFormat('D MMMM Y')}}
                                    </p>
                                    <p class="card-text">{{$employee->religion}}</p>
                                    <h5 class="card-title font-18"><li class="fa fa-user"></li> {{$employee->position}}</h5>
                                    <p class="card-text">{{\Carbon\Carbon::parse($employee->entered_date)->isoFormat('D MMMM Y')}}</p>
                                    <p class="card-text">{{$employee->phone}}</p>
                                    <p class="card-text">{{$employee->address}}</p>
                                    <h5><li class="fa fa-address-card"></li></h5>
                                    <p class="card-text">{{$employee->kata}}</p>
                                    <p class="card-text">{{$employee->sosmed}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endforeach
