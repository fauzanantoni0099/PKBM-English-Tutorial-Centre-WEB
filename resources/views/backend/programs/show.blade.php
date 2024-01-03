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
                    <div class="card m-b-30">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                @forelse($employee->images as $image)
                                    <img src="/{{$image->name_path}}" class="card-img h-100" alt="Card image" style="width: 500px">
                                @empty
                                    <img src="/assets/images/orang.jpg" class="card-img h-100" alt="Card image" style="width: 500px">
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
                                    <h5><li class="fa fa-address-card"></li></h5>
                                    <p class="card-text">{{$employee->address}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endforeach
