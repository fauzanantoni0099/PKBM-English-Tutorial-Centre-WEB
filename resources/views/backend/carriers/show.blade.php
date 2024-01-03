@foreach($certificates as $certificate)
<div class="modal fade" id="showModal-{{$certificate->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Sertifikat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card m-b-30">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <div class="card-body">
                                <h1 class="card-text">
                                    {{\Carbon\Carbon::parse($certificate->order_date)->isoFormat('D MMMM Y')}}
                                </h1>
                                <p class="card-title font-18">{{$certificate->customer->name}}</p>
                                <p class="card-text">{{$certificate->customer->gender}}</p>
                                <p class="card-text">
                                    {{\Carbon\Carbon::parse($certificate->customer->birth_date)->isoFormat('D MMMM Y')}}
                                </p>
                                <label class="text-black">Jenis Sertifikat : </label>
                                <p class="card-text">{{$certificate->certificate_type}}</p>
                                <label class="text-black">Score : </label>
                                <p class="card-text">{{$certificate->score}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <label class="text-black">Tanggal Ujian : </label>
                                <p class="card-text">
                                    {{\Carbon\Carbon::parse($certificate->exam_date)->isoFormat('D MMMM Y')}}
                                </p>
                                <label class="text-black">Tanggal Kadaluarsa : </label>
                                <p class="card-text">
                                    {{\Carbon\Carbon::parse($certificate->expired_date)->isoFormat('D MMMM Y')}}
                                </p>
                                <label class="text-black">Tanggal Cetak : </label>
                                <p class="card-text">
                                    {{\Carbon\Carbon::parse($certificate->print_date)->isoFormat('D MMMM Y')}}
                                </p>
                                <label class="text-black">Tanggal Pengambilan : </label>
                                <p class="card-text">
                                    {{\Carbon\Carbon::parse($certificate->collection_date)->isoFormat('D MMMM Y')}}
                                </p>
                                <label class="text-black">Status</label>
                                <p class="card-text">{{$certificate->status}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card-body">
                                <label class="text-black">Catatan : </label>
                                <p class="card-text">{{$certificate->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
